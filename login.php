<?php 
require('actions/users/loginAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'?>
<body>
<br><br>
    <form class="container" method="POST">
        <?php if(isset($errorMsg)){echo '<p>' .$errorMsg. '</p>'; } ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Se connecter</button> <br>
        <p> je n'ai pas de  compte!!  <a href="signup.php">s'inscrire</a></p> 
    </form>
</body>
</html>