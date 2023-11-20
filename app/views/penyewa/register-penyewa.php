<?php require_once "../app/views/templates/penyewa/Header.php";?>

<section class="container-fluid">
    <div class="row justify-content-center align-items-center w-75 bg-white m-auto gap-5 mt-5">
     <div class="col-3">
        <div>
            <h1 class="fw-bold">Register</h1>
            <h1 class="fw-bold">Penyewa</h1>
        </div>
     </div>
     <div class="col-8 bg-white rounded-3 p-5 shadow-sm">
        <?php Flasher::getFlasher()?>
        <form action="<?= url('register-penyewa/register') ?>" method="post">
        <div class='mb-4'>
            <input class='p-2' id="username" style='width:100%;' name='username' type='text' placeholder="Username" required>
          </div>
          <div class='mb-4'>
            <input class='p-2' id="telpon" style='width:100%;' name='no_telpon' type='text' placeholder="No telpon" required>
          </div>
          <div class='mb-4'>
            <input class='p-2' style='width:100%;' name='alamat' type='text' placeholder="Alamat" required>
          </div>
          <div class='mb-4'>
            <input class='p-2' style='width:100%;' name='email' type='email' placeholder="Email" required>
          </div>
          <div class='mb-4'>
            <input class='p-2' style='width:100%;' name='password' type='password' placeholder="Password" required>
          </div>
          <div class='form-footer'>
              <button type='submit' class='btn btn-dark'>Register</button>
              <a href="login-penyewa">Sudah mempunyai akun?</a>
          </div>
        </form>
     </div>
    </div>
</section>
<script src='js/penyewa.js'></script>
<?php require_once "../app/views/templates/penyewa/Footer.php";?>