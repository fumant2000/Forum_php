<?php
require ("actions/database.php");

if (isset($_POST["validate"])) {

    if(!empty(["answer"])){
        $user_answer=nl2br(htmlspecialchars($_POST["answer"]));
        $InsertAnswer =$bdd->prepare("INSERT INTO reponses(id_auteur, pseudo_auteur, id_question, contenu)VALUES(?, ?, ?, ?)");
        $InsertAnswer->execute(array($_SESSION["id"], $_SESSION["pseudo"], $idOfTheQuestion, $user_answer ));
    }

}
?>