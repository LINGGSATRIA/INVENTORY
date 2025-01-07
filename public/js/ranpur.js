    async function showSubCards(type) {
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

        try {
            // Fetch data Ranpur berdasarkan nama ranpur
            const response = await fetch('/wilayah/getTIpeBykategori/' + type);

            if (!response.ok) {
                throw new Error(`Error fetching data: ${response.status}`);
            }

            const ranpurData = await response.json();

            if (ranpurData.length === 0) {
                subCardsContainer.innerHTML = '<p>Data tidak ditemukan.</p>';
                return;
            }

            // Generate sub-sub-sub-cards HTML dynamically berdasarkan data ranpur dan wilayah
            ranpurData.forEach(ranpur => {
                const cardHTML = `
                <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2" onclick="showSubSubCards('${ranpur.tipe_ranpur}')">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">${ranpur.tipe_ranpur}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                subCardsContainer.insertAdjacentHTML('beforeend', cardHTML);
            });
        } catch (error) {
            console.error('Error fetching data:', error);
            subCardsContainer.innerHTML = '<p>Terjadi kesalahan saat mengambil data.</p>';
        }
    }

  async function showSubSubCards(subCardName) {
        const subSubCardsContainer = document.getElementById('sub-sub-cards');
        const subSubSubCardsContainer = document.getElementById('sub-sub-sub-cards');
        const subSubSubSubCardsContainer = document.getElementById('sub-sub-sub-sub-cards');
        const DeskripsiCardsContainer = document.getElementById('deskripsi-cards');
        DeskripsiCardsContainer.innerHTML = ''; 
        subSubSubSubCardsContainer.innerHTML = ''; 
        subSubSubCardsContainer.innerHTML = ''; 
        subSubCardsContainer.innerHTML = ''; 

        try {
            // Fetch data Ranpur berdasarkan nama ranpur
            const response = await fetch('/wilayah/getByNameWithVersi/' + subCardName);

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
                <div class="card border-left-warning shadow h-100 py-2" onclick="showSubSubSubCards('${ranpur.nama_versi}')">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">${ranpur.nama_versi}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            subSubCardsContainer.insertAdjacentHTML('beforeend', cardHTML);
            });
        } catch (error) {
            console.error('Error fetching data:', error);
            subSubSubCardsContainer.innerHTML = '<p>Terjadi kesalahan saat mengambil data.</p>';
        }
    }
    async function showSubSubSubCards(subSubCardLink) {
        const subSubSubCardsContainer = document.getElementById('sub-sub-sub-cards');
        const subSubSubSubCardsContainer = document.getElementById('sub-sub-sub-sub-cards');
        const DeskripsiCardsContainer = document.getElementById('deskripsi-cards');
        subSubSubCardsContainer.innerHTML = ''; // Bersihkan konten sebelumnya
        subSubSubSubCardsContainer.innerHTML = '';
        DeskripsiCardsContainer.innerHTML = '';
    
        try {
            const stokResponse = await fetch('/stokpusat/getBytipe/' + subSubCardLink);
            if (!stokResponse.ok) {
                throw new Error('Gagal mengambil data Stok.');
            }
            const stokData = await stokResponse.json();
    
            if (stokData.length > 0) {
                stokData.forEach(stok => {
                    const descriptionParts = stok.deskripsi
                        ? stok.deskripsi.split('<hr>').map(part => part.trim())
                        : [];
                    let tabsHTML = '';
                    let tabContentsHTML = '';
    
                    descriptionParts.forEach((part, index) => {
                        const tabId = `sheet-${stok.id}-${index}`;
                        const tabName = `Sheet ${index + 1}`;
    
                        tabsHTML += `
                            <li class="nav-item">
                                <a class="nav-link ${index === 0 ? 'active' : ''}" id="${tabId}-tab" data-bs-toggle="tab" href="#${tabId}" role="tab" aria-controls="${tabId}" aria-selected="${index === 0}">
                                    ${tabName}
                                </a>
                            </li>
                        `;
    
                        tabContentsHTML += `
                            <div class="tab-pane fade ${index === 0 ? 'show active' : ''}" id="${tabId}" role="tabpanel" aria-labelledby="${tabId}-tab">
                                ${part || `Konten untuk ${tabName} kosong`}
                            </div>
                        `;
                    });
    
const cardHTML = `
    <div class="col-lg-8 col-md-10">
        <div class="card shadow h-100 py-2">
            <label class="text-center">STOK DATA PUSAT</label>
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">${stok.nama_kategori}</h5>
            </div>
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="stokTab${stok.id}" role="tablist">
                    ${tabsHTML}
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="stokContent${stok.id}">
                    <!-- Pencarian akan ditempatkan di sini -->
                    <input type="text" id="searchInput${stok.id}" placeholder="Search..." style="margin-top: 10px;">
                    ${tabContentsHTML}
                </div>
            </div>
        </div>
    </div>
`;
                    subSubSubCardsContainer.insertAdjacentHTML('beforeend', cardHTML);
                    document.querySelector(`#searchInput${stok.id}`).addEventListener('input', function() {
                        let searchTerm = this.value.toLowerCase();
                        let rows = document.querySelectorAll(`#stokContent${stok.id} #dataTable tbody tr`);
                        rows.forEach(function(row) {
                            let rowText = row.innerText.toLowerCase();
                            if (rowText.indexOf(searchTerm) > -1) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                        });
                    });
                });
            }
        } catch (error) {
            console.error(error.message);
            alert('Terjadi kesalahan saat mengambil data stok.');
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