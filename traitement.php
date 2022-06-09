<?php
session_start();
include_once'connexion.php';

// Insertion du message à l'aide d'une requête préparée
$req = $mysqlConnection->prepare('INSERT INTO messages (messages_pseudo, messages_dateM, messages_contenu) VALUES(?,NOW(),?)');
// execution de la requete, strip_tags pour sécuriser
$req->execute(array(
    $_POST['pseudo'], 
    strip_tags($_POST['message']))); 

// Redirection du visiteur vers la page du minichat
header('Location: index.php');
?>
