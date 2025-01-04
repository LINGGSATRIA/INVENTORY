<?= $this->extend('user/C_Template_user') ?>
<?= $this->section('konten') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <!-- Card Ranpur Kanon -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2" onclick="showSubCards('kanon')">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ranpur Kanon</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url('Assets/sbadmin/img/kanon.png') ?>" style="width: 80px; height: auto;" alt="kanon">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Ranpur Angkut Personel -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" onclick="showSubCards('personel')">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ranpur Angkut Personel</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url('Assets/sbadmin/img/personel.png') ?>" style="width: 40px; height: auto;" alt="personel">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Ranpur Intai -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" onclick="showSubCards('intai')">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ranpur Intai</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url('Assets/sbadmin/img/intai.png') ?>" style="width: 50px; height: auto;" alt="intai">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Ranpur Pendukung -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" onclick="showSubCards('pendukung')">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ranpur Pendukung</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url('Assets/sbadmin/img/pendukung.png') ?>" style="width: 50px; height: auto;" alt="pendukung">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Sub-Cards Section -->
    <div id="sub-cards" class="row mt-4"></div>
    <!-- Sub-Sub-Cards Section -->
    <div id="sub-sub-cards" class="row mt-4"></div>
    <!-- Sub-Sub-Sub-Cards Section -->
    <div id="sub-sub-sub-cards" class="row mt-4"></div>
    <!-- Sub-Sub-Sub-Cards Section -->
    <div id="sub-sub-sub-sub-cards" class="row mt-4"></div>
    <!-- deskripsi Section -->
    <div id="deskripsi-cards" class="row mt-4"></div>
</div>
<?= $this->endSection() ?>