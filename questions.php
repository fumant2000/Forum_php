<?php 
require("actions/users/securityAction.php");
require("actions/questions/showQuestionContentAction.php");
require("actions/questions/postAnswerAction.php");
require("actions/questions/showAllAnswersOfQuestionAction.php");
 ?>
<!DOCTYPE html>
<html>
<?php include 'includes/head.php'; ?>;
<body>
<?php include 'includes/navbar.php'; ?>
<br><br>
<div class="container">
    <?php

    if(isset($errorMsg)){echo $errorMsg;}
    if(isset($question_date_publication)){
        ?>
        <section class="show-content">
        <h3><?=  $question_title; ?></h3>
        <hr>
        <p><?=  $question_content; ?></p>
        <hr>
        <small> <?= '<a href="profile.php?id=' .$question_id_auteur.' ">' .$question_pseudo_auteur .' </a> ' . $question_date_publication ; ?></small>
        </section>
        <br>
        <section class="show-answers">

        <form class="form-group" method="POST">
            <div class="mb-3">
            <label  class="form-label" for="exempleInputEmail">Repondre:</label>
            <textarea name="answer" class="form-control"></textarea>
            <br>
            <button class="btn btn-primary" type="submit" name="validate">Repondre</button>
            </div>  
        </form>

        <?php
            while($answer = $getAllAnswersOfThisQuestion->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                     <a href="profile.php?id=<?= $answer['id_auteur'];?>"><?= $answer["pseudo_auteur"]; ?></a>   
                    </div>
                    <div class="card-body">
                        <?= $answer["contenu"]?>
                    </div>
                </div>
                <br>
                <?php
            }
        ?>
        </section>
        <?php

    }
    ?>

</div>
</body>
</html>