
<?php
require_once ('templates/header.php');
require_once ('Entity/User.php');
require_once ('Controller/UserController.php');




if(($_SESSION['username'] !== 'admin') && ($_SESSION['email'] !== 'quai_Antique@Chambery.fr')){


if(isset($_POST['updateUser'])){
    if ($_POST["password"] === $_POST["confirmPassword"]){
        unset($_POST["confirmPassword"]);
        $_POST["password"] = password_hash(($_POST["password"]), PASSWORD_DEFAULT);
        
      } else {
        echo ('<div class="alert alert-danger"><p>Le mot passe ne correspond pas.</p></div>');
        echo "<script>
                setTimeout(() => {
                  window.location='newUser.php';
                }, '1500')
              </script>";
      return;
    }
    $user = new User($_POST);
    var_dump($user);
    $UserController = new UserController;
    echo 'oui ';
    $UserController->update($user);
    echo ('<div class="alert alert-success"><p>Vos modifications ont été prises en compte.</p></div>');
    echo "<script>
            setTimeout(() => {
              window.location='newUser.php';
            }, '1500')
        </script>";
        
    }

   ?>

<button class="btn text- end m-3 px-4"><a class="text-dark" href="index.php">Retour</a></button>

<form class="text-center" method="POST">
    
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
        <option <?= $i === $_SESSION["nbCovers"] ? "selected" : "" ?> value="<?= $_SESSION["nbCovers"] ?>"><?= $i ?></option>
        <?php endfor ?>
      </select>
      <label for="nbCovers">Nombre de convives</label>
    </div>
    <div class="form-floating m-1 mx-5">
        <textarea class="form-control" name="allergies" placeholder="Je précise mes allergies" id="allergies"><?= $_SESSION["allergies"] ?></textarea>
        <label for="allergies">Allergie(s)</label>
    </div>
    
    <button class="btn btn-lg btn-warning" name="updateUser" type="submit">Modifier</button>
    <a class="btn btn-lg btn-danger" href="deleteUser.php?id=<?= $user->getId() ?>">Supprimer</a>
    
</form>

<?php
}
?>

<?php

require_once ('templates/footer.php');

?>