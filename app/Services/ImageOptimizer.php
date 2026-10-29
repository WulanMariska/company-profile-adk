<?php

namespace App\Services;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Http\UploadedFile;

class ImageOptimizer
{
    public function optimize(UploadedFile $file): string
    {
        $manager = new ImageManager(new Driver());

        $image = $manager->read($file->getPathname());

        $image->scaleDown(
            width: 1920,
            height: 1920
        );

        return (string) $image->encode(
            new WebpEncoder(quality: 88)
        );
    }
}
