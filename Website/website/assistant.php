<?php session_start();?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Fiche d'assistant</title>
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
                    <p>Bonjour <?php echo $_SESSION['prenom']; echo ' '; echo $_SESSION['nom']?></p>
                </div>
            </header>
            <div class="inner">
                <div>
                    <div class="12u$">
                        <form action="clients.php" method="post">
                                <input type="submit" value="Consulter les fiches des clients" class="12u$"/>
                        </form>
                        <form action="techniciens.php" method="post">
                                <input type="submit" value="Consulter les fiches des techniciens" class="12u$"/>
                        </form>
                        <form action="interventions.php" method="post">
                                <input type="submit" value="Consulter les fiches d'intervention" class="12u$"/>
                        </form>
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