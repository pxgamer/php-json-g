<?php

namespace RaidAndFade\JsonG;

use Imagick;
use ImagickException;
use ImagickPixelException;
use PHPUnit\Framework\TestCase;
use function fopen;

class JsonGFromImageTest extends TestCase
{
    /**
     * Test whether an image blob string can be converted to a JSON-G string.
     *
     * @throws ImagickPixelException
     * @throws ImagickException
     */
    public function testCanConvertImageBlobToJsonGString(): void
    {
        $testData = fopen(__DIR__.'/resources/demo.png', 'rb');

        $image = new Imagick();
        $image->readImageFile($testData);

        $json = JsonG::toJson($image);

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonFile(__DIR__.'/resources/demo.jsng', $json);
    }
}
