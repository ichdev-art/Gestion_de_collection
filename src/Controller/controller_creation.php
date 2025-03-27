<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nom'])) {
        if (empty($_POST['nom'])) {
            $error['nom'] = 'Nom obligatoire';
        } elseif (!preg_match($regex_name, $_POST['nom'])) {
            $error['nom'] = 'Caractère non autorisés';
        }
    }
    if (isset($_POST['prenom'])) {
        if (empty($_POST['prenom'])) {
            $error['prenom'] = 'Prénom obligatoire';
        } else if (!preg_match($regex_name, $_POST['prenom'])) {
            $error['prenom'] = 'Caractère non autorisés';
        }
    }
}


include_once '../View/view_creation.php';