async function showSubCards(type) {
    const containers = {
        sub: document.getElementById('sub-cards'),
        subSub: document.getElementById('sub-sub-cards'),
        subSubSub: document.getElementById('sub-sub-sub-cards'),
        subSubSubSub: document.getElementById('sub-sub-sub-sub-cards'),
        deskripsi: document.getElementById('deskripsi-cards'),
        wilayahBoxes: document.getElementById('wilayah-boxes'),
        showSucadBoxes: document.getElementById('show-Sucad-Boxes'),
        totalperwilayahcards: document.getElementById('totalperwilayahcards'),
    };

    // Bersihkan semua container dengan efek fade
    Object.values(containers).forEach(container => {
        if (container) {
            container.style.opacity = '0';
            container.innerHTML = '';
            setTimeout(() => container.style.opacity = '1', 100);
        }
    });


    try {
        // Ambil data dari API
        const response = await fetch('/wilayah/getTIpeBykategori/' + type);
        if (!response.ok) throw new Error(`Error fetching data: ${response.status}`);

        const ranpurData = await response.json();
        if (ranpurData.length === 0) {
            containers.sub.innerHTML = '<div class="alert alert-info fade-in">Data tidak ditemukan</div>';
            return;
        }

        // Generate HTML untuk cards
        const cardsHTML = ranpurData.map((ranpur, index) => `
            <div class="col-xl-3 col-md-6 mb-4" style="animation: fadeInUp ${0.2 + index * 0.1}s ease-out">
                <div class="card hover-shadow transition-300 h-100" 
                     onclick="showSubSubCards('${ranpur.tipe_ranpur}');changeBackground(this);"
                     style="border-radius: 15px; transform: scale(1); transition: all 0.3s ease">
                    <div class="card-body bg-gradient-success" style="border-radius: 15px">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-white mb-0 fw-bold">${ranpur.tipe_ranpur}</h5>
                            </div>
                            <div class="ms-3">
                                <i class="fas fa-chevron-right text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        `).join('');

        // Tambahkan styles dan render cards
        containers.sub.innerHTML = `
            <style>
                @keyframes fadeInUp {
                    from {
                        opacity: 0;
                        transform: translateY(20px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
                .hover-shadow:hover {
                    transform: scale(1.03) !important;
                    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
                }
                .fade-in {
                    animation: fadeIn 0.5s ease-out;
                }
                @keyframes fadeIn {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }
            </style>
            ${cardsHTML}
        `;

    } catch (error) {
        console.error('Error:', error);
        containers.sub.innerHTML = '<div class="alert alert-danger fade-in">Terjadi kesalahan saat mengambil data</div>';
    }
}

async function showSubSubCards(subCardName) {
    const containers = {
        subSub: document.getElementById('sub-sub-cards'),
        subSubSub: document.getElementById('sub-sub-sub-cards'),
        subSubSubSub: document.getElementById('sub-sub-sub-sub-cards'),
        showSucadBoxes: document.getElementById('show-Sucad-Boxes'),
        deskripsi: document.getElementById('deskripsi-cards'),
        wilayahBoxes: document.getElementById('wilayah-boxes'),
        totalperwilayahcards: document.getElementById('totalperwilayahcards'),
    };

    // Clear dengan efek fade
    Object.values(containers).forEach(container => {
        if (container) {
            container.style.opacity = '0';
            container.innerHTML = '';
            setTimeout(() => container.style.opacity = '1', 100);
        }
    });

    try {
        const response = await fetch('/wilayah/getByNameWithVersi/' + subCardName);
        if (!response.ok) throw new Error(`Error fetching data: ${response.status}`);

        const ranpurData = await response.json();
        if (ranpurData.length === 0) {
            containers.subSub.innerHTML = '<div class="alert alert-info fade-in">Data tidak ditemukan</div>';
            return;
        }

        const cardsHTML = ranpurData.map((ranpur, index) => `
            <div class="col-xl-3 col-md-6 mb-4" style="animation: fadeInUp ${0.2 + index * 0.1}s ease-out">
                <div class="card hover-shadow transition-300 h-100" 
                     onclick="showSucadBoxes('${ranpur.nama_versi}');changeBackground(this);"
                     style="border-radius: 15px; transform: scale(1); transition: all 0.3s ease">
                    <div class="card-body bg-gradient-warning" style="border-radius: 15px">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-white mb-0 fw-bold">${ranpur.nama_versi}</h5>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        `).join('');

        containers.subSub.innerHTML = cardsHTML;

    } catch (error) {
        console.error('Error:', error);
        containers.subSub.innerHTML = '<div class="alert alert-danger fade-in">Terjadi kesalahan saat mengambil data</div>';
    }
}

