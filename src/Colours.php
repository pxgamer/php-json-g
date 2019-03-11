<?php

namespace RaidAndFade\JsonG;

use ImagickPixel;

class Colours
{
    /**
     * Convert a colour array to an integer sequence.
     *
     * @param array $colour
     * @return int|mixed
     */
    public static function toInt(array $colour)
    {
        return ($colour['a'] << 24) + ($colour['r'] << 16) + ($colour['g'] << 8) + $colour['b'];
    }

    /**
     * Convert an integer sequence to an array.
     *
     * @param int $int
     * @return array
     */
    public static function fromInt(int $int): array
    {
        return [
            'r' => 0xff & $int >> 16,
            'g' => 0xff & $int >> 8,
            'b' => 0xff & $int,
            'a' => 0xff & $int >> 24,
        ];
    }

    /**
     * Convert a colour array to an ImagickPixel instance.
     *
     * @param array $colour
     * @return ImagickPixel
     */
    public static function toImgPixel(array $colour): ImagickPixel
    {
        if (isset($colour['a'])) {
            $col = sprintf('rgba(%s,%s,%s,%s)', $colour['r'], $colour['g'], $colour['b'], $colour['a']);
        } else {
            $col = sprintf('rgb(%s,%s,%s)', $colour['r'], $colour['g'], $colour['b']);
        }

        return new ImagickPixel($col);
    }

    /**
     * Convert a short (RGBA) array to a full-word array (red, green, blue, alpha).
     *
     * @param array $colour
     * @return array
     */
    public static function shortToFull(array $colour): array
    {
        $arr = [
            'red' => $colour['r'],
            'green' => $colour['g'],
            'blue' => $colour['b'],
        ];

        if (isset($colour['a'])) {
            $arr['alpha'] = $colour['a'];
        }

        return $arr;
    }

    /**
     * Convert a full-word (red, green, blue, alpha) array to a  short (RGBA) array.
     *
     * @param array $colour
     * @return array
     */
    public static function fullToShort(array $colour): array
    {
        $arr = [
            'r' => $colour['red'],
            'g' => $colour['green'],
            'b' => $colour['blue'],
        ];

        if (isset($colour['alpha'])) {
            $arr['a'] = $colour['alpha'];
        }

        return $arr;
    }
}
