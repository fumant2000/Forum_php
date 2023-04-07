<?php

//verifier si l'utilisateur est authentifier pour supprimer les questions du site
session_start();
if(!$_SESSION['auth']){
    header('Location: ../../login');
}

require ('../database.php');
//verifier si l'id est rentrer en parametre dans l'URL
if (isset($_GET["id"]) AND !empty($_GET["id"])){

    //l'id de la question en parametre
    $idOfTheQuestion = $_GET["id"];

    //verifier si la question existe
     $checkIfQuestionExists = $bdd-> prepare("SELECT * FROM questions WHERE id = ?");
     $checkIfQuestionExists->execute(array($idOfTheQuestion));
    

     if($checkIfQuestionExists -> rowCount() >0){

        //recuperer les infos de la question
        $questionsInfos=$checkIfQuestionExists->fetch();
        if($questionsInfos['id_auteur'] == $_SESSION['id']){


            //Supprimer la question en fonction de son id rentrer en parametre
            $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfTheQuestion));
            header("Location: ../../my-questions.php");

        }else{
            echo "vous n'avez pas le droit de supprimer une question qui ne vous appartient pas";

     }
}else{
    echo "aucune question n'a ete detecter";
}
}