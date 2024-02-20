<?php

class ImageUploader
{
    public static function upload($file, $uploadDir = 'images/')
    {
        $uploadedFile = '';

        if ($file && $file['error'] === UPLOAD_ERR_OK) {
            $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/' . $uploadDir;
            $uploadedFileName = basename($file['name']);
            $uploadedFile = $uploadDir . $uploadedFileName;

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            move_uploaded_file($file['tmp_name'], $uploadPath . $uploadedFileName);
        }
        return $uploadedFile == "" ? "images/default/noImage.webp" : $uploadedFileName;
    }
    public static function update($file, $uploadDir = 'images/')
    {
        $photoName = basename($file['name']);
        return ($photoName == '') ? '' : $uploadDir.$photoName;
    }
}
