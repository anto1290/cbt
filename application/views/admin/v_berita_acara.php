<!-- Begin Page Content -->
<div class="container-fluid main-content">
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Manajemen Data Sekolah
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Berita Acara
            </p>
        </div>
    </div>
    <br>
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="text-center">Daftar Berita Acara</h4>
        </div>
        <div class="card-body">
            <a class="btn btn-sm btn-success pull-right" href="<?= base_url() . 'admin/tambah_berita'; ?>"><i class="fa fa-plus"></i> Tambah Berita</a>
            <br>
            <br>
            <table id="sudo" class="table table-bordered table-striped table-hover tabledatatable">
                <thead>
                    <tr>
                        <th>
                            <center>No</center>
                        </th>
                        <th>
                            <center>Jenis Ujian</center>
                        </th>
                        <th>
                            <center>Pengawas 1</center>
                        </th>
                        <th>
                            <center>Pengawas 2</center>
                        </th>
                        <th>
                            <center>Tanggal Ujian</center>
                        </th>
                        <th>
                            <center>Opsi</center>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($berita as $brt) :
                        $tg = date_create($brt->tglBerita);
                        $tgl = date_format($tg, "d/m/Y");

                        ?>
                        <tr>
                            <td>
                                <center><?= $no++; ?></center>
                            </td>
                            <td>
                                <center><?= $brt->jenisUjian; ?></center>
                            </td>
                            <td>
                                <center><?= $brt->pengawas1; ?></center>
                            </td>
                            <td>
                                <center><?= $brt->pengawas2; ?></center>
                            </td>
                            <td>
                                <center><?= $tgl; ?></center>
                            </td>
                            <td>
                                <center>
                                    <a href="<?= base_url() . 'Cetakpdf/Cetakberita/' . $brt->idBerita; ?>" target="blank" class="btn btn-danger"><i class="fa fa-print"></i>Print</a>
                                </center>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>