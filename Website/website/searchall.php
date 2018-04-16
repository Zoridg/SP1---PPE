<?php
// voir : https://openclassrooms.com/courses/realiser-un-moteur-de-recherche-pour-son-site
include('verif.php');

//Connexion à la bdd
try {
    $bdd = new PDO('mysql:host=localhost;dbname=ppe1;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$type = "";
$numero = "";
//Choix de la bdd à choisir
if (isset($_POST['tech'])) {
    $type = "technicien";
    $numero = "matricule";
} else if (isset($_POST['int'])) {
    $type = "intervention";
    $numero = "nomTech";
} else if (isset($_POST['client'])) {
    $type = "client";
    $numero = "Numero";
}

//Query de la recherche demandée
$query = $bdd->query("SELECT * FROM " . $type) or die(mysql_error());
//$data = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Fiches des techniciens</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body class="subpage">
        <header id="header">
            <div class="inner">
                <nav id="nav">
                    <a href="index.html">Se deconnecter</a>
                </nav>
                <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
            </div>
        </header>

        <section id="three" class="wrapper">
            <header class="align-center">
                <div class="12u$">
                    <h2>AFFICHAGE DES TABLES</h2>
                </div>
            </header>
            <div class="inner">
                <div>
                    <div class="12u$">
                        <div class="table-wrapper">
                            <?php
                            $nbr = $query->rowCount();
                            if ($nbr == 0) {
                                echo'<h3>Pas de resultats</h3> <p>Nous n\'avons trouve aucun resultat pour votre requete "' . $_POST['recherche'] . '".';
                            } else {
                                if ($type == "client") {
                                    echo '
                                <table class = "alt">
                                <thead>
                                <tr>
                                <th>Numero</th>
                                <th>Raison SA</th>
                                <th>SIREN</th>
                                <th>APE</th>
                                <th>Adresse</th>
                                <th>Telephone</th>
                                <th>Telecopie</th>
                                <th>Email</th>
                                <th>NumAgence</th>
                                </tr>
                                </thead>
                                <tbody>';
                                    while ($row = $query->fetch()) {
                                        echo '<tr>
                                <td>' . $row['Numero'] . '</td>
                                <td>' . $row['RaisonSa'] . '</td>
                                <td>' . $row['NumSiren'] . '</td>
                                <td>' . $row['codeAPE'] . '</td>
                                <td>' . $row['AdressePost'] . '</td>
                                <td>' . $row['numTelephone'] . '</td>
                                <td>' . $row['numTelecopie'] . '</td>
                                <td>' . $row['AdresseElectronique'] . '</td>
                                <td>' . $row['numAgence'] . '</td>
                                <th><a href = "assistant.php">modifier</a></th>
                                <th><a href = "assistant.php">affecter interv</a></th>
                                </tr>';
                                    }
                                    echo '</tbody> </table>';
                                } else if ($type == "technicien") {
                                    echo '
                                <table class = "alt">
                                <thead>
                                <tr>
                                <th>Matricule</th>
                                <th>NumAgence</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Qualification</th>
                                <th>Date d\'obtention</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                    while ($row = $query->fetch()) {
                                        echo '<tr>
                                        <td>' . $row['matricule'] . '</td>
                                        <td>' . $row['numAgence'] . '</td>
                                        <td>' . $row['numTelTech'] . '</td>
                                        <td>' . $row['mailTech'] . '</td>
                                        <td>' . $row['qualification'] . '</td>
                                        <td>' . $row['dateObtentionQualification'] . '</td>
                                        <th><a href="assistant.php">modifier</a></th>
                                        <th><a href="assistant.php">affecter interv</a></th>
                                 </tr>';
                                    }
                                    echo '</tbody> </table>';
                                } else if ($type == "intervention") {
                                    echo '
                            <table class="alt">
                                <thead>
                                    <tr>
                                        <th>Nom Technique</th>
                                        <th>Heure Intervention</th>
                                        <th>Numero</th>
                                        <th>Matricule</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                    while ($row = $query->fetch()) {
                                        echo '<tr>
                                        <td>' . $row['nomTech'] . '</td>
                                        <td>' . $row['heureIntervention'] . '</td>
                                        <td>' . $row['Numero'] . '</td>
                                        <td>' . $row['matricule'] . '</td>
                                        <th><a href="assistant.php">modifier</a></th>
                                        <th><a href="assistant.php">affecter interv</a></th>
                                 </tr>';
                                    }
                                    echo '</tbody> </table>';
                                }
                            }
                            ?>
                        </div>

                        <p><a href="assistant.php">Faire une nouvelle recherche</a></p>
                    </div>
                </div>
            </div>

        </section>

        <!-- Footer -->
        <footer id="footer" >
        </footer>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>