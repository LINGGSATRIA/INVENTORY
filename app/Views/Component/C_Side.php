<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(135deg, #1D4B2C 0%, #0F2E1B 50%, #0A1F12 100%);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-4" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('Assets/sbadmin/img/tank1.png') ?>" class="img-fluid hover-scale" style="width: 50px; transition: all 0.3s ease; filter: drop-shadow(0 0 3px rgba(255,255,255,0.3));" alt="logo">
        </div>
        <div class="sidebar-brand-text ms-3 fw-bold" style="font-size: 1rem; letter-spacing: 2px; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">SISFO SUCAD LEO</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-3" style="border-color: rgba(255,255,255,0.1); box-shadow: 0 1px 2px rgba(0,0,0,0.1);">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center py-3 px-4" href="<?= base_url('admin/') ?>" 
           style="transition: all 0.3s ease; background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.05) 50%, rgba(255,255,255,0) 100%);">
            <i class="fas fa-home me-3"></i>
            <span class="fw-medium">Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Master Data -->
    <li class="nav-item">
        <a class="nav-link collapsed d-flex align-items-center justify-content-between py-3 px-4" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo" 
            style="transition: all 0.3s ease; background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.05) 50%, rgba(255,255,255,0) 100%);">
            <div class="d-flex align-items-center">
                <i class="fas fa-database me-3"></i>
                <span class="fw-medium">Master Data</span>
            </div>
        </a>  
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-3 collapse-inner rounded-lg shadow-sm mx-3" style="border: 1px solid rgba(0,0,0,0.05); backdrop-filter: blur(10px);">
                <h6 class="collapse-header text-success fw-bold px-3 mb-2">Pilih Data:</h6>
                <a class="collapse-item py-2 px-4" href="<?= base_url('admin/ranpur') ?>" 
                   style="transition: all 0.3s ease; color: #1D4B2C; background: linear-gradient(90deg, rgba(29,75,44,0) 0%, rgba(29,75,44,0.05) 50%, rgba(29,75,44,0) 100%);">
                    <i class="fas fa-tank me-2"></i>Data Ranpur
                </a>
                <a class="collapse-item py-2 px-4" href="<?= base_url('admin/stokpusat') ?>"
                   style="transition: all 0.3s ease; color: #1D4B2C; background: linear-gradient(90deg, rgba(29,75,44,0) 0%, rgba(29,75,44,0.05) 50%, rgba(29,75,44,0) 100%);">
                    <i class="fas fa-boxes me-2"></i>Stok Data Pusat
                </a>
            </div>
        </div>
    </li>

    <!-- Nav Item - User Management -->
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center py-3 px-4" href="<?= base_url('admin/user') ?>"
           style="transition: all 0.3s ease; background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.05) 50%, rgba(255,255,255,0) 100%);">
            <i class="fas fa-users me-3"></i>
            <span class="fw-medium">User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-3" style="border-color: rgba(255,255,255,0.1); box-shadow: 0 1px 2px rgba(0,0,0,0.1);">

    <!-- Sidebar Toggler -->
    <div class="text-center mb-4">
        <button class="btn btn-circle shadow-sm" id="sidebarToggle" 
                style="width: 35px; height: 35px; transition: all 0.3s ease; background: linear-gradient(135deg, #2D5A3C 0%, #1D4B2C 100%); border: none;">
        </button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">