async function showSucadBoxes(subSubCardLink) {
    const containers = {
        subSubSub: document.getElementById('sub-sub-sub-cards'),
        subSubSubSub: document.getElementById('sub-sub-sub-sub-cards'),
        showSucadBoxes: document.getElementById('show-Sucad-Boxes'),
        deskripsi: document.getElementById('deskripsi-cards'),
        wilayahBoxes: document.getElementById('wilayah-boxes'),
        totalperwilayahcards: document.getElementById('totalperwilayahcards'),
    };

    // Clear containers dengan fade
    Object.values(containers).forEach(container => {
        if (container) {
            container.style.opacity = '0';
            container.innerHTML = '';
            setTimeout(() => container.style.opacity = '1', 100);
        }
    });

    const boxesHTML = `
        <div class="row mb-4">
            <div class="d-flex justify-content-center align-items-center w-100">
                <div class="col-xl-5 mx-2">
                <div class="card hover-shadow transition-300 h-100" onclick="showWilayahBoxes('${subSubCardLink}');changeBackground(this);">
                    <div class="card shadow-lg border-0" 
                         style="border-radius: 15px; animation: fadeInUp 0.3s ease-out; transform: scale(0.98); transition: all 0.3s ease">
                        <div class="card-body bg-gradient-primary text-white" style="border-radius: 15px">
                            <div class="d-flex flex-column align-items-center">
                                <h5 class="mb-2 text-uppercase">Stok Sucad</h5>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-5 mx-2">
                    <div class="card hover-shadow transition-300 h-100" onclick="showSubSubSubCards('${subSubCardLink}');changeBackground(this);">
                        <div class="card shadow-lg border-0"
                             style="border-radius: 15px; animation: fadeInUp 0.4s ease-out; transform: scale(0.98); transition: all 0.3s ease">
                            <div class="card-body bg-gradient-success text-white" style="border-radius: 15px">
                                <div class="d-flex flex-column align-items-center">
                                    <h5 class="mb-2 text-uppercase">Total Sucad</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    `;

    containers.showSucadBoxes.innerHTML = boxesHTML;
}


