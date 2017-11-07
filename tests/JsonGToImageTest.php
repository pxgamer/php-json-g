<?php

use PHPUnit\Framework\TestCase;
use RaidAndFade\JsonG\JsonG;

/**
 * Class JsonGToImageTest
 */
class JsonGToImageTest extends TestCase
{
    /**
     * Test whether a JSON-G string can be converted to an image blob string
     */
    public function testCanConvertJsonGStringToImageBlob()
    {
        $testData = file_get_contents(__DIR__ . '/../resources/demo.jsng');

        $jsonArray = json_decode($testData, true);

        $image = JsonG::toImageBlob($jsonArray);

        $this->assertInternalType('string', $image);
    }
}
