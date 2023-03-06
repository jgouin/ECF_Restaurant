<div class="col-md-4 my-2 d-flex">
    <div class="card">
        <img src="<?= $dish->getImage() ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $dish->getTitle() ?></h5>
                <p class="card-text"><?=$dish->getDescription() ?></p>
            </div>
    </div>
</div>



