<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Setting Exam
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Pilih Menu
            </p>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-responsive table-striped table-bordered" style="max-width:900px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Soal</th>
                        <th>Kode Mapel</th>
                        <th>Tingkatan</th>
                        <th>Jurusan</th>
                        <th>Jumlah PG</th>
                        <th>Jumlah Esai</th>
                        <th>Nama Guru</th>
                        <th>Tahun Ajaran</th>
                        <th>Tanggal Buat</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($paket as $pkt) {
                        $guru = $this->db->query("SELECT nama_lengkap FROM guru WHERE kodeGuru='$pkt->kodeGuru'")->row();
                        $Jumlah = $this->db->query("SELECT * FROM soal WHERE kodeGuru='$pkt->kodeGuru' AND codeSoal='$pkt->codeSoal' AND kodeMapel='$pkt->kodeMapel' AND Jurusan='$pkt->Jurusan' AND jenis_soal=1")->num_rows();
                        $Jumlah2 = $this->db->query("SELECT * FROM soal WHERE kodeGuru='$pkt->kodeGuru' AND codeSoal='$pkt->codeSoal' AND kodeMapel='$pkt->kodeMapel' AND Jurusan='$pkt->Jurusan' AND jenis_soal=2")->num_rows();
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pkt->codeSoal; ?></td>
                            <td><?= $pkt->kodeMapel; ?></td>
                            <td><?= $pkt->Tingkatan; ?></td>
                            <td><?= $pkt->Jurusan; ?></td>
                            <td><?= $pkt->JPilihan; ?>(<?= $Jumlah; ?>)</td>
                            <td><?= $pkt->JEsai; ?>(<?= $Jumlah2; ?>)</td>
                            <td><?= $guru->nama_lengkap; ?></td>
                            <td><?= $pkt->tahunAjaran; ?></td>
                            <td><?= $pkt->tglBuat; ?></td>
                            <td><?= $pkt->status; ?></td>
                            <td>

                                <a class="btn btn-info" href="<?= base_url() . 'admin/set/' . $pkt->idPaketSoal; ?>"><i class="fas fa-fw fa-clock"></i></a>

                                <a class="btn btn-danger" href="<?= base_url() . 'admin/paketoff/' . $pkt->idPaketSoal; ?>"><i class="fas fa-fw fa-power-off"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Soal</th>
                        <th>Kode Mapel</th>
                        <th>Tingkatan</th>
                        <th>Jurusan</th>
                        <th>Jumlah PG</th>
                        <th>Jumlah Esai</th>
                        <th>Nama Guru</th>
                        <th>Tahun Ajaran</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ]
        });
    });
</script>
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

<!-- JS DATATABLES -->
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/Bootstrap-4-4.1.1/js/bootstrap.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/FixedColumns-3.2.5/js/dataTables.fixedColumns.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/DataTables/Responsive-2.2.2/js/responsive.bootstrap4.min.js'; ?>"></script>
<!-- JS Bootstrap -->
<!-- <script type="text/javascript" src="<?php //base_url().'assets/js/popper.js' ;
                                            ?>"></script> -->
<script type="text/javascript" src="<?= base_url() . 'assets/js/bootstrap.js'; ?>"></script>
<script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
</body>

</html>