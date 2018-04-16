<?php include('verif.php'); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Fiches des interventions</title>
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
            <div class="inner">
                <header class="align-center">
                    <div class="12u$">
                        <h2>FICHES DES INTERVENTIONS - RECHERCHE</h2>
                    </div>
                </header>
                <div>
                    <div class="12u$">
                        <form method="post" action="search.php">
                            <input type="text" name="recherche" value="" placeholder="Numero intervention a rechercher"/>
                            <input type="submit" value="submit" />
                            <input type="hidden" name="int"/>
                        </form>
                        <form method="post" action="searchall.php">
                            <input type="submit" value="Recherche tous" />
                            <input type="hidden" name="client"/>
                        </form>
                        <div class="12u$">
                            <form method="post" action="return.php">
                                <input type="submit" name="return" value="Retour"/>
                            </form>
                        </div>

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