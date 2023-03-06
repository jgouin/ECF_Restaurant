
<?php
require_once ('templates/header.php');
require_once ('Entity/User.php');
require_once ('Controller/UserController.php');

$userController = new UserController();


if (isset($_POST['newUser'])){
  $newUser = new User ($_POST);
  $userController->create($newUser);
  echo "<script>window.location='index.php'</script>";
}

?>
<div class="text-end m-3 px-4">
    <small><a class="text-muted " href="formConnexion.php">J'ai déja un compte</a></small>
</div>

<form class="text-center" action="" method="post">
    <h2 class="mb-3">Formulaire d'inscription</h2>
    <div class="form-floating m-1 mx-5">
      <input type="email" class="form-control" id="email" required placeholder="nom@exemple.com">
      <label for="email">Adresse e-mail</label>
    </div>

    <div class="form-floating m-1 mx-5">
      <input type="password" class="form-control" id="password" required placeholder="Mot de passe">
      <label for="password">Mot de passe</label>
    </div>

    <div class="form-floating m-1 mx-5">
      <input type="confirmPassword" class="form-control" id="confirmPassword" required placeholder="Confimer mot de passe">
      <label for="confirmPassword">Confirmation du mot de passe</label>
    </div>

    <div class="form-floating m-1 mx-5">
      <input type="username" class="form-control" id="username" required placeholder="Nom">
      <label for="username">Nom</label>
    </div>

    <div class="form-floating m-1 mx-5">
        <textarea class="form-control" placeholder="Je précise mes allergies" id="allergies"><?= 'Pomme' ?></textarea>
        <label for="allergies">Allergie(s)</label>
    </div>

    <div class="form-floating m-1 mx-5">
        <select name="nbCovers" id="nbCovers" class="form-select" id="nbCovers">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        <label for="nbCovers">Nombre de convives</label>
    </div>

    <p class="text-muted p-3">Si vous souhaitez réserver pour plus de 12 personnes, merci de nous contacter directement.</p>
    <button class="btn btn-lg btn-warning" value="newUser" name="newUser" type="submit">Envoyer</button>

    
</form>



<?php

require_once ('templates/footer.php');

?>