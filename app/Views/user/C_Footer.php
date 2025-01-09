</div>

<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-gradient-light shadow-sm">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span class="text-primary font-weight-bold">Copyright &copy; Sistem Informasi Suku Cadang Leopard <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded-circle shadow-lg hover-scale" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- edit modal -->
<!-- Modal Edit Profile -->
<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-gradient-light border-bottom-0">
                <h5 class="modal-title text-primary font-weight-bold" id="editUserLabel">Edit Profile</h5>
                <button type="button" class="close hover-scale" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-primary">&times;</span>
                </button>
            </div>
            <form id="userForm" action="<?= base_url('user/update/'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="userId" name="userId">
                    <!-- Menampilkan Foto yang Sudah Ada (Jika Ada) -->
                    <div class="form-group d-flex justify-content-center">
                        <img id="currentPhoto" src="<?= base_url('../img/undraw_profile_2.svg') ?>" alt="Current Photo" class="img-thumbnail shadow-sm" style="max-width: 150px; max-height: 150px; border-radius: 12px;">
                    </div>
                    <!-- Input Foto -->
                    <div class="form-group">
                        <label for="foto" class="text-primary font-weight-bold">Foto</label>
                        <input type="file" class="form-control-file border rounded p-1" id="foto" name="foto" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="name" class="text-primary font-weight-bold">Nama</label>
                        <input type="text" class="form-control rounded-lg" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-primary font-weight-bold">Email</label>
                        <input type="email" class="form-control rounded-lg" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-primary font-weight-bold">Password</label>
                        <input type="password" class="form-control rounded-lg" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="role" class="text-primary font-weight-bold">Role</label>
                        <select class="form-control rounded-lg" id="role" name="role" required>
                            <option value="2">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-light hover-scale px-4" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary hover-scale px-4" id="submitButton">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-gradient-light border-bottom-0">
                <h5 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Konfirmasi Keluar</h5>
                <button class="close hover-scale" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-primary">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-0">Apakah Anda yakin ingin keluar dari sistem?</p>
            </div>
            <div class="modal-footer border-top-0">
                <button class="btn btn-light hover-scale px-4" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary hover-scale px-4" href="<?= base_url('logout') ?>">Ya, Keluar</a>
            </div>
        </div>
    </div>
</div>

<script>
    const editUser = () => {
        // Mengambil ID pengguna dari session
        const userId = <?= session()->get('user_id') ?>; 

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
                    document.getElementById('currentPhoto').src = '<?= base_url('../img/undraw_profile_2.svg') ?>'; 
                }

                document.getElementById('userForm').action = `update/${userId}`;
                document.getElementById('submitButton').textContent = 'Update';
            });
    };
</script>

<!-- Core Scripts -->
<script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>
<script src="<?= base_url('js/ranpur.js') ?>"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Additional Scripts -->
<script>
$(document).ready(function() {
    // Add smooth scrolling
    $('a.scroll-to-top').on('click', function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 800);
    });
    
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Add hover effects
    $('.hover-scale').hover(
        function() { $(this).css('transform', 'scale(1.05)'); },
        function() { $(this).css('transform', 'scale(1)'); }
    );
});
</script>

</body>
</html>