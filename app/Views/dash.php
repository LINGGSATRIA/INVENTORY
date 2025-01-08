<?= $this->extend('Component/C_Template') ?>
<?= $this->section('konten') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <!-- Card Ranpur Kanon -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 hover-card" onclick="showSubCards('kanon')">
                <div class="card-body bg-gradient-primary text-white rounded">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold">Ranpur Kanon</div>
                            <div class="text-xs mt-1">Klik untuk detail</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url('Assets/sbadmin/img/kanon.png') ?>" class="img-fluid" style="width: 80px; height: auto; filter: brightness(0) invert(1);" alt="kanon">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Ranpur Angkut Personel -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 hover-card" onclick="showSubCards('personel')">
                <div class="card-body bg-gradient-success text-white rounded">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold">Ranpur Angkut Personel</div>
                            <div class="text-xs mt-1">Klik untuk detail</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url('Assets/sbadmin/img/personel.png') ?>" class="img-fluid" style="width: 40px; height: auto; filter: brightness(0) invert(1);" alt="personel">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Ranpur Intai -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 hover-card" onclick="showSubCards('intai')">
                <div class="card-body bg-gradient-info text-white rounded">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold">Ranpur Intai</div>
                            <div class="text-xs mt-1">Klik untuk detail</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url('Assets/sbadmin/img/intai.png') ?>" class="img-fluid" style="width: 50px; height: auto; filter: brightness(0) invert(1);" alt="intai">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Ranpur Pendukung -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 hover-card" onclick="showSubCards('pendukung')">
                <div class="card-body bg-gradient-warning text-white rounded">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold">Ranpur Pendukung</div>
                            <div class="text-xs mt-1">Klik untuk detail</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url('Assets/sbadmin/img/pendukung.png') ?>" class="img-fluid" style="width: 50px; height: auto; filter: brightness(0) invert(1);" alt="pendukung">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic Content Sections -->
    <div id="sub-cards" class="row mt-4 fade-in"></div>
    <div id="sub-sub-cards" class="row mt-4 fade-in"></div>
    <div id="show-Sucad-Boxes" class="row mt-4 fade-in"></div>
    <div id="sub-sub-sub-cards" class="row mt-4 fade-in"></div>
    <div id="wilayah-boxes" class="row mt-4 fade-in"></div>
    <div id="sub-sub-sub-sub-cards" class="row mt-4 fade-in"></div>
    <div id="deskripsi-cards" class="row mt-4 fade-in"></div>

    <style>
        .hover-card {
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        .hover-card:hover {
            transform: translateY(-5px);
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .card {
            border: none;
            border-radius: 15px;
        }
        .card-body {
            padding: 1.5rem;
        }
        .text-xs {
            font-size: 0.7rem;
            opacity: 0.8;
        }
    </style>
</div>
<?= $this->endSection() ?>