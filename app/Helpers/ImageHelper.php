<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ImageHelper
{
    /**
     * Upload base64 image to public folder.
     *
     * @param string $base64Image Base64 image string.
     * @param string $relativePath Folder inside public/ to save image.
     * @param string|null $customName Optional custom filename (with or without extension).
     * @param bool $returnFullUrl Return full URL instead of relative path.
     * @return string|null
     */
    public static function uploadBase64Image($base64Image, $relativePath = 'assets/uploads', $customName = null, $returnFullUrl = false)
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
            $imageData = substr($base64Image, strpos($base64Image, ',') + 1);
            $extension = strtolower($type[1]);

            $imageData = base64_decode($imageData);
            if ($imageData === false) {
                return null;
            }

            // Create folder if doesn't exist
            $destinationPath = public_path($relativePath);
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Determine filename
            $filename = $customName
                ? pathinfo($customName, PATHINFO_FILENAME) . '.' . $extension
                : Str::uuid() . '.' . $extension;

            $fullPath = $destinationPath . '/' . $filename;

            file_put_contents($fullPath, $imageData);

            $relative = $relativePath . '/' . $filename;

            return $returnFullUrl ? asset($relative) : $relative;
        }

        return null;
    }
public static function uploadImage($file, $folder, $filename, $relativePath = true)
{
    // Get extension
    $extension = $file->getClientOriginalExtension();

    // Final file name
    $fileName = $filename . '.' . $extension;

    // Full public path to folder like: public/assets/brands
    $folderPath = public_path($folder);

    // Create folder if not exists
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0755, true);
    }

    // Move file to folder
    $file->move($folderPath, $fileName);

    // Return path to save in DB
    // Example: assets/brands/brand_123456.jpg
    return $relativePath 
        ? trim($folder, '/') . '/' . $fileName 
        : $folderPath . '/' . $fileName;
}


}
