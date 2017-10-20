<?php

use PHPUnit\Framework\TestCase;
use RaidAndFade\JsonG\JsonG;

class JsonGToImageTest extends TestCase
{
    public function testCanConvertJsonGStringToImageBlob()
    {
        $testData = file_get_contents(__DIR__ . '/../resources/demo.jsng');

        $jsonArray = json_decode($testData, true);

        $image = JsonG::toImageBlob($jsonArray);

        $this->assertInternalType('blob', $image);
    }
}