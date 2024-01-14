<?php
function get_db()
{
    require '../../../vendor/autoload.php';
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

function save_selected_photos( $user, $currentPage, $selectedPhotos)
{
    $db = get_db();
    $collection = $db->selected_photos;
    $document = $collection->findOne(['user' => $user]);

    if (!$document) {
        $collection->insertOne(['user' => $user, 'photos' => [$currentPage => $selectedPhotos]]);
    } else {
        $existingPhotos = $document['photos'] ?? [];
        $existingPhotos[$currentPage] = $selectedPhotos;
        $collection->updateOne(['user' => $user], ['$set' => ['photos' => $existingPhotos]]);
    }
}
function save_unselected_photos($user, $selectedPhotos){
    $db = get_db();
    $collection = $db->selected_photos;
    $document = $collection->findOne(['user' => $user]);

    if (!$document) {
        $collection->insertOne(['user' => $user, 'photos' => $_SESSION['selected_photos_pages']]);
    } else {
        $collection->updateOne(['user' => $user], ['$set' => ['photos' => $_SESSION['selected_photos_pages']]]);
    }
}

function save_data_about_photos($namePhoto, $author, $title){
    $db = get_db();
    $document = [
        'user_id' => $namePhoto, 
        'author' => $author,
        'title' => $title,
    ];
    $collection = $db->nazwa_kolekcji;
    $collection->insertOne($document);
}

function get_data_about_photos(){
    $db = get_db();
    $collection = $db->nazwa_kolekcji;
    return iterator_to_array($collection->find());
}

function save_users($nazwa_uzytkownika,$email,$haslo){
    $db = get_db();
    $collection = $db->users;

    $user = [
        'nazwa_uzytkownika' => $nazwa_uzytkownika,
        'email' => $email,
        'haslo' => $haslo,
    ];
    $collection->insertOne($user);
}

function get_users_by_user($user){
    $db = get_db();
    $collection = $db->users;
    return $collection->findOne(['nazwa_uzytkownika' => $user]);
}

function get_users_by_email($email){
    $db = get_db();
    $collection = $db->users;
    return $collection->findOne(['email' => $email]);
}







