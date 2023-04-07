<?php

require ("actions/database.php");

//verifier si l'id de la question est rentrer dans l'URL
if(isset($_GET["id"]) AND !empty($_GET["id"])){
    $idOfTheQuestion = $_GET["id"];
    $checkIfQuestionExists = $bdd->prepare("SELECT * FROM questions WHERE id = ?");
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if($checkIfQuestionExists->rowCount()>0){

        $questionsInfos = $checkIfQuestionExists->fetch();

        $question_title = $questionsInfos["titre"];
        //$question_description = $questionsInfos["description"];
        $question_content = $questionsInfos["contenu"];
        $question_id_auteur = $questionsInfos["id_auteur"];
        $question_pseudo_auteur = $questionsInfos["pseudo_auteur"];
        $question_date_publication = $questionsInfos["date_publication"];
    }else{
        $errorMsg= "aucune question trouver";
    }
}else{
    $errorMsg= "aucune question trouver";
}