<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap4-toggle.min.css') ;?>">
<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
  .toggle.ios .toggle-handle { border-radius: 20rem; }
</style>
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
            <div id="siswaView">
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
                            <th>Status Keuangan</th>
                        </tr>
                    </thead>
                    <?php $no = 1;
                    foreach ($siswa as $sis) :
                        $kelas = $this->db->query("SELECT * FROM kelas WHERE kodeKelas = '$sis->kodeKelas'")->row();
                        $jurusan = $this->db->query("SELECT * FROM jurusan WHERE idJurusan = $sis->idJurusan")->row();
                        $d = date_create($sis->tanggalLahir);
                        $dat = date_format($d, "d-m-Y");
                        $file = base_url() . 'gambar/siswa/' . $sis->fotoSiswa;
                        ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?php if(!$kelas->Nama_kelas){
                                echo "";
                            }else{
                                echo $kelas->Nama_kelas;
                            } ?></td>
                            <td>
                            
                            </td>
                            <td><?= $sis->nis; ?></td>
                            <td><?= $sis->nama_siswa; ?></td>
                            <td><?php echo "$sis->tempatLahir,$dat"; ?></td>
                            <td><?= $jurusan->Nama; ?></td>
                            <td>
                                <?php
                                    if ($sis->status_siswa == "Aktif") {
                                        echo "<span class='badge badge-success'>Aktif</span>";
                                    } else if ($sis->status_siswa == "Tidak Aktif") {
                                        echo "<span class='badge badge-danger'>Non Aktif</span>";
                                    }
                                    ?>
                            </td>
                            <td>
                            <?php 
                            if($sis->keuangan == "tidak"){ 
                            ?>
                                <form id="active" method="POST" action="<?= base_url('admin/siswaKeuangan'); ?>">
                                    <input type="hidden" id="nis" name="nis" value="<?= $sis->nis; ?>">
                                    <input type="hidden" id="checkeds" name="checkeds" value="ya">
                                <button type="submit" id="aktifin" class="btn btn-xs btn-success" >Inactive</button>
                                </form>
                                
                            <?php 
                            }else{
                                ?>
                               <form id="inacitve" method="POST" action="<?= base_url('admin/siswaKeuangan'); ?>">
                                    <input type="hidden" id="nis" name="nis" value="<?= $sis->nis; ?>">
                                    <input type="hidden" id="checkeds" name="checkeds" value="tidak">
                                <button  type="submit" id="nonaktifin" class="btn btn-xs btn-danger" >Active</button>
                                </form>
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/bootstrap4-toggle.min.js');?>"></script>