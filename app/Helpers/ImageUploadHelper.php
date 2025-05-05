<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageUploadHelper
{
    /**
     * Upload and resize an image.
     *
     * @param UploadedFile $file
     * @param string $path
     * @param int $width
     * @param int $height
     * @param int $quality (0 - 100)
     * @return string Path to the stored image
     */
    public static function uploadImage(
        UploadedFile $file,
        string $path = 'products',
        int $width = 600,
        int $height = 600,
        int $quality = 80
    ): string {
        // Read the image using Intervention v3
        $image = Image::read($file->getRealPath())
            ->cover($width, $height) // 'cover' is similar to fit() in v3
            ->encode('jpg', $quality);

        // Generate unique filename
        $filename = Str::uuid() . '.jpg';
        $fullPath = $path . '/' . $filename;

        // Store in the public disk
        Storage::disk('public')->put($fullPath, (string) $image);

        return $fullPath; // You can prepend 'storage/' if you need a public URL
    }
}