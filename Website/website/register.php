<?php

//Reprise des variables entrées
$post_mdp = hash("sha256", filter_input(INPUT_POST, 'mdp'));
$post_nom = filter_input(INPUT_POST, 'nom');
$post_prenom = filter_input(INPUT_POST, 'prenom');
$post_email = filter_input(INPUT_POST, 'email');
$post_civ = filter_input(INPUT_POST, 'civ');
$post_type = filter_input(INPUT_POST, 'type');
$post_key = filter_input(INPUT_POST, 'key');
$activationKeyVerif = "08549K";

//Faux : recharge la page avec un message d'erreur

//Connexion à la bdd
try{
        $bdd = new PDO('mysql:host=localhost;dbname=ppe1;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

//Query : nom prenom
$reponse = $bdd->query('SELECT nom, prenom, email FROM membre');

//Recherche de l'utilisateur 
$searchFound = false;
while ($donnee = $reponse->fetch())
{
    if(($donnee['nom'] == $post_nom) && ($donnee['prenom'] == $post_prenom) || ($donnee['email'] == $post_email))
    {
        //Identifiant déjà enregistré -> login
        $searchFound = true;
        header('Location:generic.html');
        echo '<div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Identifiant déjà enregistré !</strong>  </div>';
    }
}

if($searchFound == false){
  //Préparation de la requete
  $req = $bdd->prepare('INSERT INTO membre(nom, prenom, password, email, civilite, type) VALUES(:nom, :prenom, :mdp, :email, :civ, :type)');
  
  //Tout est bon, on peut enregistrer et log in
  if($post_key == $activationKeyVerif){
      $req->execute(array(
	'nom' => $post_nom,
	'prenom' => $post_prenom,
	'email' => $post_email,
	'mdp' => $post_mdp,
	'civ' => $post_civ,
        'type' => $post_type
	));
      session_start();
        $_SESSION['nom'] = $post_nom;
        $_SESSION['prenom'] = $post_prenom;
        header('Location:index.html');
  }
  else{
      header('Location:register.html');
      echo '<div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Mauvaise clé d\'activation</strong>  </div>';
  }
}
