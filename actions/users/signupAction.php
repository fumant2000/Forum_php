<?php
session_start();
    require("actions/database.php");

    //validate database
    if(isset($_POST["validate"])){

        //verifier si les donnees sont bien entree
        if(!empty($_POST["pseudo"]) AND !empty($_POST['lastname'] AND !empty($_POST["firstname"]) AND !empty($_POST["password"]) )){


            //les donnees de l'utilisateur
            $user_pseudo=htmlspecialchars($_POST["pseudo"]);
            $user_lastname=htmlspecialchars($_POST["lastname"]);
            $user_firstname=htmlspecialchars($_POST["firstname"]);
            $user_password=password_hash($_POST["password"], PASSWORD_DEFAULT);

            //verifications si l'utilisateur exist sur le site
            $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
            $checkIfUserAlreadyExists->execute(array($user_pseudo));

            if($checkIfUserAlreadyExists->rowCount() == 0){
                //insertion de sutilisateur dans le site
                $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, pwd)VALUES (?, ?, ?, ?)');
                $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));
                //recuperation infos utilisateur 
                $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
                $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));
                //stockage des donnees utilisateurs
                $usersInfos=$getInfosOfThisUserReq->fetch();

                //creation des sessions pour authentifier les utilisateurs
                $_SESSION['auth']=true;
                $_SESSION['id']=$usersInfos['id'];
                $_SESSION['firstname']=$usersInfos['prenom'];
                $_SESSION['lastname']=$usersInfos['nom'];
                $_SESSION['pseudo']=$userIfos['pseudo'];

                //redireiger l'utilisateur vers la page d'acceuil
                header("Location: index.php");
             
            }else{
                $errorMsg="l'utilisateur existe deja sur le site";
            }
            }else{
            $errorMsg= "veuillez completer tout les champs..";
        }
    }
