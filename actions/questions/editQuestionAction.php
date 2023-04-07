<?php

require ("actions/database.php");

//validation du formulaire
if (isset($_POST["validate"])) {
//verifier si les champs sont bien  remplis
if(!empty($_POST["title"]) AND !empty(["description"])  AND !empty(["description"])){

    //donnees a faire passer dans la requete
    $new_question_title= htmlspecialchars($_POST["title"]);
    $new_question_description=nl2br( htmlspecialchars($_POST["description"]));
    $new_question_content=nl2br( htmlspecialchars($_POST["content"]));
    
    //modifier les informations de la question
    $editQuestionOnWebsite = $bdd -> prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id= ?');
    $editQuestionOnWebsite -> execute(array( $new_question_title, $new_question_description, $new_question_content, $idOfQuestion));
    //redirier l'utilisateur
    header("location: my-questions.php");
    
}else{

    $errorMsg="veuillez completer tout les champs";

}
}