async function totalperwilayah(subSubCardLink) {
    const containers = {
        subSubSub: document.getElementById('sub-sub-sub-cards'),
        deskripsi: document.getElementById('deskripsi-cards'),
        totalperwilayahcards: document.getElementById('totalperwilayahcards'),
    };

    // Clear containers dengan fade
    Object.values(containers).forEach(container => {
        if (container) {
            container.style.opacity = '0';
            container.innerHTML = '';
            setTimeout(() => (container.style.opacity = '1'), 100);
        }
    });

    try {
        // Mendapatkan sub_wilayah berdasarkan nama_wilayah
        const wilayahResponse = await fetch('/wilayah/getSubWilayahByWilayah/' + subSubCardLink);
        if (!wilayahResponse.ok) throw new Error('Gagal mengambil data sub wilayah.');

        const wilayahData = await wilayahResponse.json();
        const subWilayahs = wilayahData.map(item => item.sub_wilayah.toLowerCase());

        // Jika tidak ada sub_wilayah ditemukan
        if (subWilayahs.length === 0) {
            containers.deskripsi.innerHTML = '<div class="alert alert-info fade-in">Sub Wilayah tidak ditemukan</div>';
            return;
        }

        // Mengambil stok berdasarkan nama_versi untuk setiap sub_wilayah
        const stokPromises = wilayahData.map(item => 
            fetch(`/stokpusat/ambilpersubwilayah/${item.sub_wilayah}`)
        );
        const stokResponses = await Promise.all(stokPromises);
        const stokDataArray = await Promise.all(stokResponses.map(response => response.json()));

        // Log data stok untuk debug
        const groupedData = {};

        // Mengelompokkan data berdasarkan nama_kategori
        stokDataArray.forEach(stokData => {
            if (stokData.message === "Data tidak ditemukan") return;

            stokData.forEach(stok => {
                const kategori = stok.nama_kategori; // Ambil nama_kategori
                // Jika kategori belum ada dalam groupedData, buat array baru
                if (!groupedData[kategori]) {
                    groupedData[kategori] = [];
                }

                // Parse tabel HTML dari Deskripsi
                const parser = new DOMParser();
                const doc = parser.parseFromString(stok.Deskripsi, 'text/html');
                const rows = doc.querySelectorAll('table tbody tr');
                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    if (cells.length >= 4) { // Memastikan ada setidaknya 4 kolom
                        const partNumber = cells[0].textContent.trim();
                        const jenisSucad = cells[1].textContent.trim();
                        const namaSucad = cells[2].textContent.trim();
                        const yonkav = cells[3].textContent.trim();
                        groupedData[kategori].push({
                            partNumber: partNumber,
                            jenisSucad: jenisSucad,
                            namaSucad: namaSucad,
                            yonkav: yonkav,
                        });
                    }
                });
            });
        });

        // Step 2: Membuat header tabel dinamis
        let tableHTML = '';
        
        // Iterasi setiap kategori untuk membuat tabel terpisah
        for (const kategori in groupedData) {
            tableHTML += `
                <div class="table-responsive">
                    <table style="border: 1px solid #ccc; border-collapse: collapse; width: 100%; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                        <thead>
                            <tr>
                            <th colspan="${subWilayahs.length + 4}" style="border: 1px solid #ccc; text-align: center; background-color: #007bff; color: white; font-size: 1.2em;">Tabel Stok untuk Kategori: ${kategori}</th>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #ccc; padding: 10px; background-color: #f8f9fa; text-align: center;">Part Number</th>
                            <th style="border: 1px solid #ccc; padding: 10px; background-color: #f8f9fa; text-align: center;">Jenis Sucad</th>
                            <th style="border: 1px solid #ccc; padding: 10px; background-color: #f8f9fa; text-align: center;">Nama Sucad</th>
            `;

            // Menambahkan header untuk setiap subWilayah
            subWilayahs.forEach(subWilayah => {
                tableHTML += `<th style="border: 1px solid #ccc; padding: 10px; background-color: #f8f9fa; text-align: center;">${subWilayah}</th>`;
            });

            tableHTML += `<th style="border: 1px solid #ccc; padding: 10px; background-color: #f8f9fa; text-align: center;">Total</th></tr></thead><tbody>`;

            // Step 3: Iterasi data berdasarkan Part Number
            const partNumbers = []; // Menyimpan semua Part Number unik
            const dataArray = groupedData[kategori];

            if (dataArray) {
                dataArray.forEach(data => {
                    if (!partNumbers.includes(data.partNumber)) {
                        partNumbers.push(data.partNumber);
                    }
                });
            }

            // Iterasi Part Numbers
            partNumbers.forEach(partNumber => {
                let jenisSucad = '';
                let namaSucad = '';
                let totalYonkav = 0; // Inisialisasi total

                dataArray.forEach(item => {
                    if (item.partNumber.toLowerCase() === partNumber.toLowerCase()) {
                        jenisSucad = item.jenisSucad;
                        namaSucad = item.namaSucad;
                        totalYonkav += parseInt(item.yonkav) || 0; // Tambahkan ke total
                    }
                });

                tableHTML += `<tr>
                <td style="border: 1px solid #ccc; text-align: center;">${partNumber}</td>
                <td style="border: 1px solid #ccc; text-align: center;">${jenisSucad}</td>
                <td style="border: 1px solid #ccc; text-align: center;">${namaSucad}</td>
                `;

                // Tambahkan data berdasarkan subWilayah
                subWilayahs.forEach(subWilayah => {
                    const data = dataArray.find(item => item.partNumber.toLowerCase() === partNumber.toLowerCase());
                    tableHTML += `<td style="border: 1px solid #ccc; text-align: center;">${data ? data.yonkav : '-'}</td>`;
                });

                tableHTML += `<td style="border: 1px solid #ccc; text-align: center;">${totalYonkav}</td>`; // Tampilkan total
                tableHTML += `</tr>`;
            });

            tableHTML += `</tbody>`;
        }

        // Step 4: Tampilkan tabel
        containers.totalperwilayahcards.innerHTML = `
        <button id="downloadTableBtn">Download Semua Tabel ke PDF</button>
            ${tableHTML}
        </table>
        </div>
        `;

        // Event listener untuk tombol download
        document.getElementById('downloadTableBtn').addEventListener('click', () => {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF();
            const tables = containers.totalperwilayahcards.querySelectorAll('table');
            tables.forEach((table, index) => {
                pdf.autoTable({ html: table });
                if (index < tables.length - 2) {
                    pdf.addPage();
                }
            });
            pdf.save(`Tabel_${subSubCardLink}.pdf`);
        });

        // Implementasi pencarian
        const searchInput = document.createElement('input');
        searchInput.setAttribute('placeholder', 'Cari...');
        searchInput.classList.add('search-input');
        containers.totalperwilayahcards.prepend(searchInput);

        searchInput.addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const rows = containers.totalperwilayahcards.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    } catch (error) {
        console.error(error);
        containers.totalperwilayahcards.innerHTML = '<div class="alert alert-danger fade-in">Terjadi kesalahan saat mengambil data stok</div>';
    }
}

