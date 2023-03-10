
<?php
require_once ('templates/header.php');
require_once ('Entity/Dish.php');
require_once ('Controller/DishController.php');


$dishController = new DishController();
$dishController->delete($_GET["id"]);
echo ('<div class="alert alert-success"><p>La suppression à été prise en compte</p></div>');
echo "<script>
        setTimeout(() => {
          window.location='index.php';
        }, '1500')
    </script>";


require_once ('templates/footer.php');

?>