async function showSubCards(type) {
    const containers = {
        sub: document.getElementById('sub-cards'),
        subSub: document.getElementById('sub-sub-cards'),
        subSubSub: document.getElementById('sub-sub-sub-cards'),
        subSubSubSub: document.getElementById('sub-sub-sub-sub-cards'),
        deskripsi: document.getElementById('deskripsi-cards'),
        wilayahBoxes: document.getElementById('wilayah-boxes'),
        showSucadBoxes: document.getElementById('show-Sucad-Boxes')
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
                     onclick="showSubSubCards('${ranpur.tipe_ranpur}')"
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
        wilayahBoxes: document.getElementById('wilayah-boxes')
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
                     onclick="showSucadBoxes('${ranpur.nama_versi}')"
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
        wilayahBoxes: document.getElementById('wilayah-boxes')
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
                <div class="card hover-shadow transition-300 h-100" onclick="showWilayahBoxes('${subSubCardLink}')">
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
                    <div class="card hover-shadow transition-300 h-100" onclick="showSubSubSubCards('${subSubCardLink}')">
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

async function showSubSubSubCards(subSubCardLink) {
    const containers = {
        subSubSub: document.getElementById('sub-sub-sub-cards'),
        subSubSubSub: document.getElementById('sub-sub-sub-sub-cards'),
        deskripsi: document.getElementById('deskripsi-cards'),
        wilayahBoxes: document.getElementById('wilayah-boxes'),
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
        const stokResponse = await fetch('/stokpusat/getBytipe/' + subSubCardLink);
        if (!stokResponse.ok) throw new Error('Gagal mengambil data Stok.');

        const stokData = await stokResponse.json();
        if (stokData.message === "Data tidak ditemukan") {
            containers.deskripsi.innerHTML = '<div class="alert alert-info fade-in">Data tidak ditemukan</div>';
            return;
        }

        if (stokData.length > 0) {
            stokData.forEach((stok, index) => {
                const descriptionParts = stok.deskripsi ? stok.deskripsi.split('<hr>').map(part => part.trim()) : [];

                const tabsHTML = descriptionParts.map((_, index) => `
                    <li class="nav-item" role="presentation">
                        <button class="nav-link ${index === 0 ? 'active' : ''}" 
                                id="sheet-${stok.id}-${index}-tab" 
                                data-bs-toggle="tab" 
                                data-bs-target="#sheet-${stok.id}-${index}" 
                                type="button" 
                                role="tab"
                                style="border-radius: 10px 10px 0 0">
                            Sheet ${index + 1}
                        </button>
                    </li>
                `).join('');

                const tabContentsHTML = descriptionParts.map((part, index) => `
                    <div class="tab-pane fade ${index === 0 ? 'show active' : ''}" 
                         id="sheet-${stok.id}-${index}" 
                         role="tabpanel"
                         style="animation: fadeIn 0.3s ease-out">
                        ${part || `Konten untuk Sheet ${index + 1} kosong`}
                    </div>
                `).join('');
//TOTAL
                const cardHTML = `
                    <div class="col" style="animation: fadeInUp ${0.2 + index * 0.1}s ease-out">
                        <div class="card shadow-lg border-0 mb-4" style="border-radius: 20px; overflow: hidden">
                            <div class="card-header bg-primary text-white py-3" style="border-radius: 20px 20px 0 0">
                                <h5 class="mb-0 text-center fw-bold">STOK DATA PUSAT - ${stok.nama_kategori}</h5>
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
                                    ${tabsHTML}
                                </ul>
                                <div class="tab-content mt-3">
                                    ${tabContentsHTML}
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                containers.subSubSub.insertAdjacentHTML('beforeend', cardHTML);
            });

            // Implementasi pencarian
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
                            if (text.includes(searchTerm)) {
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
        containers.subSubSub.innerHTML = '<div class="alert alert-danger fade-in">Terjadi kesalahan saat mengambil data stok</div>';
    }
}

async function showSubSubSubSubCards(nama_wilayah) {
    const containers = {
        subSubSubSub: document.getElementById('sub-sub-sub-sub-cards'),
        deskripsi: document.getElementById('deskripsi-cards'),
        wilayahBoxes: document.getElementById('wilayah-boxes'),
        deskripsi: document.getElementById('deskripsi-cards')
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
                     onclick="showDeskripsi('${ranpur.nama_ranpur}', '${ranpur.nama_wilayah}')"
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
                     onclick="showSubWilayahBoxes('${wilayah.nama_wilayah}', '${wilayah.nama_versi}')"
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
                     onclick="deskripsipersubwilayah('${subWilayah.nama_versi}', '${subWilayah.sub_wilayah}')"
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

        containers.subSubSubSub.innerHTML = cardsHTML;

    } catch (error) {
        console.error('Error:', error);
        containers.subSubSubSub.innerHTML = '<div class="alert alert-danger fade-in">Terjadi kesalahan saat mengambil data sub wilayah</div>';
    }
}

async function deskripsipersubwilayah(nama_versi, subwilayah) {
    const containers = {
        subSubSub: document.getElementById('sub-sub-sub-cards'),
        deskripsicardcontainer: document.getElementById('deskripsi-cards'),
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
        const stokResponse = await fetch('/stokpusat/getBytipe/' + nama_versi);
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
                            if (text.includes(searchTerm)) {
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

