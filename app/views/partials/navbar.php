<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Taksu rent</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= url('transaksi'); ?>">Transaksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=" <?= url('denda'); ?>">Denda</a>
        </li>
      </ul>
    </div>
  </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <?php if(!Session::exits('user')): ?>
            <a class="nav-link active" aria-current="page" href="<?= url('login-penyewa'); ?>">Login</a>
          <?php endif ?>
          <?php if(Session::exits('user')): ?>
            <div class='d-flex align-content-center'>
              <a class="navbar-brand" aria-current="page" href="<?= url('profile'); ?>">
                <img src="images/img.jpg" class="rounded-circle" style="width: 40px; height:40px;"alt="Avatar" />
              </a>
              <a class="nav-link active" aria-current="page" href="<?= url('logout'); ?>">Logout</a>
            </div>
          <?php endif ?>
        </li>
      </ul>
    </div>
</nav>