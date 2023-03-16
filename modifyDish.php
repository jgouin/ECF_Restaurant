
<?php
require_once ('Entity/Dish.php');
require_once ('templates/header.php');
require_once ('Controller/DishController.php');
require_once ('Entity/category.php');
require_once ('Controller/CategoryController.php');
require_once ('Entity/menu.php');
require_once ('Controller/MenuController.php');

$MenuController = new MenuController();
$menus = $MenuController->getAll();

$CategoryController = new CategoryController();
$categories = $CategoryController->getAll();

$DishController = new DishController();
$dishes = $DishController->getAll();


?>
<button class="btn text- end m-3 px-4"><a class="text-dark" href="index.php">Retour</a></button>


<form class="text-center" action="updateDish.php" method="GET">
    <h2 class="mb-3">Modifier un plat</h2>

    <div class="form-floating m-2 mx-5">
        <select name="id" class="form-select" required id="id">
           
                <?php foreach($categories as $category) { ?>
                    <optgroup label="-----<?= $category->getName(); ?>-----">
                        <?php foreach($dishes as $dish) {  
                                if ($dish->getCategory_id() === $category->getId()){ ?>
                                    <option value="<?= $dish->getId() ?>"><?= $dish->getTitle() ?></option>
                                <?php $id = $dish->getId(); }; ?>
                            <?php }; ?> 
                    </optgroup>
                <?php }; ?>  
        </select>
    </div>
    
    <button class="btn btn-lg btn-warning"  type="submit">Selectionnez un plat</button>

</form>



<?php

require_once ('templates/footer.php');

?>