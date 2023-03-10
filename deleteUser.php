
<?php
require_once ('templates/header.php');
require_once ('Entity/User.php');
require_once ('Controller/UserController.php');


$userController = new UserController();
$userController->delete($_SESSION["id"]);
echo ('<div class="alert alert-success"><p>La suppression à été prise en compte</p></div>');
echo "<script>
        setTimeout(() => {
          window.location='logout.php';
        }, '1500')
    </script>";


require_once ('templates/footer.php');

?>