<?php require_once "../app/views/templates/penyewa/Header.php";?>
<section class='container-fluid'>
    <?php require_once '../app/views/partials/navbar.php'; ?>
    <div class='row m-auto mt-5'>
        <div class='col-8 m-auto'>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'></th>
                        <th scope='col'>Nama penyewa</th>
                        <th scope='col'>Transaksi pada</th>
                        <th scope='col'>Tipe</th>
                        <th scope='col'>Harga denda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0?>
                    <?php foreach ($datas['denda'] as $denda): ?>
                        <?php $i++; ?>

                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $denda['nama_lengkap'] ?></td>
                            <td><?= formatDate($denda['tanggal_disewa']) ?></td>
                            <td><?= $denda['tipe'] ?></td>
                            <td><?= formatToRupiah($denda['harga']) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal modal-xl fade" id="detail-transaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail transaksi</h1>
      </div>
      <div class="modal-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">.col-md-4</div>
      <div class="col-md-4 ms-auto">.col-md-4 .ms-auto</div>
    </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Kembali</button>
    
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<?php require_once "../app/views/templates/penyewa/Footer.php";?>
