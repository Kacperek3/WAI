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
$collection = $db->users;

// Usuń wszystkie dokumenty z kolekcji
$result = $collection->deleteMany([]);

// Wyświetl informacje o wykonanej operacji
printf("Deleted %d documents from kolekcja 'nazwa_kolekcji'\n", $result->getDeletedCount());
