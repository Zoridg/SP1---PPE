<?php

if (isset($_POST) && !empty($_POST['nom']) && !empty($_POST['mdp']) && !empty($_POST['prenom'])) {
    //Reprise des variables entrées
    //$post_mdp = hash("sha256", filter_input(INPUT_POST, 'mdp'));
    $post_mdp = filter_input(INPUT_POST, 'mdp');
    $post_nom = filter_input(INPUT_POST, 'nom');
    $post_prenom = filter_input(INPUT_POST, 'prenom');

    //Connexion à la bdd
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=ppe1;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    //Query : nom prenom pass
    $reponse = $bdd->query('SELECT nom, prenom, password FROM membre');


    $sql = "SELECT password FROM membre WHERE nom='" . $post_nom . "'" . "AND prenom='" . $post_prenom . "'";
    $req = $bdd->query($sql) or die(print_r($bdd->errorInfo()));
    $data = $req->fetch(PDO::FETCH_ASSOC);
    
    //Vérifcation du mot de passe
    if ($data['password'] != $post_mdp) {
        header('Location:generic.html');
        echo '<div class="alert alert-dismissable alert-danger"">
         <button type="button" class="close" data-dismiss="alert">x</button>
         <strong>Oh Non !</strong> Mauvais login / password. Merci de recommencer ! </div>';
    } else {
        session_start();
        $_SESSION['nom'] = $post_nom;
        $_SESSION['prenom'] = $post_prenom;
        header('Location:assistant.php');
    }
} 
else {
     header('Location:generic.html');
    echo '<div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Des champs sont vides</strong>  </div>';
}