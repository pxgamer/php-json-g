<?php

namespace RaidAndFade\JsonG;

use PHPUnit\Framework\TestCase;
use function file_get_contents;
use function json_decode;

class JsonGToImageTest extends TestCase
{
    /* Test whether a JSON-G string can be converted to an image blob string. */
    public function testCanConvertJsonGStringToImageBlob(): void
    {
        $testData = file_get_contents(__DIR__.'/resources/demo.jsng');

        $jsonArray = json_decode($testData, true);

        $image = JsonG::toImageBlob($jsonArray);

        $this->assertIsString($image);
    }
}
