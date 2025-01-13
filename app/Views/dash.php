<?= $this->extend('Component/C_Template') ?>
<?= $this->section('konten') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-5">
        <h1 class="h3 mb-0 text-gray-800 fw-bold">Dashboard</h1>
    </div>

    <div class="row g-4">
        <!-- Card Ranpur Kanon -->
        <div class="col-xl-3 col-md-6">
            <div class="card shadow-lg h-100 hover-card" onclick="showSubCards('kanon'); changeBackground(this);">
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

        <div class="col-xl-3 col-md-6">
            <div class="card shadow-lg h-100 hover-card" onclick="showSubCards('personel'); changeBackground(this);">
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

        <div class="col-xl-3 col-md-6">
            <div class="card shadow-lg h-100 hover-card" onclick="showSubCards('intai'); changeBackground(this);">
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

        <div class="col-xl-3 col-md-6">
            <div class="card shadow-lg h-100 hover-card" onclick="showSubCards('pendukung'); changeBackground(this);">
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

        <script>
            let lastClickedCard = null;

            function changeBackground(element) {
                const cardBody = element.querySelector('.card-body');

                // // Reset background color of the last clicked card
                // if (lastClickedCard && lastClickedCard !== cardBody) {
                //     lastClickedCard.classList.remove('bg-gradient-danger');
                //     lastClickedCard.classList.add('bg-gradient-success');
                // }

                // Change background color of the currently clicked card
                if (cardBody.classList.contains('bg-gradient-danger')) {
                    cardBody.classList.remove('bg-gradient-danger');
                    cardBody.classList.add('bg-gradient-success');
                } else {
                    cardBody.classList.remove('bg-gradient-success');
                    cardBody.classList.add('bg-gradient-danger');
                }

                // Update the last clicked card
                lastClickedCard = cardBody;
            }
            let lastClickedCard1 = null;

            function changeBackgroundasub(element) {
                const cardBody = element.querySelector('.card-body');

                // // Reset background color of the last clicked card
                // if (lastClickedCard && lastClickedCard !== cardBody) {
                //     lastClickedCard.classList.remove('bg-gradient-danger');
                //     lastClickedCard.classList.add('bg-gradient-success');
                // }

                // Change background color of the currently clicked card
                if (cardBody.classList.contains('bg-gradient-danger')) {
                    cardBody.classList.remove('bg-gradient-danger');
                    cardBody.classList.add('bg-gradient-light');
                } else {
                    cardBody.classList.remove('bg-gradient-light');
                    cardBody.classList.add('bg-gradient-danger');
                }

                // Update the last clicked card
                lastClickedCard1 = cardBody;
            }
        </script>
    </div>


    <div id="sub-cards" class="row mt-4 fade-in"></div>
    <div id="sub-sub-cards" class="row mt-4 fade-in"></div>
    <div id="show-Sucad-Boxes" class="row mt-4 fade-in"></div>
    <div id="sub-sub-sub-cards" class="row mt-4 fade-in"></div>
    <div id="wilayah-boxes" class="row mt-4 fade-in"></div>
    <div id="sub-sub-sub-sub-cards" class="row mt-4 fade-in"></div>
    <div id="deskripsi-cards" class="row mt-4 fade-in"></div>

    <script>
        const observer = new MutationObserver((mutations) => {
            mutations.forEach(mutation => {
                if (mutation.addedNodes.length) {
                    mutation.addedNodes.forEach(node => {
                        if (node.nodeType === 1) { // Check if the added node is an element
                            node.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                    });
                }
            });
        });

        const config = { childList: true, subtree: true };
        observer.observe(document.getElementById('sub-cards'), config);
        observer.observe(document.getElementById('sub-sub-cards'), config);
        observer.observe(document.getElementById('show-Sucad-Boxes'), config);
        observer.observe(document.getElementById('sub-sub-sub-cards'), config);
        observer.observe(document.getElementById('wilayah-boxes'), config);
        observer.observe(document.getElementById('sub-sub-sub-sub-cards'), config);
        observer.observe(document.getElementById('deskripsi-cards'), config);
    </script>

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