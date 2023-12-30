<?php
$targetDir = "images/";
$allowedExtensions = ["png", "jpg", "jpeg", "gif"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $db = get_db();

    // Pobierz dane z formularza
    $author = $_POST['author'];
    $title = $_POST['title'];

    // Znajdź ostatnie użyte user_id
    $lastUser = $db->nazwa_kolekcji->findOne([], ['sort' => ['user_id' => -1]]);
    $lastUserId = $lastUser ? $lastUser['user_id'] : 0;
    $namePhoto = $_FILES["file"]["name"];
    // Utwórz dokument do zapisania w kolekcji
    $document = [
        'user_id' => $namePhoto, // Automatyczne incrementowanie user_id
        'author' => $author,
        'title' => $title,
        // Dodaj inne pola z formularza, jeśli istnieją
    ];

    // Uzyskaj dostęp do kolekcji
    $collection = $db->nazwa_kolekcji; // Zastąp 'nazwa_kolekcji' rzeczywistą nazwą kolekcji

    // Wstaw dokument do kolekcji
    $result = $collection->insertOne($document);

    // Sprawdź czy operacja zakończyła się sukcesem
    if ($result->getInsertedCount() > 0) {
        echo 'Dobry penis.';
    } else {
        echo 'penis.';
    }

    

    // Sprawdź, czy plik został przesłany bez błędów
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        $fileName = $_FILES["file"]["name"];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Sprawdź, czy rozszerzenie pliku jest dozwolone
        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            $originalName = pathinfo($fileName, PATHINFO_FILENAME);
            $targetPathOriginal = $targetDir . $originalName . '_original.' . $fileExtension;
            $targetPathWatermarked = $targetDir . $originalName . '_watermarked.' . $fileExtension;
            $targetPathThumbnail = $targetDir . $originalName . '_thumbnail.' . $fileExtension;

            // Przenieś plik do docelowego katalogu
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPathOriginal)) {
                // Skopiuj oryginalne zdjęcie do katalogu z watermarkiem
                copy($targetPathOriginal, $targetPathWatermarked);

                // Przekształć oryginalne zdjęcie
                applyWatermark($targetPathWatermarked, $_POST["watermark"]);

                // Wygeneruj miniaturkę
                generateThumbnail($targetPathOriginal, $targetPathThumbnail, 200, 125);

                echo "Zdjęcia zostały przesłane i przetworzone.";
            } else {
                echo "Wystąpił błąd podczas zapisywania pliku.";
            }
        } else {
            echo "Dozwolone są tylko pliki PNG, JPG, JPEG i GIF.";
        }
    } else {
        echo "Wystąpił błąd podczas przesyłania pliku.";
    }
}








function get_db(){
    require '../../vendor/autoload.php';
    $mongo = new MongoDB\Client(
    "mongodb://localhost:27017/wai"
    ,
    [
        'username' => 'wai_web'
        ,
        'password' => 'w@i_w3b',
    ]);
    $db = $mongo->wai;
    return $db;
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
            // Obsługa innych typów obrazów, jeśli to konieczne
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