async function showSubSubSubCards(subSubCardLink) {
    const containers = {
        subSubSub: document.getElementById('sub-sub-sub-cards'),
        subSubSubSub: document.getElementById('sub-sub-sub-sub-cards'),
        subSubSubSubSub: document.getElementById('sub-sub-sub-sub-sub-cards'),
        deskripsi: document.getElementById('deskripsi-cards'),
        
        totalperwilayahcards: document.getElementById('totalperwilayahcards'),
        wilayahBoxes: document.getElementById('wilayah-boxes'),

    };

    // Clear containers dengan fade
    Object.values(containers).forEach(container => {
        if (container) {
            container.style.opacity = '0';
            container.innerHTML = '';
            setTimeout(() => (container.style.opacity = '1'), 100);
        }
    });

    try {
        const stokResponse = await fetch('/stokpusat/ambilsemua/' + subSubCardLink);
        if (!stokResponse.ok) throw new Error('Gagal mengambil data Stok.');

        const stokData = await stokResponse.json();
        if (stokData.message === "Data tidak ditemukan") {
            containers.deskripsi.innerHTML = '<div class="alert alert-info fade-in">Data tidak ditemukan</div>';
            return;
        }

        // Log data stok untuk debug
        const groupedData = {};

        // Mengelompokkan data berdasarkan sub_wilayah
        stokData.forEach(stok => {
            const subWilayah = stok.sub_wilayah;

            // Jika sub wilayah belum ada dalam groupedData, buat array baru
            if (!groupedData[subWilayah]) {
                groupedData[subWilayah] = [];
            }

            // Parse tabel HTML dari Deskripsi
            const parser = new DOMParser();
            const doc = parser.parseFromString(stok.Deskripsi, 'text/html');
            const rows = doc.querySelectorAll('table tbody tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                if (cells.length >= 4) { // Memastikan ada setidaknya 4 kolom
                    const partNumber = cells[0].textContent.trim();
                    const jenisSucad = cells[1].textContent.trim();
                    const namaSucad = cells[2].textContent.trim();
                    const yonkav = cells[3].textContent.trim();
                    groupedData[subWilayah].push({
                        partNumber: partNumber,
                        jenisSucad: jenisSucad,
                        namaSucad: namaSucad,
                        yonkav: yonkav,
                    });
                }
            });
        });

        console.log(groupedData); // Debug grouped data

        // Step 2: Membuat header tabel dinamis
        let tableHTML = `
<thead>
    <tr>
        <th>Part Number</th>
        <th>Jenis Sucad</th>
        <th>Nama Sucad</th>
`;

        // Menambahkan header untuk setiap subWilayah
        Object.keys(groupedData).forEach(subWilayah => {
            tableHTML += `<th>${subWilayah}</th>`;
        });

        tableHTML += `</tr></thead><tbody>`;

        // Step 3: Iterasi data berdasarkan Part Number
        const partNumbers = []; // Menyimpan semua Part Number unik
        // Ambil semua Part Number dari groupedData
        Object.values(groupedData).forEach(dataArray => {
            dataArray.forEach(data => {
                if (!partNumbers.includes(data.partNumber)) {
                    partNumbers.push(data.partNumber);
                }
            });
        });
        console.log("partNumbers: ", partNumbers);

        // Iterasi Part Numbers
        partNumbers.forEach(partNumber => {
            // Ambil data pertama yang cocok untuk jenisSucad dan namaSucad
            let jenisSucad = '';
            let namaSucad = '';

            Object.values(groupedData).forEach(dataArray => {
                const match = dataArray.find(item => item.partNumber === partNumber);
                if (match) {
                    jenisSucad = match.jenisSucad;
                    namaSucad = match.namaSucad;
                }
            });

            tableHTML += `<tr>
    <td>${partNumber}</td>
    <td>${jenisSucad}</td>
    <td>${namaSucad}</td>
`;

            // Tambahkan data berdasarkan subWilayah
            Object.keys(groupedData).forEach(subWilayah => {
                const matches = groupedData[subWilayah].filter(item => item.partNumber === partNumber);
                if (matches.length > 0) {
                    tableHTML += `<td>${matches.map(match => match.yonkav).join(', ')}</td>`;
                } else {
                    tableHTML += `<td></td>`;
                }
            });

            tableHTML += `</tr>`;
        });

        tableHTML += `</tbody>`;

        // Step 4: Tampilkan tabel
        containers.subSubSub.innerHTML = `
<table class="table table-bordered table-striped">
    ${tableHTML}
</table>
<button id="downloadTableBtn">Download Tabel ke PDF</button>
`;

        // Event listener untuk tombol download
        document.getElementById('downloadTableBtn').addEventListener('click', () => {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF();
            pdf.autoTable({ html: containers.subSubSub.querySelector('table') });
            pdf.save(`Tabel_${subSubCardLink}.pdf`);
        });

        // Implementasi pencarian
        const searchInput = document.createElement('input');
        searchInput.setAttribute('placeholder', 'Cari...');
        searchInput.classList.add('search-input');
        containers.subSubSub.prepend(searchInput);

        searchInput.addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const rows = containers.subSubSub.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    } catch (error) {
        console.error(error);
        containers.subSubSub.innerHTML = '<div class="alert alert-danger fade-in">Terjadi kesalahan saat mengambil data stok</div>';
    }
}

