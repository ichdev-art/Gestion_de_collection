<?php

session_start();

require_once '../../config.php';

// On controle si la personne est bien loggée

if (!isset($_SESSION['user_id'])) {
    header('Location:  controller_connexion.php
    ');
    exit();
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * from `76_mangas` natural join `76_users` where `user_id` = :user_id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

$stmt->execute();

$mangasCard = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = '';

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM `76_favoris` natural join `76_users` natural join `76_mangas` where `user_id` = :user_id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

$stmt->execute();

$favorisCard = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = '';

include_once '../View/view_profil.php'; ?>
