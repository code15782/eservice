<div class="container py-4">
    <div class="row d-flex justify-content-center">
        <?php foreach ($menus as $menu) { ?>
            <div class="col-4">
                <div class="card mt-3">
                    <div class="card-header p-0 position-relative mx-3 z-index-2">
                        <a class="d-block blur-shadow-image text-center">
                            <img src="<?= $base_url ?>pictures/home/book.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h3 class="font-weight-normal mt-3">
                            <a href="<?= $base_url ?>Eservice_teacher/show/<?= $menu->id ?>"><?= $menu->name ?></a>
                        </h3>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>