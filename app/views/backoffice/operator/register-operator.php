<?php require_once "../app/views/templates/users/Header.php";?>

<section class="container-fluid">
    <div class="row justify-content-center align-items-center w-75 bg-white m-auto gap-5 mt-5 vh-100">
        <div class="col-3">
            <div>
                <h1 class="fw-bold">Register Sebagai</h1>
                <p class="fw-bold">Admin atau Operator</p>
            </div>
        </div>
        <div class="col-8 bg-white rounded-3 p-5 shadow-lg rounded">
            <?php Flasher::getFlasher()?>
            <form action="<?= url('register-operator/register') ?>" method="post">
                <div class='mb-4'>
                    <input class='p-2' id="username" style='width:100%;' name='username' type='text' placeholder="Username" required>
                </div>
                <div class='mb-4'>
                    <input class='p-2' style='width:100%;' name='email' type='email' placeholder="Email" required>
                </div>
                <div class='mb-4'>
                    <input class='p-2' style='width:100%;' name='password' type='password' placeholder="Password" required>
                </div>
                <div class="d-flex mb-4">
                    <div class="form-check me-5">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Operator
                        </label>
                    </div>
                </div>
                
                <div class='form-footer'>
                    <button type='submit' class='btn btn-dark me-3'>Register</button>
                    <a href="login-operator">Sudah mempunyai akun?</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?php require_once "../app/views/templates/users/Footer.php";?>