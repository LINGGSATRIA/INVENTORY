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
        <!-- Form for Tipe Ranpur -->
        <div class="mb-3">
            <label for="tipe_ranpur" class="form-label">Tipe Ranpur</label>
            <input type="text" name="tipe_ranpur" id="tipe_ranpur" class="form-control" placeholder="Cari atau Masukkan Tipe Ranpur" list="tipe_ranpur_list">
            <datalist id="tipe_ranpur_list">
                <?php foreach ($tipe_ranpur as $tipe): ?>
                    <option value="<?= $tipe['tipe_ranpur'] ?>"></option>
                <?php endforeach; ?>
            </datalist>
        </div>

        <!-- Form for Wilayah -->
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Cari atau Masukkan Kategori" list="kategori_list">
            <datalist id="kategori_list">
                <?php foreach ($nama_kategori as $k): ?>
                    <option value="<?= $k['nama_kategori'] ?>"></option>
                <?php endforeach; ?>
            </datalist>
        </div>

        <!-- Form for Deskripsi -->
        <div class="mb-3">
            <label for="editor_content" class="form-label">Deskripsi</label>
            <textarea name="editor_content" id="editor"></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>

<script src="https://cdn.tiny.cloud/1/xi1masz3mo2f2jzhtzzvub7jqj74khj8186jym9cgjwmostl/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#editor',
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | styleselect | judulSheet kontenSheet pemisahSheet | bold italic | alignleft aligncenter alignright | bullist numlist | link image',
        language: 'id',
        setup: function(editor) {
            // Tombol untuk Judul Sheet
            editor.ui.registry.addButton('judulSheet', {
                text: 'Judul Sheet',
                onAction: function() {
                    editor.insertContent('<p style="color: blue; font-weight: bold;">Judul Sheet</p>');
                }
            });

            // Tombol untuk Konten Sheet
            editor.ui.registry.addButton('kontenSheet', {
                text: 'Konten Sheet',
                onAction: function() {
                    editor.insertContent('<p style="color: gray; font-style: italic;">Konten untuk Sheet</p>');
                }
            });

            // Tombol untuk Pemisah Sheet
            editor.ui.registry.addButton('pemisahSheet', {
                text: 'Pemisah Sheet',
                onAction: function() {
                    editor.insertContent('<hr>');
                }
            });
        }
    });
</script>
<?= $this->endSection() ?>