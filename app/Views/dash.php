<?= $this->extend('Component/C_Template') ?>
<?= $this->section('konten') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

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

<!-- JavaScript -->
<script>
    function showSubCards(type) {
        const subCardsContainer = document.getElementById('sub-cards');
        const subSubCardsContainer = document.getElementById('sub-sub-cards');
        const subSubSubCardsContainer = document.getElementById('sub-sub-sub-cards');
        const subSubSubSubCardsContainer = document.getElementById('sub-sub-sub-sub-cards');
        const DeskripsiCardsContainer = document.getElementById('deskripsi-cards');
        DeskripsiCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards
        subSubSubSubCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards
        subCardsContainer.innerHTML = ''; // Clear existing sub-cards
        subSubCardsContainer.innerHTML = ''; // Clear existing sub-sub-cards
        subSubSubCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards

        let subCards = [];

        // Define sub-cards based on the type
        if (type === 'kanon') {
            subCards = [{
                    name: 'Leopard',
                    image: 'leopard.png',
                    link: 'leopard'
                },
                {
                    name: 'Harimau',
                    image: 'harimau.png',
                    link: 'harimau'
                },
                {
                    name: 'Scorpion',
                    image: 'scorpion.png',
                    link: 'scorpion'
                },
                {
                    name: 'AMX',
                    image: 'amx.png',
                    link: 'amx'
                },
                {
                    name: 'Badak',
                    image: 'badak.png',
                    link: 'badak'
                }
            ];
        } else if (type === 'personel') {
            subCards = [{
                    name: 'Truck Personel',
                    image: 'truck.png',
                    link: 'truck'
                },
                {
                    name: 'Bus Personel',
                    image: 'bus.png',
                    link: 'bus'
                }
            ];
        } else if (type === 'intai') {
            subCards = [{
                    name: 'Intai Scorpion',
                    image: 'scorpion_intai.png',
                    link: 'scorpion_intai'
                },
                {
                    name: 'Intai VBL',
                    image: 'vbl.png',
                    link: 'vbl'
                }
            ];
        } else if (type === 'pendukung') {
            subCards = [{
                    name: 'Ranpur Recovery',
                    image: 'recovery.png',
                    link: 'recovery'
                },
                {
                    name: 'Ranpur Ambulance',
                    image: 'ambulance.png',
                    link: 'ambulance'
                }
            ];
        }

        // Generate sub-cards HTML
        subCards.forEach(subCard => {
            const cardHTML = `
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2" onclick="showSubSubCards('${subCard.name}')">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">${subCard.name}</div>
                                </div>
                                <div class="col-auto">
                                    <img src="<?= base_url('Assets/sbadmin/img/') ?>${subCard.image}" style="width: 50px; height: auto;" alt="${subCard.name}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            subCardsContainer.insertAdjacentHTML('beforeend', cardHTML);
        });
    }

    function showSubSubCards(subCardName) {
        const subSubCardsContainer = document.getElementById('sub-sub-cards');
        const subSubSubCardsContainer = document.getElementById('sub-sub-sub-cards');
        const subSubSubSubCardsContainer = document.getElementById('sub-sub-sub-sub-cards');
        const DeskripsiCardsContainer = document.getElementById('deskripsi-cards');
        DeskripsiCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards
        subSubSubSubCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards
        subSubCardsContainer.innerHTML = ''; // Clear existing sub-sub-cards
        subSubSubCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards

        let subSubCards = [];

        // Define sub-sub-cards based on the sub-card name
        if (subCardName === 'Leopard') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Leopard'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Leopard'
                }
            ];
        } else if (subCardName === 'Harimau') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Harimau'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Harimau'
                }
            ];
        } else if (subCardName === 'Scorpion') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Scorpion'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Scorpion'
                }
            ];
        } else if (subCardName === 'AMX') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'AMX'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'AMX'
                }
            ];
        } else if (subCardName === 'Badak') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Badak'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Badak'
                }
            ];
        } else if (subCardName === 'Truck Personel') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Truck Personel'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Truck Personel'
                }
            ];
        } else if (subCardName === 'Bus Personel') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Bus Personel'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Bus Personel'
                }
            ];
        } else if (subCardName === 'Intai Scorpion') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Intai Scorpion'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Intai Scorpion'
                }
            ];
        } else if (subCardName === 'Intai VBL') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Intai VBL'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Intai VBL'
                }
            ];
        } else if (subCardName === 'Ranpur Recovery') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Ranpur Recovery'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Ranpur Recovery'
                }
            ];
        } else if (subCardName === 'Ranpur Ambulance') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Ranpur Ambulance'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Ranpur Ambulance'
                }
            ];
        }

        // Generate sub-sub-cards HTML
        subSubCards.forEach(subSubCard => {
            const cardHTML = `
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2" onclick="showSubSubSubCards('${subSubCard.link}')">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">${subSubCard.name}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            subSubCardsContainer.insertAdjacentHTML('beforeend', cardHTML);
        });
    }
    async function showSubSubSubCards(subSubCardLink) {
        const subSubSubCardsContainer = document.getElementById('sub-sub-sub-cards');
        const subSubSubSubCardsContainer = document.getElementById('sub-sub-sub-sub-cards');
        const DeskripsiCardsContainer = document.getElementById('deskripsi-cards');
        DeskripsiCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards
        subSubSubSubCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards
        subSubSubCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards

        try {
            // Fetch data Ranpur berdasarkan nama ranpur
            const response = await fetch(`<?= site_url('wilayah/getByName/') ?>${subSubCardLink}`);
            console.log(`<?= site_url('wilayah/getByName/') ?>${subSubCardLink}`);

            if (!response.ok) {
                throw new Error(`Error fetching data: ${response.status}`);
            }

            const ranpurData = await response.json();

            if (ranpurData.length === 0) {
                subSubSubCardsContainer.innerHTML = '<p>Data tidak ditemukan.</p>';
                return;
            }

            // Generate sub-sub-sub-cards HTML dynamically berdasarkan data ranpur dan wilayah
            ranpurData.forEach(ranpur => {
                const cardHTML = `
                <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2" onclick="showSubSubSubSubCards('${ranpur.nama_wilayah}')">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-sm">Wilayah: ${ranpur.nama_wilayah}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">${ranpur.nama_wilayah}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                subSubSubCardsContainer.insertAdjacentHTML('beforeend', cardHTML);
            });
        } catch (error) {
            console.error('Error fetching data:', error);
            subSubSubCardsContainer.innerHTML = '<p>Terjadi kesalahan saat mengambil data.</p>';
        }
    }

    async function showSubSubSubSubCards(nama_wilayah) {
        const subSubSubSubCardsContainer = document.getElementById('sub-sub-sub-sub-cards');
        const DeskripsiCardsContainer = document.getElementById('deskripsi-cards');
        DeskripsiCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards
        subSubSubSubCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards

        try {
            // Fetch data Ranpur berdasarkan nama ranpur
            const response = await fetch(`<?= site_url('wilayah/getByWilayah/') ?>${nama_wilayah}`);
            console.log(`<?= site_url('wilayah/getByWilayah/') ?>${nama_wilayah}`);

            if (!response.ok) {
                throw new Error(`Error fetching data: ${response.status}`);
            }

            const ranpurData = await response.json();

            if (ranpurData.length === 0) {
                subSubSubSubCardsContainer.innerHTML = '<p>Data tidak ditemukan.</p>';
                return;
            }

            // Generate sub-sub-sub-cards HTML dynamically berdasarkan data ranpur dan wilayah
            ranpurData.forEach(ranpur => {
                const cardHTML = `
                <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2" onclick="showDeskripsi('${ranpur.nama_ranpur}', '${ranpur.nama_wilayah}')">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-sm">Wilayah: ${ranpur.nama_ranpur}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">${ranpur.nama_ranpur}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                subSubSubSubCardsContainer.insertAdjacentHTML('beforeend', cardHTML);
            });
        } catch (error) {
            console.error('Error fetching data:', error);
            subSubSubSubCardsContainer.innerHTML = '<p>Terjadi kesalahan saat mengambil data.</p>';
        }
    }

    async function showDeskripsi(nama_ranpur, nama_wilayah) {
        const DeskripsiCardsContainer = document.getElementById('deskripsi-cards');
        DeskripsiCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards

        try {
            // Fetch data Ranpur berdasarkan nama ranpur
            const response = await fetch(`<?= site_url('wilayah/getDeskripsi/') ?>?nama_ranpur=${nama_ranpur}&nama_wilayah=${nama_wilayah}`);
            console.log(`<?= site_url('wilayah/getDeskripsi/') ?>?nama_ranpur=${nama_ranpur}&nama_wilayah=${nama_wilayah}`);

            if (!response.ok) {
                throw new Error(`Error fetching data: ${response.status}`);
            }

            const ranpurData = await response.json();

            if (ranpurData.length === 0) {
                DeskripsiCardsContainer.innerHTML = '<p>Data tidak ditemukan.</p>';
                return;
            }

            // Generate sub-sub-sub-cards HTML dynamically berdasarkan data ranpur dan wilayah
            ranpurData.forEach(ranpur => {
                const deskripsiParts = ranpur.deskripsi.split('<hr>'); // Pisahkan deskripsi di frontend jika perlu
                const sheet1 = deskripsiParts[0] || 'Sheet 1 kosong';
                const sheet2 = deskripsiParts[1] || 'Sheet 2 kosong';

                const cardHTML = `
    <div class="container-fluid">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="ranpurTab${ranpur.id}" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="sheet1-tab-${ranpur.id}" data-toggle="tab" href="#sheet1-${ranpur.id}" role="tab" aria-controls="sheet1-${ranpur.id}" aria-selected="true">Data Awal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sheet2-tab-${ranpur.id}" data-toggle="tab" href="#sheet2-${ranpur.id}" role="tab" aria-controls="sheet2-${ranpur.id}" aria-selected="false">Kebutuhan</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="ranpurContent${ranpur.id}">
                    <!-- Sheet 1 -->
                    <div class="tab-pane fade show active" id="sheet1-${ranpur.id}" role="tabpanel" aria-labelledby="sheet1-tab-${ranpur.id}">
                        ${sheet1}
                    </div>
                    <!-- Sheet 2 -->
                    <div class="tab-pane fade" id="sheet2-${ranpur.id}" role="tabpanel" aria-labelledby="sheet2-tab-${ranpur.id}">
                        ${sheet2}
                    </div>
                </div>
            </div>
        </div>
    </div>
    `;
                DeskripsiCardsContainer.insertAdjacentHTML('beforeend', cardHTML);
            });
        } catch (error) {
            console.error('Error fetching data:', error);
            DeskripsiCardsContainer.innerHTML = '<p>Terjadi kesalahan saat mengambil data.</p>';
        }
    }
</script>

<?= $this->endSection() ?>