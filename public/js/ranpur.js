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
                    image: 'Harimau.png',
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
    <div class="card shadow h-100 py-2" onclick="showSubSubCards('${subCard.name}')" style="background-color: #2E7D32;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-white">${subCard.name}</div>
                </div>
                <div class="col-auto">
                    <img src="Assets/sbadmin/img/tank/${subCard.image}" style="width: 40px; height: auto;" alt="${subCard.name}">
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

        // Define sub-sub-cards jika ingin menambahkan nama ranpur Tambahkan Awalan Ranpur di bagian Link Data Ranpur dan Awlan Stok Di bagian Link Stok
        if (subCardName === 'Leopard') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Ranpur Leopard'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Stok Leopard'
                }
            ];
        } else if (subCardName === 'Harimau') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Ranpur Harimau'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Stok Harimau'
                }
            ];
        } else if (subCardName === 'Scorpion') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Ranpur Scorpion'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Stok Scorpion'
                }
            ];
        } else if (subCardName === 'AMX') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: ' Ranpur AMX'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Stok AMX'
                }
            ];
        } else if (subCardName === 'Badak') {
            subSubCards = [{
                    name: 'Data Ranpur',
                    link: 'Ranpur Badak'
                },
                {
                    name: 'Stok Suku Cadang Pusat',
                    link: 'Stok Badak'
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
        const DeskripsiCardsContainer = document.getElementById('deskripsi-cards');
        subSubSubCardsContainer.innerHTML = ''; // Clear existing sub-sub-sub-cards
        DeskripsiCardsContainer.innerHTML = ''; // Clear any existing descriptions
    
        try {
            // Tentukan apakah yang diklik adalah Ranpur atau Stok
            let endpointRanpur = false;
            let endpointStok = false;
    
            // Menghapus awalan "Ranpur" atau "Stok" jika ada
            const subSubCardLinkWithoutPrefix = subSubCardLink.replace(/^Ranpur |^Stok /, '');
    
            // Tentukan endpoint yang akan dipanggil berdasarkan subSubCardLink
            if (subSubCardLink.startsWith('Ranpur')) {
                endpointRanpur = true;
            }
            if (subSubCardLink.startsWith('Stok')) {
                endpointStok = true;
            }
    
            // Variabel untuk menampung data
            let ranpurData = [];
            let stokData = [];
    
            // Fetch data berdasarkan endpoint yang dipilih
            if (endpointRanpur) {
                // Ambil data Ranpur dari endpoint getByName
                const ranpurResponse = await fetch('/wilayah/getByName/' + subSubCardLinkWithoutPrefix);
                if (!ranpurResponse.ok) {
                    throw new Error('Gagal mengambil data Ranpur.');
                }
                ranpurData = await ranpurResponse.json();
            }
    
            if (endpointStok) {
                // Ambil data Stok dari endpoint getBytipe
                const stokResponse = await fetch('/stokpusat/getBytipe/' + subSubCardLinkWithoutPrefix);
                if (!stokResponse.ok) {
                    throw new Error('Gagal mengambil data Stok.');
                }
                stokData = await stokResponse.json();
            }
    
            // Tampilkan data Ranpur jika ada
            if (ranpurData.length > 0) {
                ranpurData.forEach(ranpur => {
                    const cardHTML = `
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2" onclick="showSubSubSubSubCards('${ranpur.nama_wilayah}')">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">${ranpur.nama_wilayah}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    subSubSubCardsContainer.insertAdjacentHTML('beforeend', cardHTML);
                });
            } 
    
  // Tampilkan data Stok jika ada
if (stokData.length > 0) {
    stokData.forEach(stok => {
        // Membagi deskripsi berdasarkan <p> dan <hr>
        const descriptionParts = stok.deskripsi.split('<hr>');
        let sheetHTML = '';

        // Proses setiap bagian deskripsi
        descriptionParts.forEach(part => {
            // Menampilkan setiap <p> yang ada di dalam bagian deskripsi
            const paragraphs = part.split('<p>');
            paragraphs.forEach(p => {
                if (p) { // Menghindari string kosong
                    sheetHTML += `
                        <p>${p}</p>
                    `;
                }
            });
        });

        // Membuat card untuk setiap kategori
        const cardHTML = `
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${stok.nama_kategori}</div>
                                <div class="sheet">
                                    ${sheetHTML}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Menambahkan card HTML ke dalam container
        subSubSubCardsContainer.insertAdjacentHTML('beforeend', cardHTML);
    });
} 

    
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
            const response = await fetch('/wilayah/getByWilayah/' + nama_wilayah);

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
            const response = await fetch('/wilayah/getDeskripsi/?nama_ranpur=' + nama_ranpur +'&nama_wilayah='+ nama_wilayah);
            // const response = await fetch(`<?= site_url('wilayah/getDeskripsi/') ?>?nama_ranpur=${nama_ranpur}&nama_wilayah=${nama_wilayah}`);
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