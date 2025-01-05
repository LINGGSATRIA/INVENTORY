</div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SILEO</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- edit modal -->
<!-- Modal Edit Profile -->
<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="userForm" action="<?= base_url('user/update'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="userId" name="userId">
                    <!-- Menampilkan Foto yang Sudah Ada (Jika Ada) -->
                    <div class="form-group d-flex justify-content-center">
                        <img id="currentPhoto" src="<?= base_url('../img/undraw_profile_2.svg') ?>" alt="Current Photo" style="max-width: 150px; max-height: 150px; border-radius: 8px;">
                    </div>
                    <!-- Input Foto -->
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    </div>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="submitButton">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Silakan Pilih "Ya" Jika Yakin Ingin Keluar</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('logout') ?>">Ya</a>
            </div>
        </div>
    </div>
</div>
<script>
    const editUser = () => {
        // Mengambil ID pengguna dari session
        const userId = <?= session()->get('user_id') ?>; // Ambil ID pengguna dari session PHP

        fetch(`user/edit/${userId}`)
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
</script>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('vendor/'); ?>jquery/jquery.min.js"></script>
<script src="<?= base_url('vendor/'); ?>bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('vendor/'); ?>jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('js/'); ?>sb-admin-2.min.js"></script>
<script src="<?= base_url('js/'); ?>ranpur.js"></script>
<!-- DataTables JavaScript and Initialization -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Tambahkan jQuery dan Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



</body>

</html>