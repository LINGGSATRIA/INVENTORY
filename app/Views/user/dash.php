<?= $this->extend('user/C_Template_user') ?>
<?= $this->section('konten') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-5">
        <h1 class="h3 mb-0 text-gray-800 fw-bold">Dashboard</h1>
    </div>

    <div class="row g-4">
        <!-- Card Ranpur Kanon -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-lg h-100 hover-card" onclick="showSubCards('kanon')">
                <div class="card-body bg-gradient-info text-white rounded-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-2 fw-bold">Ranpur Kanon</div>
                            <div class="text-xs mt-1 opacity-75">Klik untuk detail</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url('Assets/sbadmin/img/kanon.png') ?>" class="img-fluid" style="width: 80px; height: auto; filter: brightness(0) invert(1);" alt="kanon">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Ranpur Angkut Personel -->
         <div class="col-xl-3 col-md-6">
            <div class="card shadow-lg h-100 hover-card" onclick="showSubCards('personel')">
                <div class="card-body bg-gradient-info text-white rounded-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-2 fw-bold">Ranpur Angkut Personel</div>
                            <div class="text-xs mt-1 opacity-75">Klik untuk detail</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url('Assets/sbadmin/img/personel.png') ?>" class="img-fluid" style="width: 40px; height: auto; filter: brightness(0) invert(1);" alt="personel">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Ranpur Intai -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-lg h-100 hover-card" onclick="showSubCards('intai')">
                <div class="card-body bg-gradient-info text-white rounded-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-2 fw-bold">Ranpur Intai</div>
                            <div class="text-xs mt-1 opacity-75">Klik untuk detail</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url('Assets/sbadmin/img/intai.png') ?>" class="img-fluid" style="width: 50px; height: auto; filter: brightness(0) invert(1);" alt="intai">
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Card Ranpur Pendukung  -->
         <div class="col-xl-3 col-md-6">
            <div class="card shadow-lg h-100 hover-card" onclick="showSubCards('pendukung')">
                <div class="card-body bg-gradient-info text-white rounded-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-2 fw-bold">Ranpur Pendukung</div>
                            <div class="text-xs mt-1 opacity-75">Klik untuk detail</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url('Assets/sbadmin/img/pendukung.png') ?>" class="img-fluid" style="width: 50px; height: auto; filter: brightness(0) invert(1);" alt="pendukung">
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sub-cards" class="row mt-4 fade-in"></div>
    <div id="sub-sub-cards" class="row mt-4 fade-in"></div>
    <div id="show-Sucad-Boxes" class="row mt-4 fade-in"></div>
    <div id="sub-sub-sub-cards" class="row mt-4 fade-in"></div>
    <div id="wilayah-boxes" class="row mt-4 fade-in"></div>
    <div id="sub-sub-sub-sub-cards" class="row mt-4 fade-in"></div>
    <div id="deskripsi-cards" class="row mt-4 fade-in"></div>

    <style>
        .hover-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            will-change: transform;
        }
        .hover-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .fade-in {
            animation: fadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(30px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        .card {
            border: none;
            border-radius: 1rem;
            backdrop-filter: blur(10px);
        }
        .card-body {
            padding: 1.75rem;
        }
        .text-xs {
            font-size: 0.75rem;
            letter-spacing: 0.025em;
        }
    </style>
</div>
<?= $this->endSection() ?>