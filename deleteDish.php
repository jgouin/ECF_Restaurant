
<?php
require_once ('templates/header.php');
require_once ('Entity/Dish.php');
require_once ('Controller/DishController.php');


$dishController = new DishController();
$dishController->delete($_GET["id"]);
echo "<script>window.location='index.php'</script>";


require_once ('templates/footer.php');

?>