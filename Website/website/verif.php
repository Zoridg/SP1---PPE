<?
    session_start();
/* 
si la variable de session login n'existe pas cela siginifie que le visiteur 
n'a pas de session ouverte, il n'est donc pas logué ni autorisé à
acceder à l'espace membres
*/
//voir https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/session-cookies
if (!isset($_SESSION)) {
  header("Location: index.html");
  session_destroy();
}