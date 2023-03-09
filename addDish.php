
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


if($_POST) {
   
    $dishController = new DishController();
    $newDish = new Dish($_POST);
    $dishController->create($newDish);
    
    
}

?>

<form class="text-center" method="POST">
    <h2 class="mb-3">Ajouter un plat</h2>
    <div class="form-floating m-2 mx-5">
        <select name="category_id" class="form-select" required id="category_id">
            <?php foreach($categories as $category): ?>
            <option value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
            <?php endforeach?>
        </select>
      <label for="category_id">Catégorie du plat</label>
    </div>

    <div class="form-floating m-2 mx-5">
      <input type="title" class="form-control" id="title" name="title" required placeholder="Salade de chèvre">
      <label for="title">Titre</label>
    </div>

    <div class="form-floating m-2 mx-5">
        <textarea class="form-control" placeholder="Description du plat" name="description" id="description"></textarea>
        <label for="description">Description</label>
    </div>

    <div class="form-floating m-2 mx-5">
      <input type="price" class="form-control" name="price" id="price" required placeholder="Prix">
      <label for="price">Prix</label>
    </div>

    <div class="form-floating m-2 mx-5">
        <input class="form-control" placeholder="Lien de l'image" name="image" id="image">
        <label for="image">Image</label>
    </div>  
    
    <div class="form-floating m-2 mx-5">
        <select name="menu" id="menu" class="form-select" id="menu">
            <?php foreach($menus as $menu): ?>
                <option value="<?= $menu->getTitle() ?>"><?= $menu->getTitle() ?></option>
                <?php endforeach?>
            </select>
        <label for="menu">Menu</label>
    </div>

    <button class="btn btn-lg btn-warning" name="newDish" type="submit">Envoyer</button>

    
</form>



<?php

require_once ('templates/footer.php');

?>