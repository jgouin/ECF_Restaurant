
<?php
require_once ('templates/header.php');
require_once ('Entity/Dish.php');
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

<form class="text-center" method="GET">
    <h2 class="mb-3">Modifier un plat</h2>

    <div class="form-floating m-2 mx-5">
        <select name="id" class="form-select" required id="id">
           
                <?php foreach($categories as $category) { ?>
                    <option>------ <?= $category->getName() ?>------</option>
                        <?php foreach($dishes as $dish) {  
                                if ($dish->getCategory_id() === $category->getId()){ ?>
                                    <option value="<?= $dish->getId() ?>"><?= $dish->getTitle() ?></option>
                                <?php $id = $dish->getId(); }; ?>
                            <?php }; ?> 
                <?php }; ?>  
        </select>
    </div>

    <button class="btn btn-lg btn-warning"  type="submit">Selectionnez un plat</button>

</form>

<?php

$dish = $DishController->get($_GET["id"]);

if($_POST) {
   
    $dish->hydrate($_POST);
    $dishController->update($newDish);
    
}

?>

<form class="text-center" method="POST">
    <div class="form-floating m-2 mx-5">
        <select name="category_id" class="form-select" required id="category_id">
            <?php foreach($categories as $category): ?>
            <option <?= $category->getId() === $dish->getCategory_id() ? "selected" : "" ?> value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
            <?php endforeach?>
        </select>
      <label for="category_id">Catégorie du plat</label>
    </div>

    <div class="form-floating m-2 mx-5">
      <input type="title" class="form-control" id="title" name="title" required placeholder="Salade de chèvre" value="<?= $dish->getTitle() ?>">
      <label for="title">Titre</label>
    </div>

    <div class=" m-2 mx-5">
        <textarea class="form-control" rows="3" placeholder="Description du plat" name="description" id="description"><?= $dish->getDescription() ?></textarea>
    </div>

    <div class="form-floating m-2 mx-5">
      <input type="price" class="form-control" name="price" id="price" required placeholder="Prix" value="<?= $dish->getPrice() ?>">
      <label for="price">Prix</label>
    </div>

    <div class="form-floating m-2 mx-5">
        <input class="form-control" placeholder="Lien de l'image" name="image" id="image" value="<?= $dish->getImage() ?>">
        <label for="image">Image</label>
    </div>  
    
    <div class="form-floating m-2 mx-5">
        <select name="menu" id="menu" class="form-select" id="menu">
            <?php foreach($menus as $menu): ?>
                <option <?= $menu->getId() === $dish->getMenu() ? "selected" : "" ?> value="<?= $menu->getTitle() ?>"><?= $menu->getTitle() ?></option>
                <?php endforeach?>
            </select>
        <label for="menu">Menu</label>
    </div>

    <button class="btn btn-lg btn-warning" type="submit">Envoyer</button>

    
</form>




<?php

require_once ('templates/footer.php');

?>