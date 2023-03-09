
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

$dish = $DishController->get($_GET["id"]);


if($_POST) {
 
    $dish->hydrate($_POST);
    var_dump($dish);
    $DishController->update($dish);
    //echo "<script>window.location='index.php'</script>";
    
}

?>

<button class="btn text-end m-3 px-4"><a class="text-dark" href="modifyDish.php">Retour</a></button>

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

    
    <button class="btn btn-lg btn-warning" type="submit">Modifier</button>
    <a class="btn btn-lg btn-danger" href="deleteDish.php?id=<?= $dish->getId() ?>">Supprimer</a>
    
</form>




<?php

require_once ('templates/footer.php');

?>