<div class='container-fluid'>
    <div class='row justify-content-center align-content-center' style='height:100vh;'>
        <div class='col-8 mb-3'>
            <h1 class='text-center'>Register</h1>
        </div>
        <div class='col-6 p-5 shadow-lg rounded'>
            <?php if (Flasher::exits()) : ?>
                <?php if (Flasher::getFlasher()['action'] == 'register' && Flasher::getFlasher()['type'] == 'error') : ?>
                    <p class='text-danger'><?= Flasher::getFlasher()['message'] ?></p>
                <?php endif ?>
            <?php endif ?>
            <form action='<?= url('admin/storeRegister') ?>' method='POST'>
                <div class='mb-4'>
                    <input class='p-2' style='width:100%;' name='username' type='text' placeholder="username">
                </div>
                <div class='mb-4'>
                    <input class='p-2' style='width:100%;' name='email' type='text' placeholder="email">
                </div>
                <div class='mb-4'>
                    <input class='p-2' style='width:100%;' name='password' type='password' placeholder="password">
                </div>
                <div class='mb-4'>
                    <input class="form-check-input mx-2" type="radio" name="level" value="1">
                    <label class="form-check-label " for="flexRadioDefault2">
                        Admin
                    </label>
                    <input class="form-check-input mx-2" type="radio" name="level" value="0">
                    <label class="form-check-label " for="flexRadioDefault2">
                        Operator
                    </label>
                </div>
                <div class='form-footer'>
                    <button type='submit' name="submit" class='btn btn-dark'>Register</button>
                    <a href="#">Sudah mempunyai akun? Login</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
Flasher::destroyFlasher();
?>