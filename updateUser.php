
<?php
require_once ('templates/header.php');
require_once ('Entity/User.php');
require_once ('Controller/UserController.php');


if(($_SESSION['username'] !== 'admin') && ($_SESSION['email'] !== 'quai_Antique@Chambery.fr')){


if(isset($_POST['updateUser'])){

    if ($_POST["password"] === $_POST["confirmPassword"]){
        unset($_POST["confirmPassword"]);  

      } else {
        echo ('<div class="alert alert-danger"><p>Le mot passe ne correspond pas.</p></div>');
        echo "<script>
                setTimeout(() => {
                  window.location='profil.php';
                }, '1500')
              </script>";
      return;
    }
    
    $password = $_POST['password'];

    $uppercase    = preg_match('@[A-Z]@', $password);
    $lowercase    = preg_match('@[a-z]@', $password);
    $number       = preg_match('@[0-9]@', $password);

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        echo ('<div class="alert alert-danger"><p>Le mot de passe doit contenir au moins 8 charactères comprenant 1 majuscule, 1 minuscule et un chiffre</p></div>');
    }

    else if($uppercase && $lowercase && $number && strlen($password) >= 8) {
    $_POST["password"] = password_hash(($_POST["password"]), PASSWORD_DEFAULT);

    $user = new User($_POST);
    $UserController = new UserController;
    $UserController->update($user);

    echo ('<div class="alert alert-success"><p>Vos modifications ont été prises en compte.</p></div>');
    echo "<script>
            setTimeout(() => {
              window.location='profil.php';
            }, '1500')
        </script>";
        
        
    }
   
} 

}

   ?>
<p class="text-end m-3 px-4">
    <small><a class="text-decoration-none text-muted" href="index.php">Retour</a></small>
</p>

<form class="text-center" method="POST">

    <div class="d-none">
        <input class="form-control" name="id" id="id" value="<?= $_SESSION['id'] ?>">
    </div>
    
    <div class="form-floating m-1 mx-5">
      <input type="username" name="username" class="form-control" id="username" required value="<?= $_SESSION["username"] ?>">
      <label for="username">Nom</label>
    </div>

    <div class="form-floating m-1 mx-5">
      <input type="email" class="form-control" id="email" name="email" required value="<?= $_SESSION["email"] ?>">
      <label for="email">Adresse e-mail</label>
    </div>

    <div class="form-floating m-1 mx-5">
      <input type="password" class="form-control" name="password" id="password" required >
      <label for="password">Mot de passe</label>
    </div>

    <div class="form-floating m-1 mx-5">
      <input type="confirmPassword" class="form-control" name="confirmPassword" id="confirmPassword" required>
      <label for="password">Confirmation du mot de passe</label>
    </div>

    <div class="form-floating m-1 mx-5">
    <select name="nbCovers" id="nbCovers" class="form-select" id="nbCovers">
        <?php for ($i = 1; $i <= 12; $i++): ?>
          <option value="<?= $i?>"><?= $i ?></option>
        <?php endfor ?>
      </select>
      <label for="nbCovers">Nombre de convives</label>
    </div>
    <div class="form-floating m-1 mx-5">
        <textarea class="form-control" name="allergies" type="allergies" id="allergies"></textarea>
        <label for="allergies">Allergie(s)</label>
    </div>
    
        <button class="btn btn-lg btn-warning" name="updateUser" type="submit">Modifier</button>
    
</form>

<?php

require_once ('templates/footer.php');

?>