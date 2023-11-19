<?php require_once "../app/views/templates/penyewa/Header.php";?>
<section class='container-fluid'>
    <?php require_once '../app/views/partials/navbar.php'; ?>
    <div class='row justify-content-center'>
      <div class='col-9  mt-5'>
        <form method="POST" action="<?= url('index/cari') ?>">
          <div class='mb-4 d-flex position-relative'>
            <input class='p-1' style='width:100%;' name='search' type='text' placeholder="Cari motor.....">
              <button class='btn rounded-0 border-0 position-absolute end-0'>
                  <img src='../app/views/assets/search.svg' style="width: 16px; margin-top:-5px;">
              </button>
           </div>
        </form>
      </div>

      <?php if(Session::exits('result_motocycles') && count(Session::get('result_motocycles')) == 0):?>
          <p class='text-center'>Motor yang anda cari tidak ditemukan</p>
      <?php endif ?>
      <div class='col-9 mt-3 d-flex gap-2'>
        <?php require_once '../app/views/partials/motocycle-card.php' ?>
      </div>
    </div>
    
</section>

<?php require_once "../app/views/templates/penyewa/Footer.php";?>