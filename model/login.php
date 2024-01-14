<?php
session_start();
require_once("business.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nazwa_uzytkownika = $_POST["nazwa_uzytkownika"];
    $haslo = $_POST["haslo"];

    
    $user = get_users_by_user($nazwa_uzytkownika);

    if ($user && password_verify($haslo, $user['haslo'])) {
        
        $_SESSION['nazwa_uzytkownika'] = $nazwa_uzytkownika;
        header('Location: ../View/galery.php');
        exit();
    } else {
        echo "Błędne dane logowania.";
    }
}
?>
