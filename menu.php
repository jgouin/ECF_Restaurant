<?php

require_once ('templates/header.php');
require_once('Entity/Menu.php');
require_once('Controller/MenuController.php');
require_once('Entity/Category.php');
require_once('Controller/CategoryController.php');
require_once('Entity/Dish.php');
require_once('Controller/DishController.php');

$MenuController = new MenuController();
$menus = $MenuController->getAll();
$CategoryController = new CategoryController();
$categories = $CategoryController->getAll();
$DishController = new DishController();
$dishes = $DishController->getAll();

?>

<div class="row text-center">
    <div class="w-70 p-2">
        <h2>Les Menus</h2>

        <?php foreach($menus as $menu) :?>
            <div class="card w-70 py-4 m-3">
                <div class="card-title d-flex">
                    <h4 class="w-100 px-3"><?= $menu->getTitle() ?>  <?= $menu->getPrice() ?>€</h4>
                </div>
                <div>
                    <p style="font-weight: lighter"><?= $menu->getFormule()?></p>
                </div>
                <?php foreach($categories as $key => $category) { ?> 
                         
                    <div class="card-body">
                    <?php foreach($dishes as $key => $dish) {  
                        if (($dish->getCategory_id() === $category->getId()) && $dish->getMenu() === $menu->getTitle()){ ?>
                            <div class="card-body">
                                <p style="font-weight: bold"><?= $dish->getTitle()?></p>
                                <p><?= $dish->getDescription()?></p>
                            </div>
                        <?php }; ?>
                        
                    <?php }; ?> 
                    </div>
                    <p>***</p>  
                <?php }; ?>  

            </div>
        <?php endforeach ?>

    </div>
</div>

<?php

require_once ('templates/footer.php');