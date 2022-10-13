<?php

namespace App\Faker;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FakerImageProvider extends \Faker\Provider\Base
{
    public function loremflickr(string $dir = '', int $width = 500, int $height = 500): string
    {
        $name = Str::random(6) . ".jpg";

        Storage::put(
            $dir . $name,
            file_get_contents("https://loremflickr.com/$width/$height")
        );
        return '/storage/products/' . $name;
    }
}
