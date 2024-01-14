<?php

require '../../../vendor/autoload.php';

// Połącz się z MongoDB
$mongo = new MongoDB\Client(
    "mongodb://localhost:27017/wai",
    [
        'username' => 'wai_web',
        'password' => 'w@i_w3b',
    ]
);

// Wybierz bazę danych
$db = $mongo->wai;

// Wybierz kolekcję
$collection = $db->nazwa_kolekcji;

// Pobierz wszystkie dokumenty z kolekcji
$documents = $collection->find();


echo '<pre>';
foreach ($documents as $document) {
    print_r($document);
}
echo '</pre>';

