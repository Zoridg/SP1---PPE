<?php

// Test nom + prenom + mdp
$a = filter_input(INPUT_POST, 'mdp');
$b = filter_input(INPUT_POST, 'nom');
$c = filter_input(INPUT_POST, 'prenom');
//Faux : recharge la page avec un message d'erreur
if ($a != "mdp" || $b != "ad" || $c != "min") {
    //header('Location:generic.html');
    echo '<h1>Mot de passe incorrect/manquant</h1>';
    // Afficher le formulaire de saisie du mot de passe
}
// Le mot de passe a été envoyé et il est bon
else {
    //Redirige vers la page de gestion du type de l'utilisateur
    //header('Location:index.html');
    echo 'ok';
}
                    