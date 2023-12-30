<?php
$folder = "images/"; // Ścieżka do folderu zawierającego zdjęcia
$files = scandir($folder); // Pobierz listę plików z folderu

// Ilość zdjęć na stronie
$photosPerPage = 10;

// Ustal bieżącą stronę
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Oblicz, od którego indeksu rozpocząć wyświetlanie zdjęć
$startIndex = ($current_page - 1) * $photosPerPage + 2; // Pomijamy '.' i '..'
//echo 'Wartość zmiennej $startIndex: ' . $startIndex;

// Oblicz, na której stronie jesteśmy
$totalPages = ceil((count($files) - 2) / $photosPerPage);
//echo 'Wartość zmiennej $startIndex: ' . $totalPages;

$db = get_db();
$collection = $db->nazwa_kolekcji;
$documents = iterator_to_array($collection->find());

$indexAuthor = 1;
$indexTitle = 1;


// Wyświetl miniaturki zdjęć
for ($i = $startIndex; $i < $startIndex + $photosPerPage; $i++) {
    if ($i >= 2 && $i < count($files)) { // Pomijamy '.' i '..'
        $file = $files[$i];

        // Sprawdź, czy nazwa pliku zawiera słowo "thumbnail"
        if (strpos($file, 'thumbnail') !== false) {
            $originalFileName = str_replace('thumbnail', 'watermarked', $file);
            $copy = $originalFileName;
            $copy = str_replace('_watermarked','',$copy);
            $pageClass = ($i == ($startIndex + $photosPerPage - 1)) ? 'current-page' : '';

            echo '
                <div class="thumbnail ' . $pageClass . '">
                    <a href="' . $folder . $originalFileName . '" target="_blank">
                        <img src="' . $folder . $file . '" class="photo" alt="Zdjęcie">
                    </a>';
                echo '<p class="author_and_title">';
                foreach ($documents as $document) {
                    
                    if($document['user_id'] == $copy){
                        echo 'Author: ' . $document['author'] . '<br>';
                        $indexAuthor++;
                        break;
                    }   
                }
                echo '</p>';
                echo '<p class="author_and_title">';
                foreach ($documents as $document) {
                    if($document['user_id'] == $copy){
                        echo 'Tytuł: ' . $document['title'] . '<br>';
                        $indexTitle++;
                        break;
                    }   
                }
                echo '</p>';
            echo '</div>';
        }
    }
}




function get_db(){
    require '../../vendor/autoload.php';
    $mongo = new MongoDB\Client(
    "mongodb://localhost:27017/wai",
    [
        'username' => 'wai_web',
        'password' => 'w@i_w3b',
    ]);
    $db = $mongo->wai;
    return $db;
}
?>
