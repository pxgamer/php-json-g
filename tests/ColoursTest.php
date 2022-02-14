<?php

use ImagickPixel;
use RaidAndFade\JsonG\Colours;

it('can create an ImagickPixel with RGB', function () {
    $pixel = Colours::toImgPixel([
        'r' => 1,
        'g' => 1,
        'b' => 1,
    ]);

    expect($pixel)->toBeInstanceOf(ImagickPixel::class);
});

it('can create an ImagickPixel with RGBA', function () {
    $pixel = Colours::toImgPixel([
        'r' => 1,
        'g' => 1,
        'b' => 1,
        'a' => 1,
    ]);

    expect($pixel)->toBeInstanceOf(ImagickPixel::class);
});
