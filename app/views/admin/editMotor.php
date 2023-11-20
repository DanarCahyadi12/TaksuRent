<section class="content">
    <h2> Update </h2>
    <?php
    if (Flasher::exits()) {
        $message = Flasher::getFlasher()['message'];
        echo $message;
        Flasher::destroyFlasher();
    }
    ?>
    <div class="tambah-form">
            <form action="<?= url('admin/storeUpdate') ?>" method="post" enctype="multipart/form-data" >
                <div class="mb-3">
                    <label for="merek" class="form-label">Merek</label>
                    <input type="text" name="merek" class="form-control" id="merek" value=" <?= $datas['motocycle']['merk'] ?> " >
                </div>
                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe</label>
                    <input type="text" name="tipe" class="form-control" id="tipe" value="<?= $datas['motocycle']['tipe'] ?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $datas['motocycle']['nama'] ?>" >
                </div>
                <div class="mb-3">
                    <label for="cc" class="form-label">CC</label>
                    <input type="text" name="cc" class="form-control" id="cc" value="<?= $datas['motocycle']['cc'] ?>">
                </div>
                <div class="mb-3">
                    <label for="transmisi" class="form-label">Transmisi</label>
                    <input type="text" name="transmisi" class="form-control" id="transmisi"  value="<?= $datas['motocycle']['transmisi'] ?>" >
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Sewa</label>
                    <input type="text" name="harga" class="form-control" id="harga" value="<?= $datas['motocycle']['harga'] ?>">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <?php if($datas['motocycle']['status'] == 1 ) : ?>
                        <option value="1">Ada</option>
                        <?php else : ?>
                        <option value="0">Tidak</option>
                        <?php endif ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">Gambar</label>
                    <input class="form-control" type="file" name="url" id="url" value="<?= $datas['motocycle']['url'] ?>">
                </div>
                    <input class="form-control" type="hidden" name="gambar" id="gambar" value="<?= $datas['motocycle']['url'] ?>">
                    <input class="form-control" type="hidden" name="id" id="gambar" value="<?= $datas['motocycle']['id'] ?>">
                <button class="btn btn-success  mt-2" name="submit" type="submit"> Submit </button>
            </form> 
    </div>
</section>