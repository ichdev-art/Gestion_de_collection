<?php

require_once '../../config.php';

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location:  controller_profil.php');
    exit();
}

$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        if (empty($_POST['email'])) {
            $error['email'] = 'Email ou pseudo obligatoire';
        }
    }
    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $error['password'] = 'Mot de passe obligatoire';
        }
    }

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        // On se connecte a la base de donnée via pdo = creation instance
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

        // Options avance sur notre instance
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * from 76_users where user_mail = :email or user_pseudo = :email';

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);

        $stmt->execute();

        $stmt->rowCount() == 0 ? $found = false : $found = true;

        // on stock le resultat de la requete dans un tableau associatif
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($found == false) {
            $error['connexion'] = 'Email ou Mot de passe incorrect';
        } else {
            if (password_verify($_POST['password'], $user['user_password'])) {
                $_SESSION = $user;
                header('Location: controller_profil.php');
                exit;
            } else {
                $error['connexion'] = 'Email ou Mot de passe incorrect';
            }
        }

        $pdo = '';
    }
}


include_once '../View/view_connexion.php';