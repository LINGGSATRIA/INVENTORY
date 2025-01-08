<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-4" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('Assets/sbadmin/img/tank1.png') ?>" class="img-fluid hover-scale" style="width: 50px; transition: all 0.3s ease;" alt="logo">
        </div>
        <div class="sidebar-brand-text ms-3 fw-bold" style="font-size: 1.5rem; letter-spacing: 2px;">SILEO</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-3" style="border-color: rgba(255,255,255,0.2);">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center py-3 px-4 hover-scale" href="<?= base_url('admin/') ?>">
            <i class="fas fa-home me-3"></i>
            <span class="fw-medium">Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Master Data -->
    <li class="nav-item">
        <a class="nav-link collapsed d-flex align-items-center justify-content-between py-3 px-4 hover-scale" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <div class="d-flex align-items-center">
                <i class="fas fa-database me-3"></i>
                <span class="fw-medium">Master Data</span>
            </div>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-3 collapse-inner rounded-lg shadow-sm mx-3">
                <h6 class="collapse-header text-primary fw-bold px-3 mb-2">Pilih Data:</h6>
                <a class="collapse-item hover-primary py-2 px-4" href="<?= base_url('admin/ranpur') ?>">
                    <i class="fas fa-tank me-2"></i>Data Ranpur
                </a>
                <a class="collapse-item hover-primary py-2 px-4" href="<?= base_url('admin/stokpusat') ?>">
                    <i class="fas fa-boxes me-2"></i>Stok Data Pusat
                </a>
            </div>
        </div>
    </li>

    <!-- Nav Item - User Management -->
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center py-3 px-4 hover-scale" href="<?= base_url('admin/user') ?>">
            <i class="fas fa-users me-3"></i>
            <span class="fw-medium">User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-3" style="border-color: rgba(255,255,255,0.2);">

    <!-- Sidebar Toggler -->
    <div class="text-center mb-4">
        <button class="btn btn-circle btn-light shadow-sm hover-scale" id="sidebarToggle" style="width: 35px; height: 35px;">
        </button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">