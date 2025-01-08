<?= $this->extend('Component/C_Template') ?>
<?= $this->section('konten') ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">DATA RANPUR</h6>
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

            <form action="<?= site_url('admin/ranpur/simpan') ?>" method="POST" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jenis_ranpur" class="form-label font-weight-bold">Jenis Ranpur</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tank"></i></span>
                                </div>
                                <input type="text" name="jenis_ranpur" id="jenis_ranpur" class="form-control" placeholder="Cari atau Masukkan Jenis Ranpur" list="jenis_ranpur_list" required>
                                <datalist id="jenis_ranpur_list">
                                    <?php foreach ($jenis_ranpur as $jenis): ?>
                                        <option value="<?= $jenis['nama_ranpur'] ?>"></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tipe_ranpur" class="form-label font-weight-bold">Tipe Ranpur</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                                </div>
                                <input type="text" name="tipe_ranpur" id="tipe_ranpur" class="form-control" placeholder="Cari atau Masukkan Tipe Ranpur" list="tipe_ranpur_list" required>
                                <datalist id="tipe_ranpur_list">
                                    <?php foreach ($tipe_ranpur as $tipe): ?>
                                        <option value="<?= $tipe['tipe_ranpur'] ?>"></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="versi_ranpur" class="form-label font-weight-bold">Versi Ranpur</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-code-branch"></i></span>
                                </div>
                                <input type="text" name="versi_ranpur" id="versi_ranpur" class="form-control" placeholder="Cari atau Masukkan Versi Ranpur" list="versi_list" required>
                                <datalist id="versi_list">
                                    <?php foreach ($versi_ranpur as $v): ?>
                                        <option value="<?= $v['nama_versi'] ?>"></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama_wilayah" class="form-label font-weight-bold">Wilayah</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="text" name="nama_wilayah" id="nama_wilayah" class="form-control" placeholder="Cari atau Masukkan Wilayah" list="wilayah_list" required>
                                <datalist id="wilayah_list">
                                    <?php foreach ($wilayah as $w): ?>
                                        <option value="<?= $w['nama_wilayah'] ?>"></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sub_wilayah" class="form-label font-weight-bold">Sub Wilayah</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map"></i></span>
                                </div>
                                <input type="text" name="sub_wilayah" id="sub_wilayah" class="form-control" placeholder="Cari atau Masukkan Sub Wilayah" list="sub_wilayah_list" required>
                                <datalist id="sub_wilayah_list">
                                    <?php foreach ($sub_wilayah as $sw): ?>
                                        <option value="<?= $sw['sub_wilayah'] ?>"></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right mt-4">
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
    tinymce.init({
        selector: '#editor',
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | styleselect | judulSheet kontenSheet pemisahSheet | bold italic | alignleft aligncenter alignright | bullist numlist | link image',
        language: 'id',
        setup: function(editor) {
            editor.ui.registry.addButton('judulSheet', {
                text: 'Judul Sheet',
                onAction: function() {
                    editor.insertContent('<p style="color: blue; font-weight: bold;">Judul Sheet</p>');
                }
            });

            editor.ui.registry.addButton('kontenSheet', {
                text: 'Konten Sheet',
                onAction: function() {
                    editor.insertContent('<p style="color: gray; font-style: italic;">Konten untuk Sheet</p>');
                }
            });

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