<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Manajemen Data Siswa
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Data Siswa
            </p>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <h4>Daftar Nama Siswa</h4>
        </div>
        <br><br>
        <div class="card-body">
            <a href="<?= base_url() . 'admin/siswa'; ?>" class="btn btn-outline-dark pull-left"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br><br>
            <table id="sudo" class="table table-bordered table-striped table-hover tabledatatable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Kelas</th>
                        <th>Foto Siswa</th>
                        <th>Nomor NIS</th>
                        <th>Nama Siswa</th>
                        <th>TTL</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                        <th style="width: 25%;">Opsi</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($siswa as $sis) :
                    $kelas = $this->db->query("SELECT * FROM kelas WHERE idkelas = $sis->idkelas")->row();
                    $jurusan = $this->db->query("SELECT * FROM jurusan WHERE idJurusan = $sis->idJurusan")->row();
                    $d = date_create($sis->tanggalLahir);
                    $dat = date_format($d, "d-m-Y");
                    ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $kelas->Nama_kelas; ?></td>
                        <td><img src="<?= base_url() . 'gambar/siswa/' . $sis->fotoSiswa; ?>" alt="" width="60px"></td>
                        <td><?= $sis->nis; ?></td>
                        <td><?= $sis->nama_siswa; ?></td>
                        <td><?php echo "$sis->tempatLahir,$dat"; ?></td>
                        <td><?= $jurusan->Nama; ?></td>
                        <td><?php
                                if ($sis->status_siswa == "Aktif") {
                                    echo "<span class='badge badge-success'>Aktif</span>";
                                } else if ($sis->status_siswa == "Tidak Aktif") {
                                    echo "<span class='badge badge-danger'>Non Aktif</span>";
                                }
                                ?></td>
                        <td>
                            <a class="btn btn-warning" href="<?= base_url() . 'admin/siswa_edit/' . $sis->idsiswa; ?>"><i class="fa fa-wrench"></i>Edit</a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </table>
        </div>
    </div>
</div>