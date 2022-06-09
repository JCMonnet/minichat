<?php
session_start();

include_once('connexion.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Le chat des potos</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- bloc pseudo + messages -->
    <p class="info"> Pour les echanges c'est ici, courtoisie et gentillesse merci ! </p>
    <form id="formulaire" action="traitement.php" method="post">
        <table id="champs">
            <tr class="lignes">
                <td> <label for="pseudo"> Qui nous parle? (25 caractères max) : </label></td>
                <td> <input type="text" name="pseudo" id="pseudo" maxlength="25" required /> </td>
            </tr>


            <tr class="lignes">
                <td> <label for="message"> Exprime toi (255 caractères max) : </label></td>
                <td> <input type="text" name="message" id="message" maxlength="255" required />
                </td>
            </tr>
            <tr class="lignes" id="bouton">
                <td colspan="2"> <input type="submit" value="Envoyer" /> </td>
            </tr>
        </table>
    </form>


    <!-- bloc affichage 5 derniers messages -->
    <?php
    $reponses = $mysqlConnection->query('SELECT messages_pseudo,messages_dateM,messages_contenu FROM messages ORDER BY messages_dateM DESC LIMIT 5');
    ?>

    <p class="info"> Liste des 5 derniers messages </p>
    <div id="messages">

        <?php foreach ($reponses as $reponse) { 
            
            echo '<p>' . $reponse['messages_pseudo'] . ' a dit : ' . $reponse['messages_contenu'] . ' le : ' . $reponse['messages_dateM'] . '</p>';
        
        }?>
    </div>
</body>

</html>