<?php
$db = get_db();
$collection = $db->users;

// Pobierz wszystkie dokumenty z kolekcji
$documents = $collection->find();

// Wyświetl dane z każdego dokumentu
foreach ($documents as $document) {
    echo 'Author: ' . $document['nazwa_uzytkownika'] . '<br>';
    echo 'Title: ' . $document['email'] . '<br>';
    echo 'user_id: ' . $document['haslo'] . '<br>';
    // Dodaj inne pola z formularza, jeśli istnieją
    echo '<br>';
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