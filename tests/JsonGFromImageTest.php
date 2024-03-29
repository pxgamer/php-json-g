<?php

use RaidAndFade\JsonG\JsonG;

it('can convert an image blob to a JSON-G string', function () {
    $testData = fopen(__DIR__.'/resources/demo.png', 'rb');

    $image = new Imagick();
    $image->readImageFile($testData);

    $json = JsonG::toJson($image);

    expect($json)->toBeJson();
    $this->assertJsonStringEqualsJsonFile(__DIR__.'/resources/demo.jsng', $json);
});
