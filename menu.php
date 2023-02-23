<?php
require_once('App/Config/data.php');
require_once ('templates/header.php');

?>

<div class="row text-center">
    <div class="w-70 p-2">
        <h2>Les Menus</h2>

        <?php foreach($menus as $key => $menu) { ?>
            <div class="card w-70 m-3 p-4">
                <div class="card-title d-flex">
                    <h4 class="w-100 px-3"><?= $menu['title']?></h4>
                    <p style="font-weight: bold" class="flex-shrink-1 px-3"><?= $menu['price']?>€</p>
                </div>
                <div>
                    <p style="font-weight: lighter"><?= $menu['description']?></p>
                </div>
                

                <?php foreach($dishes as $key => $dish) { ?>      
                    <div class="card-body text-start">
                        <p style="font-weight: bold"><?= $dish['title']?></p>
                        <p><?= $dish['description']?></p>
                    </div>
                <?php }; ?>

            </div>
        <?php }; ?>

    </div>
</div>

<?php

require_once ('templates/footer.php');