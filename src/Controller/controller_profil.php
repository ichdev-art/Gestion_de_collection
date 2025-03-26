<?php

session_start();

require_once '../../config.php';

// On controle si la personne est bien loggée

if (!isset($_SESSION['user_id'])) {
    header('Location:  ../../index.php');
    exit();
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * from `76_mangas` natural join `76_users` where `user_id` = :user_id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

$stmt->execute();

$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$image = "";
$i = 0;

foreach ($allPosts as $post) {

    $image .= "<div class='third'>
        <img src='../../assets/img/users/" . $post['user_id'] . '/' . $post['man_image'] . "'alt='Une image'>
        <img src='../../assets/img/users/" . $post['user_id'] . '/avatar/' . $post['user_avatar'] . "'alt='Une image'>
        <h1>" . $post['user_pseudo'] . "</h1>
        <p>" . $post['man_name'] . "</p>
        <p>" . $post['man_auteur'] . "</p>
        <p>" . $post['man_genre'] . "</p>
        <p>" . $post['man_note'] . "</p>
    </div>";
    $i++;
}

$pdo = '';

include_once '../View/view_profil.php'; ?>
