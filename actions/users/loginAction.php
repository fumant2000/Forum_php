<?php
session_start();
    require("actions/database.php");
    //validation du formulaire
    if(isset($_POST["validate"])){

        //verifier si les donnees sont bien entree
        if(!empty($_POST["pseudo"]) AND !empty($_POST["password"]) ){
            //les donnees de l'utilisateur
            $user_pseudo=htmlspecialchars($_POST["pseudo"]);
            $user_password=htmlspecialchars($_POST["password"]);
        
            //verifier si l'utilisateur existe
            $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
            $checkIfUserExists->execute(array($user_pseudo));

            if($checkIfUserExists->rowCount() > 0){

                //eregistrer les informations de l'utilisateur dans une variable
                $usersInfos=$checkIfUserExists->fetch();

                //verifier si le mot de passe est correct
                if(password_verify($user_password, $usersInfos['pwd'] )){
                //creation des sessions pour authentifier les utilisateurs
                $_SESSION['auth']=true;
                $_SESSION['id']=$usersInfos['id'];
                $_SESSION['firstname']=$usersInfos['prenom'];
                $_SESSION['lastname']=$usersInfos['nom'];
                $_SESSION['pseudo']=$usersInfos['pseudo'];
                //redirection vers la page d'acceuil
                header("Location: index.php");
            }else{
                $errorMsg="votre mot de passe est incorrect";
            }
         } else{
                $errorMsg="votre pseudo est incorrect";
            }

            }else{
            $errorMsg= "veuillez completer tout les champs..";
        }
    
    }
    

    