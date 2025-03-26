<?php


require_once '../../config.php';


$regex_password = "/^[a-zA-Z0-9]{8,30}+$/";
$regex_pseudo = "/^[A-Za-z0-9-_-]+$/";
$error = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // on stock notre requete avec les marqueurs
    $sql = 'SELECT * from `76_users` where user_pseudo = :pseudo';

    // on prepare la requete pour se premunir des injection SQL
    $stmt = $pdo->prepare($sql);

    // on bind la valeur du post
    $stmt->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);

    $stmt->execute();

    // on compte le nombre de ligne pour savoir si ya un autre pseudo utiliser
    $stmt->rowCount() == 0 ? $found = false : $found = true;

    $pdo = '';

    if (isset($_POST['pseudo'])) {
        if (empty($_POST['pseudo'])) {
            $error['pseudo'] = 'Pseudo obligatoire';
        } else if (!preg_match($regex_pseudo, $_POST['pseudo'])) {
            $error['pseudo'] = 'Caractère non autorisés';
        } else if ($found == true) {
            $error['pseudo'] = 'Pseudo non disponible';
        }
    }
    
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * from `76_users` where user_mail = :email';

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);

    $stmt->execute();

    $stmt->rowCount() == 0 ? $found = false : $found = true;

    $pdo = '';

    if (isset($_POST['email'])) {
        if (empty($_POST['email'])) {
            $error['email'] = 'Email obligatoire';
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Email non valide';
        } else if ($found == true) {
            $error['email'] = 'Email déjà utilisé';
        }
    }
    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $error['password'] = 'Mot de passe obligatoire';
        } else if (!preg_match($regex_password, $_POST['password'])) {
            if (strlen($_POST['password']) < 8) {
                $error['password'] = 'Trop petit';
            }
            if (strlen($_POST['password']) > 30) {
                $error['password'] = 'Trop grand';
            }
        }
    }

    if (empty($error)) {

        // On se connecte a la base de donnée via pdo = creation instance
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

        // Options avance sur notre instance
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // On stock notre requête avec des marqueurs nominatif
        $sql = 'INSERT INTO 76_users 
            (user_pseudo,user_mail,user_password) 
            VALUE 
            (:pseudo,:mail,:password)';

        // On prépare la requête avant de l'exécuter
        $stmt = $pdo->prepare($sql);

        // function permettant de nettoyer les inputs
        function safeInput($string)
        {
            $input = trim($string);
            $input = htmlspecialchars($input);
            return $input;
        }

        $stmt->bindValue("pseudo", safeInput($_POST["pseudo"]), PDO::PARAM_STR);
        $stmt->bindValue("mail", safeInput($_POST["email"]), PDO::PARAM_STR);
        $stmt->bindValue("password", password_hash($_POST["password"], PASSWORD_DEFAULT), PDO::PARAM_STR);

        if ($stmt->execute()) {
            $last_user_id = $pdo->lastInsertId();
            $destination = __DIR__ . "/../../assets/img/users/" .$last_user_id . "/avatar";
            $source = __DIR__ . "/../../avatar.png";
            $new_file = $destination . '/avatar.png';

            if (mkdir($destination, 0777, true)) {
                if (copy($source, $new_file)) {
                    header('Location: controller_confirmation.php');
                    exit();
                }
                $pdo = '';
            }
        };
    }
}



include_once '../View/view_inscription.php';