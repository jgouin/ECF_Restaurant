<?php

require_once ('templates/header.php');
require_once ('Entity/Dish.php');
require_once ('Controller/DishController.php');

$DishController = new DishController();
$dishes = $DishController->getAll();

if(($_SESSION['username'] === 'admin')){
    echo ('<div class="alert alert-success"><p>Connecté en tant qu\'administrateur</p></div>');
    echo('<script>
        function modify() {
            window.location="modifyDish.php";
        }
    </script>');
} else if (isset($_SESSION["user"])){
    $username = ucfirst($_SESSION['username']);
    ?>
    <div>
        <p class="mx-4"><a href="profil.php" class="text-decoration-none" style="color:#ffd900">Bienvenue <?= $username ?></a></p>
        <p class="text-end"><a href="bookTable.php" class="alert alert-warning">Réserver votre table</a></p>
    </div>

<?php } else { ?>
        <div>
            <p class="mx-4"><a href="newUser.php" class="text-decoration-none" style="color:#ffd900">Créer votre profil</a></p>
            <p class="text-end"><a href="formConnexion.php" class="alert alert-warning">Réserver votre table</a></p>
        </div>
    
<?php } ?>


<h3 class="p-3">Retrouver ces plats dans notre restaurant</h3>

<div class="row text-center">

    <?php foreach($dishes as $dish) : 
        include ('templates/dishCard.php');
    endforeach ?>

</div>

<?php
require_once ('templates/footer.php');