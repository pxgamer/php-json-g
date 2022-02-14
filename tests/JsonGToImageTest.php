<?php

use RaidAndFade\JsonG\JsonG;

it('can convert a JSON-G string to an image blob', function () {
    $testData = file_get_contents(__DIR__.'/resources/demo.jsng');

    $jsonArray = json_decode($testData, true);

    $image = JsonG::toImageBlob($jsonArray);

    expect($image)->toBeString();
});
