<?php

namespace RaidAndFade\JsonG;

use Imagick;
use PHPUnit\Framework\TestCase;

/**
 * Class ColoursTest.
 */
class ColoursTest extends TestCase
{
    /**
     * Test whether an ImagickPixel can be created using RGBA.
     */
    public function testCanCreateImagePixelWithRGBA()
    {
        $pixel = Colours::toImgPixel([
            'r' => 1,
            'b' => 1,
            'g' => 1,
            'a' => 1,
        ]);

        $this->assertInstanceOf(\ImagickPixel::class, $pixel);
    }

    /**
     * Test whether an ImagickPixel can be created using RGB.
     */
    public function testCanCreateImagePixelWithRGB()
    {
        $pixel = Colours::toImgPixel([
            'r' => 1,
            'b' => 1,
            'g' => 1,
        ]);

        $this->assertInstanceOf(\ImagickPixel::class, $pixel);
    }
}
