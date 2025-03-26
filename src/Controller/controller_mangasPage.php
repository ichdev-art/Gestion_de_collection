<?php

session_start();
include_once '../../config.php';


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

$sql = 'SELECT * from `76_mangas` m natural join `76_users` u left join `76_comment` c on u.user_id = c.user_id where m.man_id = :man_id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':man_id', $_GET['manga'], PDO::PARAM_INT);

$stmt->execute();

$mangasCard = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($mangasCard);
$pdo = '';

include_once '../View/view_mangasPage.php';