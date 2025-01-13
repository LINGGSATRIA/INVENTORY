<?= $this->extend('Component/C_Template') ?>
<?= $this->section('konten') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen User</h1>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form User</h6>
                </div>
                <div class="card-body">
                    <form id="userForm" action="user/create" method="POST" enctype="multipart/form-data">
                        <div class="form-group text-center mb-4">
                            <img id="currentPhoto" src="<?= base_url('../img/undraw_profile_2.svg') ?>" alt="Current Photo" class="img-profile rounded-circle border border-primary" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="mt-3">
                                <label for="foto" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-camera mr-2"></i>Pilih Foto
                                </label>
                                <input type="file" class="d-none" id="foto" name="foto" accept="image/*">
                            </div>
                        </div>

                        <input type="hidden" id="userId" name="userId">
                        
                        <div class="form-group">
                            <label for="name" class="text-dark font-weight-bold">Nama</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sub_wilayah" class="text-dark font-weight-bold">Sub Wilayah</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="sub_wilayah" name="sub_wilayah" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="text-dark font-weight-bold">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-dark font-weight-bold">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="text-dark font-weight-bold">Role</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                </div>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="3">Admin Wilayah</option>
                                    <option value="2">User</option>
                                    <option value="1">Admin Pusat</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-secondary mr-2" id="cancelButton">
                                <i class="fas fa-times mr-1"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-primary" id="submitButton">
                                <i class="fas fa-save mr-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Sub Wilayah</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($users)): ?>
                                    <?php foreach ($users as $index => $user): ?>
                                        <tr>
                                            <td class="text-center"><?= $index + 1 ?></td>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td>
                                                <?php if($user['role'] == 1): ?>
                                                    <span class="badge badge-primary">Admin Pusat</span>
                                                <?php elseif($user['role'] == 2): ?>
                                                    <span class="badge badge-info">User</span>
                                                <?php elseif($user['role'] == 3): ?>
                                                    <span class="badge badge-success">Admin Wilayah</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $user['sub_wilayah'] ?></td>
                                            <td class="text-center">
                                                <?php if ($user['foto'] && file_exists('adminfoto/' . $user['foto'])): ?>
                                                    <img src="../adminfoto/<?= $user['foto'] ?>" alt="Foto User" class="img-profile rounded-circle border" style="width: 40px; height: 40px; object-fit: cover;">
                                                <?php else: ?>
                                                    <img src="<?= base_url('../img/undraw_profile_2.svg') ?>" alt="Foto User" class="img-profile rounded-circle border" style="width: 40px; height: 40px; object-fit: cover;">
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-warning btn-sm mr-1" onclick="editUser(<?= $user['id'] ?>)">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="user/delete/<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const editUser = (id) => {
        fetch(`user/edit/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('userId').value = data.id;
                document.getElementById('name').value = data.name;
                document.getElementById('email').value = data.email;
                document.getElementById('password').value = '';
                document.getElementById('role').value = data.role;

                if (data.foto) {
                    document.getElementById('currentPhoto').src = `/adminfoto/${data.foto}`;
                } else {
                    document.getElementById('currentPhoto').src = '<?= base_url('../img/undraw_profile_2.svg') ?>';
                }

                document.getElementById('userForm').action = `user/update/${id}`;
                document.getElementById('submitButton').innerHTML = '<i class="fas fa-save mr-1"></i> Update';
            });
    };

    const resetForm = () => {
        document.getElementById('userForm').action = 'user/create';
        document.getElementById('userId').value = '';
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
        document.getElementById('role').value = '2';
        document.getElementById('submitButton').innerHTML = '<i class="fas fa-save mr-1"></i> Simpan';
        document.getElementById('currentPhoto').src = '<?= base_url('../img/undraw_profile_2.svg') ?>';
    };

    document.getElementById('cancelButton').addEventListener('click', resetForm);
    document.getElementById('userForm').addEventListener('reset', resetForm);
</script>

<?= $this->endSection() ?>