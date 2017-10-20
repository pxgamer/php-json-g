<?php

use PHPUnit\Framework\TestCase;
use RaidAndFade\JsonG\JsonG;

class JsonGFromImageTest extends TestCase
{
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