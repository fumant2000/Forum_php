<?php 
require("actions/users/securityAction.php");
require("actions/questions/getInfosOfEditedQuestionAction.php");
require("actions/questions/editQuestionAction.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php"; ?>

<body>
    <?php include "includes/navbar.php"; ?>

    <br><br>
    <div class="container">
        <?php  
        if(isset($errorMsg)){
            echo '<p>' .$errorMsg. '</p>';  
        }elseif(isset($successMsg)){
            echo '<p>' .$successMsg. '</p>';
            }
            ?>
        <?php 
            if(isset($question_content)){
                ?>
        <form method="POST">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titre</label>
                <input type="text" class="form-control" name="title" value="<?=  $question_title ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="description" class="form-control"><?=  $question_description ?></textarea>
                <!--<input type="text" class="form-control" name="descrit"> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Contenu</label>
                <textarea class="form-control" name="content"><?=  $question_content ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button> <br>
        </form>
        <?php
            }
            ?>

    </div>


</body>

</html>