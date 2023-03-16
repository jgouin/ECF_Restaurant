<?php

require_once ('templates/header.php');
require_once ('Entity/User.php');
require_once ('Controller/UserController.php');


if ($_POST) {
    
    $userController = new UserController();
    $user = $userController->getUserByEmail($_POST['email']);
   
    if ($user && password_verify($_POST['password'], $user->getPassword() )){

        $_SESSION["user"] = $user;

        $_SESSION["id"] = $user->getId();
        $_SESSION["username"] = $user->getUsername();
        $_SESSION["email"] = $user->getEmail();
        $_SESSION["nbCovers"] = $user->getNbCovers();
        $_SESSION["allergies"] = $user->getAllergies();

        echo "<script>window.location='index.php';</script>";

    } else {

        echo ('<div class="alert alert-danger"><p>E-mail ou mot de passe incorrect</p></div>');
        echo "<script>
                setTimeout(() => {
                window.location='formConnexion.php';
                }, '1500')
            </script>";
    }
    
 }

?>
<p class="text-end m-3 px-4">
    <small><a class="text-muted" href="newUser.php">Je créé mon compte</a></small>
</p>

<form method="POST" class="text-center">
<h3 class="mb-3">Connexion</h3>

<div class="form-floating m-1 mx-5">
    <input type="email" class="form-control" name="email" id="email" placeholder="nom@exemple.com">
    <label for="email">Adresse e-mail</label>
</div>
<div class="form-floating m-1 mx-5">
    <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
    <label for="password">Mot de passe</label>
</div>

<button type="submit" class="btn btn-lg mt-3" name="loginUser" >Se connecter</button>


</form>
<?php

require_once ('templates/footer.php');

?>