<?php
    session_start();
    $db = get_db();
    

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

        $collection = $db->users;
        $existingUser = $collection->findOne(['nazwa_uzytkownika' => $nazwa_uzytkownika]);

        if ($existingUser) {
            echo "Użytkownik o podanej nazwie już istnieje.";
            exit();
        }

        $existingUserByEmail = $collection->findOne(['email' => $email]);

        if ($existingUserByEmail) {
            echo "Użytkownik o podanym adresie email już istnieje.";
            exit();
        }

        $haslo = password_hash($haslo, PASSWORD_DEFAULT);

        $user = [
            'nazwa_uzytkownika' => $nazwa_uzytkownika,
            'email' => $email,
            'haslo' => $haslo,
        ];

        $collection->insertOne($user);
        $_SESSION['nazwa_uzytkownika'] = $nazwa_uzytkownika;
        echo "Rejestracja zakończona pomyślnie!";
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
