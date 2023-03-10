
<?php
require_once ('templates/header.php');
require_once ('Entity/User.php');
require_once ('Controller/UserController.php');




if ($_POST){
  
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
  $newUser = new User($_POST);
  $userController = new UserController();
  $userController->create($newUser);
  echo ('<div class="alert alert-success"><p>Votre compte à été créé</p></div>');
  echo "<script>
            setTimeout(() => {
              window.location='index.php';
            }, '1500')
          </script>";
}

?>
<div class="text-end m-3 px-4">
    <small><a class="text-muted " href="formConnexion.php">J'ai déja un compte</a></small>
</div>

<form class="text-center" method="POST">
    <h2 class="mb-3">Formulaire d'inscription</h2>

    <div class="form-floating m-1 mx-5">
      <input type="username" name="username" class="form-control" id="username" required placeholder="Nom">
      <label for="username">Nom</label>
    </div>

    <div class="form-floating m-1 mx-5">
      <input type="email" class="form-control" id="email" name="email" required placeholder="nom@exemple.com">
      <label for="email">Adresse e-mail</label>
    </div>

    <div class="form-floating m-1 mx-5">
      <input type="password" class="form-control" name="password" id="password" required placeholder="Mot de passe">
      <label for="password">Mot de passe</label>
    </div>

    <div class="form-floating m-1 mx-5">
      <input type="confirmPassword" class="form-control" name="confirmPassword" id="confirmPassword" required placeholder="Confimer mot de passe">
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
        <textarea class="form-control" name="allergies" placeholder="Je précise mes allergies" id="allergies"></textarea>
        <label for="allergies">Allergie(s)</label>
    </div>

    <p class="text-muted p-3">Si vous souhaitez réserver pour plus de 12 personnes, merci de nous contacter directement.</p>
    <button class="btn btn-lg btn-warning" type="submit">Envoyer</button>

    
</form>



<?php

require_once ('templates/footer.php');

?>