<?php

session_start();


//regex pour le commentaire
$regex_comment = "/^(?!\s*$)[\p{L}\p{N}\p{P}\p{S}\s\p{Emoji}]+$/";

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

include_once '../View/view_mangasPage.php';