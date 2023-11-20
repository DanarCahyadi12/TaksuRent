<section class="content">
    <div class="d-flex justify-content-between">
        <h2>Motor</h2>
        <a href="#" class="tambah-button"> <i class="bi bi-plus-lg"></i> </a>
    </div>
    <div class="card-wrap d-flex gap-2">
        <?php foreach ($datas['motocycles'] as $motocycle) : ?>
            <div class="card-motor d-flex">
                <div class="card-img">
                    <img src="<?= $motocycle['url'] ?>" alt="">
                </div>
                <div class="card-content">
                    <h5><?= $motocycle['merk'] ?></h5>
                    <p><?= $motocycle['nama'] ?></p>
                    <p><?= $motocycle['cc'] ?> cc</p>
                    <a class="btn-detail" href="<?= BASE_URL ?>/admin/detail/<?= $motocycle['id'] ?>">Detail</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>

</section>