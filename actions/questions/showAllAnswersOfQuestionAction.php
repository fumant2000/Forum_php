<?php

require('actions/database.php');

$getAllAnswersOfThisQuestion = $bdd -> prepare("SELECT id_auteur, pseudo_auteur, id_question, contenu FROM reponses WHERE id_question = ? ORDER BY id DESC");
$getAllAnswersOfThisQuestion->execute(array($idOfTheQuestion));