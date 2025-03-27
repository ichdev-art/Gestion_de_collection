<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page profile
    header('Location: controller-profile.php');
    exit;
}

require_once '../../config.php';

$errors = [];

function safeInput($string)
{
    $input = trim($string);
    $input = htmlspecialchars($input);
    return $input;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $note = ["1", "2", "3", "4", "5"];

    if (!isset($_POST['note'])) {
        $errors['note'] = 'ce champ est obligatoire';
    }


    $status = ["à lire", "en cours", "terminé"];

    if (!isset($_POST['status'])) {
        $errors['status'] = 'ce champ est obligatoire';
    }

    if (empty($errors)) {
    // EDITER LA BIO DU PROFIL // 
    // connexion à la base de données via PDO (PHP Data Objects) = création instance
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

    // options activées sur notre instance
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //on stock notre requête de creation du post avec des marqueurs nominatifs
    $sql = "UPDATE `76_mangas` 
                SET `man_note` = :man_note, `man_status` = :man_status
                WHERE `man_id` = :man_id";



    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':man_note', safeInput($_POST['note']), PDO::PARAM_INT);
    $stmt->bindValue(':man_status', $_POST['status'], PDO::PARAM_STR);
    $stmt->bindValue(':man_id', $_GET['manga'], PDO::PARAM_INT);

    $stmt->execute();

    $sql= "SELECT man_id from `76_mangas` where man_id = :man_id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':man_id', $_GET['manga'], PDO::PARAM_INT);

    $stmt->execute();

    $mangasCard = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(empty($errors)) {
        header('Location: controller_mangasPage.php?manga=' . $mangasCard['man_id'] . '');
        exit;
    }
    

    }
}



require_once '../View/view_editPost.php';
