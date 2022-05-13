<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Muhammad Nurwibawanto 2019</span>
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('admin/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-3.4.1.min.js'; ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#sudo').DataTable();
    });
</script>
<!-- JS DATATABLES -->
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/Bootstrap-4-4.1.1/js/bootstrap.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/FixedColumns-3.2.5/js/dataTables.fixedColumns.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/Responsive-2.2.2/js/responsive.bootstrap4.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/Buttons-1.5.6/js/buttons.html5.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/Buttons-1.5.6/js/buttons.print.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/Select-1.3.0/js/dataTables.select.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/JSZip-2.5.0/jszip.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/pdfmake-0.1.36/pdfmake.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/pdfmake-0.1.36/vfs_fonts.js'; ?>"></script>
<!-- JS Bootstrap -->
<!-- <script type="text/javascript" src="<?php //base_url().'assets/js/popper.js' ;
                                            ?>"></script> -->
<script type="text/javascript" src="<?= base_url() . 'assets/js/bootstrap.js'; ?>"></script>
<script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
</body>

</html>