<?php
    $db = get_db();
    $collection = $db->nazwa_kolekcji;

    // Kryteria do znalezienia dokumentów do usunięcia (na przykład, gdzie autor to 'John')
    $criteria = ['author' => 'ccc'];

    // Usuń wszystkie dokumenty na podstawie kryteriów
    $result = $collection->deleteMany($criteria);

    // Sprawdź, czy usunięto co najmniej jeden dokument
    if ($result->getDeletedCount() > 0) {
        echo 'Usunięto ' . $result->getDeletedCount() . ' dokumentów.';
    } else {
        echo 'Nie znaleziono pasujących dokumentów do usunięcia.';
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
?>