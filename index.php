<?php 
//session_start();
require ("actions/questions/showAllQuestionsAction.php");
require("actions/users/securityAction.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php" ?>

<body>
    <?php include "includes/navbar.php"; ?>
    <br><br>
    <div class="Container">
        <form action="" method="GET">
            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="search" id="" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>
            </div>
        </form>
        <br>
        <?php
        while($question = $getAllQuestions->fetch()){
            ?>
        <div class="card">
            <div class="card-header">
                <a href="questions.php?id=<?=$question["id"];?>"><?= $question['titre']; ?></a>
            </div>
            <div class="card-body">
                <?= $question['description']; ?>

            </div>
            <div class="card-footer">
                publier par <a href="profile.php?id=<?= $question["id_auteur"]?>"> <?= $question['pseudo_auteur']; ?> </a> le <?= $question["date_publication"]; ?>
            </div>
        </div>
        <br>
        <?php
        }
        ?>
    </div>
</body>

</html>