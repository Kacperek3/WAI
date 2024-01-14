<?php
require_once("business.php");

if (!isset($_SESSION['selected_photos_pages'])) {
    $_SESSION['selected_photos_pages'] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['save_selection'])) {
        $selectedPhotos = isset($_POST['selected_photos']) ? $_POST['selected_photos'] : array();
        $user = $_SESSION['nazwa_uzytkownika'];
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $_SESSION['selected_photos_pages'][$currentPage] = $selectedPhotos;

        save_selected_photos($user, $currentPage, $selectedPhotos);
    }
}

$folder = "../images/";
$files = scandir($folder);
$photosPerPage = 9;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$startIndex = ($current_page - 1) * $photosPerPage + 2;
$totalPages = ceil((count($files) - 2) / $photosPerPage);

$selectedPhotos = isset($_SESSION['selected_photos_pages'][$current_page]) ? $_SESSION['selected_photos_pages'][$current_page] : array();

$documents = get_data_about_photos();

for ($i = $startIndex; $i < $startIndex + $photosPerPage; $i++) {
    if ($i >= 2 && $i < count($files)) {
        $file = $files[$i];
        
        if (strpos($file, 'thumbnail') !== false) {
            $originalFileName = str_replace('thumbnail', 'watermarked', $file);
            $copy = $originalFileName;
            $copy = str_replace('_watermarked', '', $copy);
            $pageClass = ($i == ($startIndex + $photosPerPage - 1)) ? 'current-page' : '';
            
            echo '
                <div class="thumbnail ' . $pageClass . '">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="checkbox" name="selected_photos[]" value="' . $originalFileName . '"';

            if (in_array($originalFileName, $selectedPhotos)) {
                echo ' checked';
            }

            echo '>
                    <s></s>
                    <a href="' . $folder . $originalFileName . '" target="_blank">
                        <img src="' . $folder . $file . '" class="photo" alt="Zdjęcie">
                    </a>';
            
            echo '<p class="author_and_title">';
            foreach ($documents as $document) {
                if ($document['user_id'] == $copy) {
                    echo 'Autor: ' . $document['author'] . '<br>';
                    break;
                }
            }
            echo '</p>';
            
            echo '<p class="author_and_title">';
            foreach ($documents as $document) {
                if ($document['user_id'] == $copy) {
                    echo 'Tytuł: ' . $document['title'] . '<br>';
                    break;
                }
            }
            echo '</p>';
            
            echo '</div>';
        }
    }
}

if (isset($_SESSION['nazwa_uzytkownika']))  {
    echo '
    <form method="post" action="" enctype="multipart/form-data">
        <input type="submit" name="save_selection" value="Zapamiętaj wybrane">
    </form>
    ';
} 

?>
