<!-- Main Content -->
<div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-gradient-white topbar mb-4 static-top shadow-lg">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 hover-scale">
            <i class="fa fa-bars text-primary"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle px-3 py-2 rounded-pill hover-shadow" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-3 d-none d-lg-inline font-weight-bold text-primary"><?= session()->get('user_name'); ?></span>
                    <img class="img-profile rounded-circle border border-primary shadow-sm"
                        src="<?= base_url('./adminfoto/' . session()->get('foto')); ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow-lg animated--grow-in border-0"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item py-3 hover-bg-danger text-danger" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                        Keluar
                    </a>
                </div>
            </li>
        </ul>

    </nav>
    <!-- End of Topbar -->