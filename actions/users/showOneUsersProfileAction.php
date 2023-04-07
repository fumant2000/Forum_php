<?php
require("actions/database.php");


//verifier  l'i de l'utilisateur concerner dans l'url
if(isset($_GET["id"]) AND !empty(["id"])){

    //stocker la valeur de l'id
    $idOfUser = $_GET["id"];

    //verifier s'i existe en base de donnee
    $checkIfUserExists = $bdd -> prepare("SELECT pseudo, nom, prenom FROM users WHERE id = ? ");
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount()>0){

        //stocker ses infos
        $usersIfos = $checkIfUserExists->fetch();

        $user_pseudo = $usersIfos["pseudo"];
        $user_lastname = $usersIfos["nom"];
        $user_firstname = $usersIfos["prenom"];

        //recuperer tout ces questions 
        $getHisQuestions=$bdd->prepare("SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC");
        $getHisQuestions->execute(array($idOfUser));



    }else{
        $errorMsg="Aucun utilisateur trouver";
    }
}else{
    $errorMsg="Aucun utlisateur trouve";
}

?>