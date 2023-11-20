<section class="admin-nav">
    <div class="sidebar">
        <nav class="navbar navbar-dark">
            <a class="navbar-brand text-center m-auto px-2" href="#">
                <h3>Taksu Rent</h3>
                <hr class="bg-white">
            </a>
            <ul class="navbar-nav w-100  p-2 px-2 text-xl-left">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard"> <i class="bi bi-speedometer p-2"></i> Dashboard
                    <hr class="bg-white">
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link" href="motor"><i class="bi bi-speedometer p-2"></i> Motor
                <hr class="bg-white">
            </a>
        </li>
    </ul>
</nav>
</div>

<div class="search d-flex justify-content-between ">
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
    </form>
    <a href="<?= url('admin/logout') ?>" class="btn btn-dark">Logout</a>
    </div>
</section>
