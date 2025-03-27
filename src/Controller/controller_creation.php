<?php

session_start();
require_once '../../config.php';

$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['cover'])) {
        if (empty($_FILES['cover']['name'])) {
            $error['cover'] = 'Photo obligatoire';
        }
    }

    $target_dir = "../../assets/img/users/" . $_SESSION['user_id'] . "/";
    $newName = uniqid() . "_" . basename($_FILES["cover"]["name"]);
    $target_file = $target_dir . $newName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST['name'])) {
        if (empty($_POST['name'])) {
            $error['name'] = 'Titre du mangas obligatoire';
        }
    }
    if (isset($_POST['auteur'])) {
        if (empty($_POST['auteur'])) {
            $error['auteur'] = 'Auteur obligatoire';
        }
    }
    if (isset($_POST['genre'])) {
        if (empty($_POST['genre'])) {
            $error['genre'] = 'genre obligatoire';
        }
    }
    if (isset($_POST['desc'])) {
        if (empty($_POST['desc'])) {
            $error['desc'] = 'Description obligatoire';
        }
    }

    $note = ["1", "2", "3", "4", "5"];

    if (!isset($_POST['note'])) {
        $error['note'] = 'ce champ est obligatoire';
    }


    $status = ["à lire", "en cours", "terminé"];

    if (!isset($_POST['status'])) {
        $error['status'] = 'ce champ est obligatoire';
    }

    if (empty($error)) {

        if ($uploadOk == 0) {
            echo "Désole, votre fichier n'a pas été téléchargé.";
        } else {
            if (move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) {
                echo "Le fichier " . htmlspecialchars(basename($_FILES["cover"]["tmp_name"])) . " a été téléchargé.";
            } else {
                echo "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
            }
        }

        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

        // Options avance sur notre instance
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // On stock notre requête avec des marqueurs nominatif
        $sql = 'INSERT into 76_mangas(man_name,man_auteur,man_genre,man_note,man_image,man_description,man_status,user_id) 
                value 
                (:man_name,:man_auteur,:man_genre,:man_note,:man_image,:man_description,:man_status,:user_id)';

        // On prépare la requête avant de l'exécuter
        $stmt = $pdo->prepare($sql);

        // function permettant de nettoyer les inputs
        function safeInput($string)
        {
            $input = trim($string);
            $input = htmlspecialchars($input);
            return $input;
        }

        $stmt->bindValue(":man_name", safeInput($_POST["name"]), PDO::PARAM_STR);
        $stmt->bindValue(":man_auteur", safeInput($_POST["auteur"]), PDO::PARAM_STR);
        $stmt->bindValue(":man_genre", safeInput($_POST["genre"]), PDO::PARAM_STR);
        $stmt->bindValue(":man_note", $_POST["note"], PDO::PARAM_STR);
        $stmt->bindValue(":man_image", $newName , PDO::PARAM_STR);
        $stmt->bindValue(":man_description", safeInput($_POST["desc"]), PDO::PARAM_STR);
        $stmt->bindValue(":man_status", $_POST['status'], PDO::PARAM_STR);
        $stmt->bindValue(":user_id", $_SESSION['user_id'], PDO::PARAM_INT);

        $stmt->execute();
    }
}



include_once '../View/view_creation.php';
