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

    // var_dump($_SESSION);
    // var_dump($_POST);
    // var_dump($_FILES);

    $note = ["1", "2", "3", "4", "5"];

    if (!isset($_POST['note'])) {
        $errors['note'] = 'ce champ est obligatoire';
    } elseif (!in_array($_POST['genre'], $note)) {
        $errors['note'] = 'non valide';
    }

    
    $status = ["à lire", "en cours", "terminé"];

    if (!isset($_POST['note'])) {
        $errors['note'] = 'ce champ est obligatoire';
    } elseif (!in_array($_POST['genre'], $status)) {
        $errors['note'] = 'non valide';
    }



    // var_dump($errors);

    if (empty($errors)) {
        if ($_FILES['pfp']['error'] == 4) {

            // EDITER LA BIO DU PROFIL // 
            // connexion à la base de données via PDO (PHP Data Objects) = création instance
            $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

            // options activées sur notre instance
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //on stock notre requête de creation du post avec des marqueurs nominatifs
            $sql = "UPDATE `76_users` 
                SET `user_bio` = :bio
                WHERE `user_id` = :user_id";

            // on prépare la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // 
            $stmt->bindValue(':bio', safeInput($_POST['bio']), PDO::PARAM_STR);
            $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

            // Exécuter la requête
            if ($stmt->execute()) {
                $_SESSION['user_bio'] = safeInput($_POST['bio']);
            }

            if ($_POST['pseudo'] != $_SESSION['user_pseudo']) {

                $sql = "UPDATE `76_users` 
                SET `user_pseudo` = :pseudo
                WHERE `user_id` = :user_id";

                // on prépare la requête avant de l'exécuter
                $stmt = $pdo->prepare($sql);

                // 
                $stmt->bindValue(':pseudo', safeInput($_POST['pseudo']), PDO::PARAM_STR);
                $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

                try {
                    $stmt->execute();
                    $_SESSION['user_pseudo'] = safeInput($_POST['pseudo']);

                    header('Location: controller-profile.php');
                    exit;
                } catch (PDOException $e) {
                    $errors['pseudo'] = "pseudo non disponible";
                }
            }
        } else {

            // EDITER LA BIO DU PROFIL // 
            // connexion à la base de données via PDO (PHP Data Objects) = création instance
            $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

            // options activées sur notre instance
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //on stock notre requête de creation du post avec des marqueurs nominatifs
            $sql = "UPDATE `76_users` 
                SET `user_bio` = :bio
                WHERE `user_id` = :user_id";

            // on prépare la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // 
            $stmt->bindValue(':bio', safeInput($_POST['bio']), PDO::PARAM_STR);
            $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

            // Exécuter la requête
            if ($stmt->execute()) {
                $_SESSION['user_bio'] = safeInput($_POST['bio']);
            }


            if ($_POST['pseudo'] != $_SESSION['user_pseudo']) {

                $sql = "UPDATE `76_users` 
                SET `user_pseudo` = :pseudo
                WHERE `user_id` = :user_id";

                // on prépare la requête avant de l'exécuter
                $stmt = $pdo->prepare($sql);

                // 
                $stmt->bindValue(':pseudo', safeInput($_POST['pseudo']), PDO::PARAM_STR);
                $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
            }
        }
    }
}

include_once '../View/view_.php';