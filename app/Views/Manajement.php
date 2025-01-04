<?= $this->extend('Component/C_Template') ?>
<?= $this->section('konten') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manajemen User</h1>

    <!-- Form Create/Update -->
    <form id="userForm" action="user/create" method="POST">
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
            <input type="password" class="form-control" id="password" name="password" required>
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
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning btn-sm" onclick="editUser(<?= $user['id'] ?>)">Edit</button>
                            <!-- Tombol Hapus -->
                            <a href="user/delete/<?= $user['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
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
    };

    document.getElementById('cancelButton').addEventListener('click', resetForm);
    document.getElementById('userForm').addEventListener('reset', resetForm);
</script>

<?= $this->endSection() ?>