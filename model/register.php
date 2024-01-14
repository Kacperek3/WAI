<?php
    session_start();
    require_once("business.php");
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nazwa_uzytkownika = $_POST["nazwa_uzytkownika"];
        $email = $_POST["email"];
        $haslo = $_POST["haslo"];
        $powtorz_haslo = $_POST["powtorz_haslo"];


        if (strlen($haslo) < 8) {
            echo "Hasło powinno mieć co najmniej 8 znaków.";
            exit();
        }

        if ($haslo != $powtorz_haslo) {
            echo "Hasło i powtórzone hasło nie są identyczne.";
            exit();
        }

        
        $existingUser = get_users_by_user($nazwa_uzytkownika);

        if ($existingUser) {
            echo "Użytkownik o podanej nazwie już istnieje.";
            exit();
        }

        $existingUserByEmail = get_users_by_email($email);

        if ($existingUserByEmail) {
            echo "Użytkownik o podanym adresie email już istnieje.";
            exit();
        }

        $haslo = password_hash($haslo, PASSWORD_DEFAULT);
        
        save_users($nazwa_uzytkownika, $email, $haslo);

        $_SESSION['nazwa_uzytkownika'] = $nazwa_uzytkownika;
        echo "Rejestracja zakończona pomyślnie!";
    }

?>
