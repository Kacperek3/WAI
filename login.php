<?php
session_start();

$db = get_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nazwa_uzytkownika = $_POST["nazwa_uzytkownika"];
    $haslo = $_POST["haslo"];

    // Sprawdzenie, czy istnieje użytkownik o podanej nazwie
    $collection = $db->users;
    $user = $collection->findOne(['nazwa_uzytkownika' => $nazwa_uzytkownika]);

    if ($user && password_verify($haslo, $user['haslo'])) {
        $_SESSION['nazwa_uzytkownika'] = $nazwa_uzytkownika;
        header('Location: galery.php');
        exit();
    } else {
        echo "Błędne dane logowania.";
    }
}

function get_db(){
    require '../../vendor/autoload.php';
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]
    );
    $db = $mongo->wai;
    return $db;
}
?>
