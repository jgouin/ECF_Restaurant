<?php

require_once ('templates/header.php');

?>
<p class="text-end m-3 px-4">
    <small><a class="text-muted" href="form.php">Je créé mon compte</a></small>
</p>
<form class="text-center">
<h3 class="mb-3">Connexion</h3>

<div class="form-floating m-1 mx-5">
    <input type="email" class="form-control" id="email" placeholder="nom@exemple.com">
    <label for="email">Adresse e-mail</label>
</div>
<div class="form-floating m-1 mx-5">
    <input type="password" class="form-control" id="password" placeholder="Mot de passe">
    <label for="password">Mot de passe</label>
</div>

<button class="btn btn-lg mt-3" value="loginUser" type="submit">Se connecter</button>


</form>
<?php

require_once ('templates/footer.php');

?>