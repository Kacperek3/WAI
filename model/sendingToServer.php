<?php
require_once("business.php");

$targetDir = "../images/";
$allowedExtensions = ["png", "jpg", "jpeg", "gif"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $db = get_db();

    $author = $_POST['author'];
    $title = $_POST['title'];
    $namePhoto = $_FILES["file"]["name"];

    save_data_about_photos($namePhoto, $author, $title);

    $maxFileSize = 1 * 1024 * 1024;
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        $fileSize = $_FILES["file"]["size"];
    
        if ($fileSize <= $maxFileSize) {
            $fileName = $_FILES["file"]["name"];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    
            if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                $originalName = pathinfo($fileName, PATHINFO_FILENAME);
                $targetPathOriginal = $targetDir . $originalName . '_original.' . $fileExtension;
                $targetPathWatermarked = $targetDir . $originalName . '_watermarked.' . $fileExtension;
                $targetPathThumbnail = $targetDir . $originalName . '_thumbnail.' . $fileExtension;
    
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPathOriginal)) {
                    copy($targetPathOriginal, $targetPathWatermarked);
    
                    applyWatermark($targetPathWatermarked, $_POST["watermark"]);
    
                    generateThumbnail($targetPathOriginal, $targetPathThumbnail, 200, 125);
    
                    echo "Zdjęcia zostały przesłane i przetworzone.";
                } else {
                    echo "Wystąpił błąd podczas zapisywania pliku.";
                }
            } else {
                echo "Dozwolone są tylko pliki PNG, JPG, JPEG i GIF.";
            }
        } else {
            echo "Przesłany plik przekracza maksymalny rozmiar (1MB).";
        }
    } else {
        echo "Wystąpił błąd podczas przesyłania pliku.";
    }
}



function applyWatermark($imagePath, $watermarkText) {
    $imageType = exif_imagetype($imagePath);

    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $image = imagecreatefromjpeg($imagePath);
            break;
        case IMAGETYPE_PNG:
            $image = imagecreatefrompng($imagePath);
            break;
        case IMAGETYPE_GIF:
            $image = imagecreatefromgif($imagePath);
            break;
        default:
            echo "Nieobsługiwany typ obrazu.";
            return;
    }

    $color = imagecolorallocate($image, 0, 0, 0);
    $font = 1;
    imagestring($image, $font, 80, 80, $watermarkText, $color);
    imagejpeg($image, $imagePath);
    imagedestroy($image);
}

function generateThumbnail($sourcePath, $targetPath) {
    list($originalWidth, $originalHeight, $imageType) = getimagesize($sourcePath);

    $targetWidth = 200;
    $targetHeight = 125;

    $thumb = imagecreatetruecolor($targetWidth, $targetHeight);

    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $source = imagecreatefromjpeg($sourcePath);
            break;
        case IMAGETYPE_PNG:
            $source = imagecreatefrompng($sourcePath);
            break;
        default:
            echo "Nieobsługiwany typ obrazu.";
            return false;
    }

    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $targetWidth, $targetHeight, $originalWidth, $originalHeight);

    switch ($imageType) {
        case IMAGETYPE_JPEG:
            imagejpeg($thumb, $targetPath);
            break;
        case IMAGETYPE_PNG:
            imagepng($thumb, $targetPath);
            break;
        default:
            echo "Nieobsługiwany typ obrazu.";
            return false;
    }

    imagedestroy($thumb);
    imagedestroy($source);

    return true;
}
