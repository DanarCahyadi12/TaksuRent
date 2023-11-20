<section class="content">
    <div class="row detail">
        <div class="gambar col-md-4">
            <img src="<?= $datas['motocycle']['url'] ?>" alt="">
        </div>
        <div class="detail-form col-md-4">
            <form action="<?= url('admin/storeTambah') ?>" method="post" enctype="multipart/form-data">
                <div class="mt-3 mb-3">
                    <label for="merek" class="form-label">Merek</label>
                    <input readonly type="text" name="merek" class="form-control" id="merek" value="<?= $datas['motocycle']['merk']  ?>">
                </div>
                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe</label>
                    <input readonly type="text" name="tipe" class="form-control" id="tipe" value="<?= $datas['motocycle']['tipe']  ?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input readonly type="text" name="nama" class="form-control" id="nama" value="<?= $datas['motocycle']['nama']  ?>">
                </div>
                <div class="mb-3">
                    <label for="cc" class="form-label">CC</label>
                    <input readonly type="text" name="cc" class="form-control" id="cc" value="<?= $datas['motocycle']['cc']  ?>">
                </div>
                <div class="mb-3">
                    <label for="transmisi" class="form-label">Transmisi</label>
                    <input readonly type="text" name="transmisi" class="form-control" id="transmisi" value="<?= $datas['motocycle']['transmisi']  ?>">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Sewa</label>
                    <input readonly type="text" name="harga" class="form-control" id="harga" value="<?= $datas['motocycle']['harga']  ?>">
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
                <a class="btn btn-primary my-4 float-end"  href="<?= BASE_URL ?>/admin/edit/<?= $datas['motocycle']['id'] ?>"> Edit </a>
                <a class="btn btn-danger mx-3  my-4 float-end" href=""> Delete </a>
            </form>
        </div>
    </div>
x
</section>