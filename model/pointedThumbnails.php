<?php
require_once("business.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['save_selection'])) {
        $selectedPhotos = isset($_POST['selected_photos']) ? $_POST['selected_photos'] : array();
        $user = $_SESSION['nazwa_uzytkownika'];
        $folder = "../images/";
        $files = scandir($folder);
        $photosPerPage = 9;
        $totalPages = ceil((count($files) - 2) / $photosPerPage);

        for ($page = 1; $page <= $totalPages; $page++) {
            $_SESSION['selected_photos_pages'][$page] = $selectedPhotos;
        }

        save_unselected_photos($user,$selectedPhotos);
    }
}

$folder = "../images/";
$files = scandir($folder);
$photosPerPage = 9;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$startIndex = ($current_page - 1) * $photosPerPage + 2;
$totalPages = ceil((count($files) - 2) / $photosPerPage);

$selectedPhotos = array();


$documents = get_data_about_photos();

for ($page = 1; $page <= $totalPages; $page++) {
    $selectedPhotos = array_merge($selectedPhotos, isset($_SESSION['selected_photos_pages'][$page]) ? $_SESSION['selected_photos_pages'][$page] : array());
}

foreach ($selectedPhotos as $selectedPhoto) {
    $originalFileName = str_replace('thumbnail', 'watermarked', $selectedPhoto);
    $thumb = str_replace('watermarked', 'thumbnail', $originalFileName);
    $copy = $originalFileName;
    $copy = str_replace('_watermarked', '', $copy);

    $document = array_filter($documents, function ($doc) use ($copy) {
        return $doc['user_id'] == $copy;
    });

    if (!empty($document)) {
        $document = reset($document);
        echo '
            <div class="thumbnail">
                <form method="post" action="" enctype="multipart/form-data">
                    <input type="checkbox" name="selected_photos[]" value="' . $selectedPhoto . '" checked>
                <a href="' . $folder . $originalFileName . '" target="_blank">
                    <img src="' . $folder . $thumb . '" class="photo" alt="Zdjęcie">
                </a>
                <p class="author_and_title">
                    Autor: ' . $document['author'] . '<br>
                    Tytuł: ' . $document['title'] . '<br>
                </p>
            </div>';
    }
}

if (isset($_SESSION['nazwa_uzytkownika'])) {
    echo '
    <form method="post" action="" enctype="multipart/form-data">
        <input type="submit" name="save_selection" value="Odznacz">
    </form>';
}

?>
