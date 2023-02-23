<?php
require_once('App/Config/data.php');
require_once ('templates/header.php');

?>

<div class="row text-center">
    <div class="w-70 p-2">
        <h2>La Carte</h2>

        <?php foreach($categories as $key => $category) { ?>
            <div class="card w-70 m-3 p-4">
                <div class="card-title d-flex">
                    <h4 class="justify-content-center px-3"><?= $category['title']?></h4>
                </div>

                <?php foreach($dishes as $key => $dish) { ?>
                    <div class="w-70 p-4">
                        <div class="d-flex justify-content-between">
                            <h5><?= $dish['title']?></h5>
                            <p><?= $dish['price']?></p>
                        </div>
                        <p class="text-start"><?= $dish['description']?></p>
                    </div>
                <?php }; ?>

            </div>
        <?php }; ?>

    </div>
</div>

<?php

require_once ('templates/footer.php');