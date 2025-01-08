<!-- Main Content -->
<div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-gradient-light topbar mb-4 static-top shadow-sm">

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle hover-scale" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-3 d-none d-lg-inline text-primary font-weight-bold">
                        <?= session()->get('user_name'); ?>
                    </span>
                    <img class="img-profile rounded-circle border shadow-sm"
                        src="<?= base_url('./adminfoto/' . session()->get('foto')); ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow-lg border-0 animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item hover-scale py-2" onclick="editUser()" href="#" data-toggle="modal" data-target="#edituser">
                        <i class="fa-solid fa-user mr-2 text-primary"></i>
                        <span class="font-weight-bold">Profile</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item hover-scale py-2" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-primary"></i>
                        <span class="font-weight-bold">Keluar</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>