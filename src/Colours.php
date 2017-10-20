<?php

namespace RaidAndFade\JsonG;

use ImagickPixel;

class Colours
{
    public static function toInt(array $colour)
    {
        return ($colour['a'] << 24) + ($colour['r'] << 16) + ($colour['g'] << 8) + $colour['b'];
    }

    public static function fromInt(int $int)
    {
        return [
            'r' => 0xff & $int >> 16,
            'g' => 0xff & $int >> 8,
            'b' => 0xff & $int,
            'a' => 0xff & $int >> 24
        ];
    }

    public static function toImgPixel(array $colour)
    {
        if (isset($colour['a'])) {
            $col = "rgba(" . $colour['r'] . "," . $colour['g'] . "," . $colour['b'] . "," . $colour['a'] . ")";
        } else {
            $col = "rgb(" . $colour['r'] . "," . $colour['g'] . "," . $colour['b'] . ")";
        }

        return new ImagickPixel($col);
    }

    public static function shortToFull(array $colour)
    {
        $arr = [
            "red"   => $colour['r'],
            "blue"  => $colour['b'],
            "green" => $colour['g']
        ];
        if (isset($colour['a'])) {
            $arr['alpha'] = $colour['a'];
        }

        return $arr;
    }

    public static function fullToShort(array $colour)
    {
        $arr = [
            "r" => $colour['red'],
            "b" => $colour['blue'],
            "g" => $colour['green']
        ];
        if (isset($colour['alpha'])) {
            $arr['a'] = $colour['alpha'];
        }

        return $arr;
    }
}