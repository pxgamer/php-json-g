<?php

use PHPUnit\Framework\TestCase;
use RaidAndFade\JsonG\JsonG;

/**
 * Class JsonGFromImageTest
 */
class JsonGFromImageTest extends TestCase
{
    /**
     * Test whether an image blob string can be converted to a JSON-G string
     */
    public function testCanConvertImageBlobToJsonGString()
    {
        $testData = fopen(__DIR__ . '/../resources/demo.png', 'rb');

        $image = new Imagick();
        $image->readImageFile($testData);

        $json = JsonG::toJson($image);

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonFile(__DIR__ . '/../resources/demo.jsng', $json);
    }
}