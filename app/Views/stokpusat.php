<?= $this->extend('Component/C_Template') ?>
<?= $this->section('konten') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">DATA STOK PUSAT</h1>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('admin/stokpusat/simpan') ?>" method="POST">
        <div class="mb-3">
            <label for="tipe_ranpur" class="form-label">Versi Ranpur</label>
            <input type="text" name="nama_versi" id="nama_versi" class="form-control" placeholder="Cari atau Masukkan Versi Ranpur" list="versi_ranpur_list">
            <datalist id="versi_ranpur_list">
                <?php foreach ($versiRanpur as $v): ?>
                    <option value="<?= $v['nama_versi'] ?>"></option>
                <?php endforeach; ?>
            </datalist>
        </div>

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Jenis Sucad</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Cari atau Masukkan Kategori" list="kategori_list">
            <datalist id="kategori_list">
                <?php foreach ($nama_kategori as $k): ?>
                    <option value="<?= $k['nama_kategori'] ?>"></option>
                <?php endforeach; ?>
            </datalist>
        </div>

        <div class="mb-3">
            <label for="editor_content" class="form-label">Deskripsi</label>
            <textarea name="editor_content" id="editor"></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>

<script src="https://cdn.tiny.cloud/1/xi1masz3mo2f2jzhtzzvub7jqj74khj8186jym9cgjwmostl/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<!-- <script>
    tinymce.init({
    selector: '#editor',
    plugins: 'table',
    toolbar: 'table',
    setup: function (editor) {
        editor.on('init', function () {
            // Sisipkan tabel dengan format default
            editor.setContent(`
                <table border="1" style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th>No. Seri Sukcad</th>
                            <th>Jenis Sukcad</th>
                            <th>Nama Sukcad</th>
                            <th>Yonkav I</th>
                            <th>Yonkav 8</th>
                            <th>Pusdikkav</th>
                            <th>Kikav Puslatpur</th>
                            <th>Bengpuskav</th>
                            <th>Gupusran</th>
                            <th>Total Sukcad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            `);
        });
    },
});
</script> -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const versiInput = document.getElementById('nama_versi');
        const kategoriInput = document.getElementById('nama_kategori');

        // Inisialisasi TinyMCE dengan format tabel awal
        tinymce.init({
            selector: '#editor', // ID textarea untuk TinyMCE
            plugins: 'table', // Aktifkan plugin sesuai kebutuhan
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | table', // Toolbar sesuai preferensi
            menubar: 'file edit insert view format table',
            setup: function(editor) {
                editor.on('init', function() { // Simpan editor TinyMCE dalam variabel
                    window.editor = editor;

                    // Setel konten editor dengan format tabel awal saat pertama kali dimuat
                    editor.setContent(`
                <table border="1"  id="dataTable" style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th>No. Seri Sukcad</th>
                            <th>Jenis Sukcad</th>
                            <th>Nama Sukcad</th>
                            <th>Yonkav I</th>
                            <th>Yonkav 8</th>
                            <th>Pusdikkav</th>
                            <th>Kikav Puslatpur</th>
                            <th>Bengpuskav</th>
                            <th>Gupusran</th>
                            <th>Total Sukcad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

`);

                });
            }
        });

        // Fungsi untuk mengambil deskripsi
        function fetchDeskripsi() {
            const nama_versi = versiInput.value;
            const nama_kategori = kategoriInput.value;

            // Pastikan kedua input memiliki nilai
            if (nama_versi && nama_kategori) {
                fetch('<?= site_url('admin/stokpusat/getDeskripsi') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        body: JSON.stringify({
                            nama_versi,
                            nama_kategori
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Setel konten editor dengan deskripsi yang diterima
                            window.editor.setContent(data.deskripsi);
                        } else {
                            window.editor.setContent(`
<table border="1" id="dataTable" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th>No. Seri Sukcad</th>
            <th>Jenis Sukcad</th>
            <th>Nama Sukcad</th>
            <th>Yonkav I</th>
            <th>Yonkav 8</th>
            <th>Pusdikkav</th>
            <th>Kikav Puslatpur</th>
            <th>Bengpuskav</th>
            <th>Gupusran</th>
            <th>Total Sukcad</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
`);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        // Event listener untuk perubahan input
        versiInput.addEventListener('input', fetchDeskripsi);
        kategoriInput.addEventListener('input', fetchDeskripsi);
    });
</script>

<?= $this->endSection() ?>