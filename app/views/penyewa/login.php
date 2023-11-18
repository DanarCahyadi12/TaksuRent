<div class='container-fluid'>
    <div class='row justify-content-center align-content-center' style='height:100vh;'>
        <div class='col-8 mb-3'>
            <h1 class='text-center'>Login</h1>
        </div>
        <div class='col-6 p-5 shadow-lg rounded'>
        <?php 
            Flasher::getFlasher();
        ?>

         <form action='<?= url('login-penyewa/authentication') ?>' method='POST'>
          <div class='mb-4'>
            <input class='p-2' style='width:100%;' name='email_username' type='text' placeholder="email atau username" required>
          </div>
          <div class='mb-4'>
            <input class='p-2' style='width:100%;' name='password' type='password' placeholder="password" required>
          </div>
          <div class='form-footer'>
              <button type='submit' class='btn btn-dark'>Login</button>
              <a href="register-penyewa">Belum mempunyai akun?</a>
          </div>
         </form>
       </div>
    </div>
</div>

