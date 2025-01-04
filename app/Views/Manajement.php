<?= $this->extend('Component/C_Template') ?>
<?= $this->section('konten') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manajemen User</h1>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Form Create/Update -->
    <form id="userForm" action="user/create" method="POST" enctype="multipart/form-data">

        <!-- Menampilkan Foto yang Sudah Ada (Jika Ada) -->
        <div class="form-group d-flex justify-content-center">
            <img id="currentPhoto" src="<?= base_url('../img/undraw_profile_2.svg') ?>" alt="Current Photo" style="max-width: 150px; max-height: 150px; border-radius: 8px;">
        </div>
        <!-- Input Foto -->
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
        </div>

        <input type="hidden" id="userId" name="userId">
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="2">User</option>
                <option value="1">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3" id="submitButton">Simpan</button>
        <button type="button" class="btn btn-secondary mt-3" id="cancelButton">Batal</button>
    </form>

    <!-- Tabel Data -->
    <h3 class="mt-5">Daftar User</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Foto</th> <!-- Kolom Foto -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <?php
                            $roles = [
                                1 => 'Admin',
                                2 => 'User'
                            ];
                            echo isset($roles[$user['role']]) ? $roles[$user['role']] : 'Unknown';
                            ?>
                        </td>
                        <td>
                            <?php if ($user['foto'] && file_exists('adminfoto/' . $user['foto'])): ?>
                                <img src="../adminfoto/<?= $user['foto'] ?>" alt="Foto User" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                            <?php else: ?>
                                <img src="<?= base_url('../img/undraw_profile_2.svg') ?>" alt="Foto User" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                            <?php endif; ?>
                        </td>
                        <td>
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning btn-sm" onclick="editUser(<?= $user['id'] ?>)">Edit</button>
                            <!-- Tombol Hapus -->
                            <a href="user/delete/<?= $user['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
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

                // Menampilkan foto pengguna jika ada
                if (data.foto) {
                    document.getElementById('currentPhoto').src = `/adminfoto/${data.foto}`;
                } else {
                    document.getElementById('currentPhoto').src = '<?= base_url('../img/undraw_profile_2.svg') ?>'; // Gambar default jika tidak ada
                }

                document.getElementById('userForm').action = `user/update/${id}`;
                document.getElementById('submitButton').textContent = 'Update';
            });
    };

    const resetForm = () => {
        document.getElementById('userForm').action = 'user/create';
        document.getElementById('userId').value = '';
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
        document.getElementById('role').value = '2';
        document.getElementById('submitButton').textContent = 'Simpan';
        document.getElementById('currentPhoto').src = '<?= base_url('../img/undraw_profile_2.svg') ?>'; // Reset foto ke default
    };

    document.getElementById('cancelButton').addEventListener('click', resetForm);
    document.getElementById('userForm').addEventListener('reset', resetForm);
</script>

<?= $this->endSection() ?>