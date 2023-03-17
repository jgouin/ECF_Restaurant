<?php


require_once ('templates/header.php');
require_once 'Entity/Dish.php';
require_once 'Controller/DishController.php';
require_once 'Entity/Category.php';
require_once 'Controller/CategoryController.php';

$DishController = new DishController();
$dishes = $DishController->getAll();

$CategoryController = new CategoryController();
$categories = $CategoryController->getAll();

?>

<div class="row text-center">
    <div class="w-70 p-2">
        <h2>La Carte</h2>

        <?php foreach($categories as $category) :
            $a = $category->getId(); ?>
            <div class="card w-70 m-3 p-4">
                <div class="card-title d-flex">
                    <h4 class="justify-content-center px-3"><?= $category->getName() ?></h4>
                </div>

                <?php 
                    foreach($dishes as $dish) : 
                        if ($dish->getCategory_id() === $a){ ?>
                    <div class="w-70">
                        <div class="d-flex justify-content-between">
                            <h5><?= $dish->getTitle()?></h5>
                            <p><?= $dish->getPrice()?> €</p>
                        </div>
                        <p class="text-start"><?= $dish->getDescription() ?></p>
                    </div>
                <?php }; ?>
                <?php endforeach  ?>
                

            </div>
        <?php endforeach  ?>

    </div>
</div>

<?php

require_once ('templates/footer.php');