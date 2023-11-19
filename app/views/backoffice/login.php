<?php require_once "../app/views/templates/Header.php";?>

<section class="container-fluid">
    <div class="row justify-content-center align-items-center w-75 bg-white m-auto gap-5 mt-5 vh-100">
     <div class="col-3">
        <div>
            <h1 class="fw-bold">Login</h1>
            <h1 class="fw-bold">Sebagai</h1>
            <p>admin atau operator</p>
        </div>
     </div>
     <div class="col-8 bg-white rounded-3 p-5 shadow-lg rounded">
        <?php Flasher::getFlasher()?>
        <form action="<?= url('login-admin/login') ?>" method="post">
        <div class='mb-4'>
            <input class='p-2' style='width:100%;' name='email_username' type='text' placeholder="email atau username" required>
          </div>
          <div class='mb-4'>
            <input class='p-2' style='width:100%;' name='password' type='password' placeholder="password" required>
          </div>
          <div class='form-footer'>
              <button type='submit' class='btn btn-dark me-3'>Login</button>
              <a href="login-admin">Belum mempunyai akun?</a>
          </div>
        </form>
     </div>
    </div>
</section>
<script src='js/admin.js'></script>
<?php require_once "../app/views/templates/Footer.php";?>