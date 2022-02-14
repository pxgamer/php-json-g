<?php

namespace RaidAndFade\JsonG;

use Imagick;
use ImagickDraw;
use ImagickDrawException;
use ImagickException;
use ImagickPixel;
use ImagickPixelException;
use JsonException;

class JsonG
{
    /**
     * Convert a JSON-G array instance to a Imagick image blob.
     *
     * @param  array{size: array{width: int, height: int}, layers: array<string|int, array{default_color?: array{red: int, green: int, blue: int, alpha?: int}, default_colour?: array{red: int, green: int, blue: int, alpha?: int}, pixels: array<string|int, array{color?: array{red: int, green: int, blue: int, alpha?: int}, colour?: array{red: int, green: int, blue: int, alpha?: int}, position: array{x: int, y: int}}>}>}  $jsonArray
     * @return string
     *
     * @throws ImagickException|ImagickDrawException
     */
    public static function toImageBlob(array $jsonArray): string
    {
        $image = new Imagick();
        $image->newImage($jsonArray['size']['width'], $jsonArray['size']['height'], new ImagickPixel('none'));
        $image->setImageFormat('png');

        foreach ($jsonArray['layers'] as $layerId => $layer) {
            $layerDrawing = new ImagickDraw();

            if (isset($layer['default_colour']) && ! isset($layer['default_color'])) {
                $layer['default_color'] = $layer['default_colour'];
            }

            assert(isset($layer['default_color']), "A default color was not set on layer `{$layerId}`");

            $layerDrawing->setFillColor(Colours::toImgPixel(Colours::fullToShort($layer['default_color'])));
            $layerDrawing->setStrokeWidth(0);
            $layerDrawing->rectangle(0, 0, $jsonArray['size']['width'], $jsonArray['size']['height']);
            $layerDrawing->setStrokeWidth(1);

            foreach ($layer['pixels'] as $pixelId => $pixel) {
                if (isset($pixel['colour']) && ! isset($pixel['color'])) {
                    $pixel['color'] = $pixel['colour'];
                }

                assert(isset($pixel['color']), "A color was not set on layer `{$layerId}` and pixel `{$pixelId}`");

                $layerDrawing->setFillColor(Colours::toImgPixel(Colours::fullToShort($pixel['color'])));
                $layerDrawing->point($pixel['position']['x'], $pixel['position']['y']);
            }

            $image->drawImage($layerDrawing);
        }

        return $image->getImageBlob();
    }

    /**
     * Converts an Imagick image instance to a JSON-G string.
     *
     * @param  Imagick  $image
     * @return string
     *
     * @throws ImagickPixelException|ImagickException
     * @throws JsonException
     */
    public static function toJson(Imagick $image): string
    {
        /** @var array{color?: int, colour?: int, position: array{x: int, y: int}}  $pixels */
        $pixels = [];
        $colors = [];
        $res = [
            'version' => '1.0',
            'transparency' => true,
            'layers' => [],
            'size' => [
                'width' => $image->getImageWidth(),
                'height' => $image->getImageHeight(),
            ],
        ];

        for ($x = 0; $x <= $image->getImageWidth(); $x++) {
            $pixels[$x] = [];
            for ($y = 0; $y <= $image->getImageHeight(); $y++) {
                $pixels[$x][$y] = $image->getImagePixelColor($x, $y)->getColor();
            }
        }

        foreach ($pixels as $cols) {
            foreach ($cols as $pixel) {
                $col = Colours::toInt($pixel);
                if (array_key_exists($col, $colors)) {
                    $colors[$col]++;
                } else {
                    $colors[$col] = 1;
                }
            }
        }

        $def = array_search(max($colors), $colors, true);
        $l = [
            'pixels' => [],
            'default_color' => Colours::shortToFull(Colours::fromInt($def)), // @phpstan-ignore-line
        ];

        foreach ($pixels as $x => $cols) {
            foreach ($cols as $y => $pixel) {
                $col = ($pixel['a'] << 24) + ($pixel['r'] << 16) + ($pixel['g'] << 8) + $pixel['b'];
                if ($col !== $def) {
                    $l['pixels'][] = [
                        'position' => compact('x', 'y'),
                        'color' => Colours::shortToFull($pixel),
                    ];
                }
            }
        }

        $res['layers'][0] = $l;

        return json_encode($res, JSON_THROW_ON_ERROR);
    }
}
