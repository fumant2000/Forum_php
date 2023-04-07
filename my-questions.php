<?php 
require ("actions/users/securityAction.php");
require('actions/questions/myQuestionsAction.php');

 ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>
    <br>
    <div class= "container">
    <?php

while($question=$getAllMyQuestions->fetch()){
    ?>
    <br>
    <div class="card" style="width: 35rem;">
        <h5 class="card-header">
        <a href="questions.php?id=<?=$question["id"];?>"><?= $question['titre']; ?></a></h5>
        <div class="card-body">
            <p class="card-text">
                <?= $question["description"]; ?>
            </p>
            <a href="questions.php?id=<?= $question["id"];?>" class="btn btn-primary">acceder a la question</a>
            <a href="edit-question.php?id=<?= $question["id"]; ?>" class="btn btn-warning">Modifier la question</a>
            <a href="actions/questions/deleteQuestionAction.php?id=<?= $question["id"]; ?>" class="btn btn-danger">suprimer la question</a>
        </div>
    </div>
    <?php
}
?>
</div>

</body>

</html>