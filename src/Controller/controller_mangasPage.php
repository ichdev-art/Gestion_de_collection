<?php

session_start();
include_once '../../config.php';
include_once '../Model/model_mangas.php';


//regex pour le commentaire
$regex_comment = "/^(?!\s*$)[\p{L}\p{N}\p{P}\p{S}\s\p{Emoji}]+$/";
$error = [];

if (!isset($_SESSION['user_id'])) {
    header('Location: controller_connexion.php');
    exit;
}

// COMMENTAIRE


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['comment'])) {
        if (empty($_POST['comment'])) {
            $errors['comment'] = 'commentaire vide';
        } elseif (!preg_match($regex_comment, $_POST['comment'])) {
            $errors['comment'] = 'commentaire invalide';
        }
    }
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT man_name,man_id,man_auteur,man_genre,man_note,man_image,man_description,man_status,user_avatar,user_pseudo,user_id from `76_mangas` natural join `76_users` where man_id = :man_id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':man_id', $_GET['manga'], PDO::PARAM_INT);

$stmt->execute();

$mangasCard = $stmt->fetch(PDO::FETCH_ASSOC);



$pdo = '';

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT com_text,user_pseudo FROM 76_comment natural join 76_users where man_id = :man_id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':man_id', $_GET['manga'], PDO::PARAM_INT);

$stmt->execute();

$comment = $stmt->fetchAll(PDO::FETCH_ASSOC);


switch ($mangasCard['man_note']) {
    case 1:
        $note = '<i class="fa-solid fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>';
        break;

    case 2:
        $note = '<i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>';
        break;

    case 3:
        $note = '<i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>';
        break;

    case 4:
        $note = '<i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>';
        break;

    case 5:
        $note = '<i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>';
        break;

    default:
        break;
}

if (isset($_GET['mangas'])) {
    Mangas::deleteMangas($_GET['mangas']);
    header('Location: controller_profil.php?mangas=' . $_GET['mangas']);
}

include_once '../View/view_mangasPage.php';
