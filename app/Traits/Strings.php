<?php

namespace App\Traits;

use Illuminate\Support\Arr;

trait Strings
{
    public function getAvatarText($str): string
    {
        if (!$str) return "BO";

        $str = strtoupper($str);
        $stringArr = explode(" ", $str);
        $strArr = Arr::map($stringArr, function ($val) {
            if ($val) {
                return $val[0];
            }
        });

        return count($strArr) > 1 ? implode($strArr) : substr($str, 0, 2);
    }
    public function getAvatarSize($size): string
    {
        return match ($size) {
            'small' => 'w-9',
            'medium' => 'w-20',
            'large' => 'w-32',
            default => $size
        };
    }
}
