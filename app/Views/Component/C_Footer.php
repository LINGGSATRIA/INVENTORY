</div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-gradient-light shadow-sm">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">

            <span class="text-secondary font-weight-bold">Copyright &copy; SISTEM INFORMASI SUKU CADANG LEOPARD <?= date('Y') ?></span>
           <!-- <span>Copyright &copy; SISFO SUCAD LEO</span>
<!-- >>>>>>> 74bc8ff0ea77bd1c51e8c9090c3c11f3868c962c --> 
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-gradient-light border-bottom-0">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Konfirmasi Keluar</h5>
                <button class="close hover-scale" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-primary">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center mb-0">Apakah Anda yakin ingin keluar dari sistem?</p>
            </div>
            <div class="modal-footer border-top-0">
                <button class="btn btn-light hover-scale px-4" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-success hover-scale px-4" href="<?= base_url('logout') ?>">Ya, Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Core Scripts -->
<script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>
<script src="<?= base_url('js/ranpur.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

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
});
</script>

</body>
</html>