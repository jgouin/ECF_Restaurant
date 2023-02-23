<?php
require_once('App/Config/data.php');
require_once ('templates/header.php');

?>

<div class="row text-center">

    <?php foreach($dishes as $key => $dish) { 
        include 'templates/dishCard.php';
    } ?>

</div>

<?php
require_once ('templates/footer.php');