function showTabContent(stokId, index) {
    const tabContents = document.querySelectorAll(`#sheet-${stokId}-0, #sheet-${stokId}-1, #sheet-${stokId}-2`);
    tabContents.forEach((content, idx) => {
        content.classList.remove('show', 'active');
        if (idx === index) {
            content.classList.add('show', 'active');
        }
    });
}

async function showSubSubSubSubCards(nama_wilayah) {
    const containers = {
        subSubSubSub: document.getElementById('sub-sub-sub-sub-cards'),
        deskripsi: document.getElementById('deskripsi-cards'),
        wilayahBoxes: document.getElementById('wilayah-boxes'),
        deskripsi: document.getElementById('deskripsi-cards'),
        totalperwilayahcards: document.getElementById('totalperwilayahcards'),

    };

    // Clear dengan efek fade
    Object.values(containers).forEach(container => {
        if (container) {
            container.style.opacity = '0';
            container.innerHTML = '';
            setTimeout(() => container.style.opacity = '1', 100);
        }
    });

    try {
        const response = await fetch('/wilayah/getByWilayah/' + nama_wilayah);
        if (!response.ok) throw new Error(`Error fetching data: ${response.status}`);

        const ranpurData = await response.json();
        if (ranpurData.length === 0) {
            containers.subSubSubSub.innerHTML = '<div class="alert alert-info fade-in">Data tidak ditemukan</div>';
            return;
        }

        const cardsHTML = ranpurData.map((ranpur, index) => `
            <div class="col-xl-3 col-md-6 mb-4" style="animation: fadeInUp ${0.2 + index * 0.1}s ease-out">
                <div class="card hover-shadow transition-300 h-100" 
                     onclick="showDeskripsi('${ranpur.nama_ranpur}', '${ranpur.nama_wilayah}');changeBackground(this);" 
                     style="border-radius: 15px; transform: scale(1); transition: all 0.3s ease">
                    <div class="card-body bg-gradient-light" style="border-radius: 15px">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-dark mb-0 fw-bold">${ranpur.nama_ranpur}</h5>
                            </div>
                            <div class="ms-3">
                                <i class="fas fa-chevron-right text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');

        containers.subSubSubSub.innerHTML = cardsHTML;

    } catch (error) {
        console.error('Error:', error);
        containers.subSubSubSub.innerHTML = '<div class="alert alert-danger fade-in">Terjadi kesalahan saat mengambil data</div>';
    }
}

async function showWilayahBoxes(wilayahlink, nama_versi) {
    const containers = {
        wilayahBoxes: document.getElementById('wilayah-boxes'),
        deskripsi: document.getElementById('deskripsi-cards'),
        subSubSubSubSub: document.getElementById('sub-sub-sub-sub-cards'),
        subSubSubSub: document.getElementById('sub-sub-sub-cards'),
        totalperwilayahcards: document.getElementById('totalperwilayahcards'),
    };

    // Clear containers dengan fade
    Object.values(containers).forEach(container => {
        if (container) {
            container.style.opacity = '0';
            container.innerHTML = '';
            setTimeout(() => container.style.opacity = '1', 100);
        }
    });

    try {
        const response = await fetch('/wilayah/getByWilayah/' + wilayahlink);
        if (!response.ok) throw new Error('Gagal mengambil data wilayah');

        const wilayahData = await response.json();
        if (wilayahData.length === 0) {
            containers.wilayahBoxes.innerHTML = '<div class="alert alert-info fade-in">Data wilayah tidak ditemukan</div>';
            return;
        }

        const boxesHTML = wilayahData.map((wilayah, index) => `
            <div class="col-xl-3 col-md-6 mb-4" style="animation: fadeInUp ${0.2 + index * 0.1}s ease-out">
                <div class="card hover-shadow transition-300 h-100" 
                     onclick="showSubWilayahBoxes('${wilayah.nama_wilayah}', '${wilayah.nama_versi}');changeBackground(this);" 
                     style="border-radius: 15px; transform: scale(1); transition: all 0.3s ease">
                    <div class="card-body bg-gradient-info" style="border-radius: 15px">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-white mb-0 fw-bold">${wilayah.nama_wilayah}</h5>
                            </div>
                            <div class="ms-3">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');

        containers.wilayahBoxes.innerHTML = boxesHTML;

    } catch (error) {
        console.error('Error:', error);
        containers.wilayahBoxes.innerHTML = '<div class="alert alert-danger fade-in">Terjadi kesalahan saat mengambil data wilayah</div>';
    }
}

async function showSubWilayahBoxes(nama_wilayah) {
    const containers = {
        subSubSubSub: document.getElementById('sub-sub-sub-sub-cards'),
        totalperwilayahcards: document.getElementById('totalperwilayahcards'),
    };

    // Clear dengan efek fade
    Object.values(containers).forEach(container => {
        if (container) {
            container.style.opacity = '0';
            container.innerHTML = '';
            setTimeout(() => container.style.opacity = '1', 100);
        }
    });

    try {
        const response = await fetch('/wilayah/getSubWilayahByWilayah/' + nama_wilayah);
        if (!response.ok) throw new Error('Gagal mengambil data sub wilayah');

        const subWilayahData = await response.json();
        if (subWilayahData.length === 0) {
            containers.subSubSubSub.innerHTML = '<div class="alert alert-info fade-in">Data sub wilayah tidak ditemukan</div>';
            return;
        }

        const cardsHTML = subWilayahData.map((subWilayah, index) => `
            <div class="col-xl-3 col-md-6 mb-4" style="animation: fadeInUp ${0.2 + index * 0.1}s ease-out">
                <div class="card hover-shadow transition-300 h-100" 
                     onclick="deskripsipersubwilayah('${subWilayah.nama_versi}', '${subWilayah.sub_wilayah}'); changeBackgroundasub(this);"
                     style="border-radius: 15px; transform: scale(1); transition: all 0.3s ease">
                    <div class="card-body bg-gradient-light" style="border-radius: 15px">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-dark mb-0 fw-bold">${subWilayah.sub_wilayah}</h5>
                            </div>
                            <div class="ms-3">
                                <i class="fas fa-chevron-right text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');

        // Tambahkan satu card total di akhir
        const totalCardHTML = `
            <div class="col-xl-3 col-md-6 mb-4" style="animation: fadeInUp ${0.2 + subWilayahData.length * 0.1}s ease-out">
                <div class="card hover-shadow transition-300 h-100" 
                     onclick="totalperwilayah('${subWilayahData[0].nama_wilayah}'); changeBackgroundasub(this);"
                     style="border-radius: 15px; transform: scale(1); transition: all 0.3s ease">
                    <div class="card-body bg-gradient-success" style="border-radius: 15px">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-white mb-0 fw-bold">Total</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        containers.subSubSubSub.innerHTML = cardsHTML + totalCardHTML;

    } catch (error) {
        console.error('Error:', error);
        containers.subSubSubSub.innerHTML = '<div class="alert alert-danger fade-in">Terjadi kesalahan saat mengambil data sub wilayah</div>';
    }
}

async function deskripsipersubwilayah(nama_versi, subwilayah) {
    const containers = {
        subSubSub: document.getElementById('sub-sub-sub-cards'),
        deskripsicardcontainer: document.getElementById('deskripsi-cards'),
        totalperwilayahcards: document.getElementById('totalperwilayahcards'),
    };

    // Clear containers dengan fade
    Object.values(containers).forEach(container => {
        if (container) {
            container.style.opacity = '0';
            container.innerHTML = '';
            setTimeout(() => (container.style.opacity = '1'), 100);
        }
    });

    try {
        const stokResponse = await fetch('/stokpusat/getBytipe/' + nama_versi + '/' + subwilayah);
        if (!stokResponse.ok) throw new Error('Gagal mengambil data Stok.');

        const stokData = await stokResponse.json();
        if (stokData.message === "Data tidak ditemukan") {
            containers.deskripsicardcontainer.innerHTML = '<div class="alert alert-info fade-in">Data tidak ditemukan</div>';
            return;
        }

        if (stokData.length > 0) {
            stokData.forEach((stok, index) => {
                const descriptionParts = stok.deskripsi ? stok.deskripsi.split('<hr>').map(part => part.trim()) : [];

                const tabContentsHTML = descriptionParts.map((part, partIndex) => {
                    // Parse konten tabel
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(part, "text/html");
                    const table = doc.querySelector("table");

                    if (table) {
                        const headers = table.querySelectorAll("thead th");
                        const rows = table.querySelectorAll("tbody tr");
                        subwilayah = subwilayah.toLowerCase();

                        const validColumns = ["part number", "jenis sucad", "nama sucad", subwilayah];
                        const columnIndexes = Array.from(headers)
                            .map((header, index) => {
                                const headerText = header.textContent.trim().toLowerCase();
                                return validColumns.includes(headerText) ? index : -1;
                            })
                            .filter(index => index !== -1);

                        // Sembunyikan header yang tidak valid
                        headers.forEach((header, index) => {
                            if (!columnIndexes.includes(index)) header.style.display = "none";
                        });

                        // Sembunyikan sel pada setiap baris yang tidak valid
                        rows.forEach(row => {
                            const cells = row.querySelectorAll("td");
                            cells.forEach((cell, index) => {
                                if (!columnIndexes.includes(index)) cell.style.display = "none";
                            });
                        });
                    }

                    return `
                        <div class="tab-pane fade ${partIndex === 0 ? "show active" : ""}" 
                             id="sheet-${stok.id}-${partIndex}" 
                             role="tabpanel"
                             style="animation: fadeIn 0.3s ease-out">
                            ${table ? table.outerHTML : `Konten untuk Sheet ${partIndex + 1} kosong`}
                        </div>
                    `;
                }).join("");

                //DATA PER BATALYON
                const cardHTML = `
                    <div class="col" style="animation: fadeInUp ${0.2 + index * 0.1}s ease-out">
                        <div class="card shadow-lg border-0 mb-4" style="border-radius: 20px; overflow: hidden">
                            <div class="card-header bg-primary text-white py-3" style="border-radius: 20px 20px 0 0">
                                <h5 class="mb-0 text-center fw-bold">STOK DATA - ${stok.nama_kategori}</h5>
                                <button class="btn btn-light btn-sm" onclick="downloadTableToPDF('${stok.id}', '${stok.nama_kategori}')">Download PDF</button>
                            </div>
                            <div class="card-body">
                            <div class="input-group mb-3">
                                    <span class="input-group-text bg-light" style="border-radius: 10px 0 0 10px">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" 
                                           class="form-control search-input" 
                                           data-target="${stok.id}"
                                           data-kategori="${stok.nama_kategori}"
                                           placeholder="Cari data..."
                                           style="border-radius: 0 10px 10px 0">
                                </div>
                                <ul class="nav nav-tabs" role="tablist">
                                    ${descriptionParts.map((_, partIndex) => `
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link ${partIndex === 0 ? "active" : ""}" 
                                                    id="sheet-${stok.id}-${partIndex}-tab" 
                                                    data-bs-toggle="tab" 
                                                    data-bs-target="#sheet-${stok.id}-${partIndex}" 
                                                    type="button" 
                                                    role="tab"
                                                    style="border-radius: 10px 10px 0 0">
                                                Sheet ${partIndex + 1}
                                            </button>
                                        </li>
                                    `).join("")}
                                </ul>
                                <div class="tab-content mt-3">
                                    ${tabContentsHTML}
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                containers.deskripsicardcontainer.insertAdjacentHTML('beforeend', cardHTML);
            });
            document.querySelectorAll('.search-input').forEach(input => {
                input.addEventListener('input', function () {
                    const searchTerm = this.value.toLowerCase();
                    const stokId = this.getAttribute('data-target');
                    const kategori = this.getAttribute('data-kategori');

                    const cardContainer = this.closest('.card');
                    const tables = cardContainer.querySelectorAll(`#sheet-${stokId}-0 table, #sheet-${stokId}-1 table, #sheet-${stokId}-2 table`);

                    tables.forEach(table => {
                        const rows = table.querySelectorAll('tr');
                        rows.forEach((row, index) => {
                            if (index === 0) return;

                            const text = row.textContent.toLowerCase();
                            row.style.transition = 'opacity 0.3s ease';
                            if (text.includes(searchTerm) || text.includes(subwilayah)) {
                                row.style.display = '';
                                row.style.opacity = '1';
                            } else {
                                row.style.opacity = '0';
                                setTimeout(() => row.style.display = 'none', 300);
                            }
                        });
                    });
                });
            });
        }
    } catch (error) {
        console.error(error);
        containers.deskripsicardcontainer.innerHTML = '<div class="alert alert-danger fade-in">Terjadi kesalahan saat mengambil data stok</div>';
    }
}

function downloadTableToPDF(stokId, nama_kategori) {
    const cardContainer = document.querySelector(`#sheet-${stokId}-0`);
    const table = cardContainer ? cardContainer.querySelector("table") : null;

    if (table) {
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF();

        // Menambahkan judul di atas tabel
        pdf.setFontSize(16); // Ukuran font untuk judul
        pdf.text(`Stok Data - ${nama_kategori}`, 14, 20); // Menambahkan teks judul pada posisi x: 14, y: 20

        // Menambahkan tabel
        pdf.autoTable({
            html: table,
            startY: 30, // Posisi tabel setelah judul
            theme: 'grid',
            styles: { fontSize: 10 },
            margin: { top: 20 }
        });

        // Menyimpan file PDF
        pdf.save(`Stok_Data_${nama_kategori}.pdf`);
    } else {
        alert('Tidak ada tabel untuk diunduh.');
    }
}


