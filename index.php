<?php

require_once ('templates/header.php');
require_once ('Entity/Dish.php');
require_once ('Controller/DishController.php');

$DishController = new DishController();
$dishes = $DishController->getAll();

?>

<div class="row text-center">

    <?php foreach($dishes as $dish) : 
        include ('templates/dishCard.php');
    endforeach ?>

</div>

<?php
require_once ('templates/footer.php');