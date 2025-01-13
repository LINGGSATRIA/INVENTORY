<?= $this->extend('Component/C_Template') ?>
<?= $this->section('konten') ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">DATA STOK PUSAT</h6>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('admin/stokpusat/simpan') ?>" method="POST" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_versi" class="form-label font-weight-bold">Versi Ranpur</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tank"></i></span>
                                </div>
                                <input type="text" name="nama_versi" id="nama_versi" class="form-control" placeholder="Cari atau Masukkan Versi Ranpur" list="versi_ranpur_list" required>
                                <datalist id="versi_ranpur_list">
                                    <?php foreach ($versiRanpur as $v): ?>
                                        <option value="<?= $v['nama_versi'] ?>"></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_kategori" class="form-label font-weight-bold">Jenis Sucad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tools"></i></span>
                                </div>
                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Cari atau Masukkan Kategori" list="kategori_list" required>
                                <datalist id="kategori_list">
                                    <?php foreach ($nama_kategori as $k): ?>
                                        <option value="<?= $k['nama_kategori'] ?>"></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="editor_content" class="form-label font-weight-bold">Deskripsi</label>
                    <textarea name="editor_content" id="editor" class="form-control"></textarea>
                </div>

                <div class="text-right">
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/xi1masz3mo2f2jzhtzzvub7jqj74khj8186jym9cgjwmostl/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const versiInput = document.getElementById('nama_versi');
        const kategoriInput = document.getElementById('nama_kategori');

        tinymce.init({
            selector: '#editor',
            plugins: 'table',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | table',
            menubar: 'file edit insert view format table',
            skin: 'oxide',
            content_css: 'default',
            setup: function(editor) {
                editor.on('init', function() {
                    window.editor = editor;
                    editor.setContent(`
                        <table class="table table-bordered" id="dataTable" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Part Number</th>
                                    <th>Jenis Sucad</th>
                                    <th>Nama Sucad</th>
                                    <th>Yonkav 1</th>
                                    <th>Yonkav 8</th>
                                    <th>Pusdikkav</th>
                                    <th>Kikav Puslatpur</th>
                                    <th>Bengpuskav</th>
                                    <th>Gupusran</th>
                                    <th>Total Sucad</th>
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
                            </tbody>
                        </table>
                    `);
                });
            }
        });

        function fetchDeskripsi() {
            const nama_versi = versiInput.value;
            const nama_kategori = kategoriInput.value;
            const sub_wilayah = ranpurInput.value;

            if (nama_versi && nama_kategori) {
                fetch('<?= site_url('admin/stokpusat/getDeskripsi') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: JSON.stringify({
                        nama_versi,
                        nama_kategori,
                        sub_wilayah
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.editor.setContent(data.deskripsi);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }

        versiInput.addEventListener('input', fetchDeskripsi);
        kategoriInput.addEventListener('input', fetchDeskripsi);
    });
</script>

<?= $this->endSection() ?>