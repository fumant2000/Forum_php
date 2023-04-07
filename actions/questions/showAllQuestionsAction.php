<?php
require("actions/database.php");

//recuperer les questions par defaut sans recherche

$getAllQuestions = $bdd->query("SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5");

//verifier si une recherche a ete rentrer par l'utilisateur
if(isset($_GET["search"]) AND !empty($_GET["search"])){
    
    //la recherche
    $usersSearch = $_GET["search"];

    //recuperer toutes les questions qui correspondent a la recherche
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
    //$getAllQuestions->execute(array($usersSearch));
}

?>