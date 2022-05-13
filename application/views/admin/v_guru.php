<!-- Begin Page Content -->
<div class="container-fluid main-content">
    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Manajemen Data Sekolah
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Data Sekolah
            </p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <a class="btn btn-sm btn-success pull-right" href="<?= base_url() . 'admin/guru_tambah'; ?>"><i class="fa fa-plus"></i> Tambah guru</a>
            <br><br>
            <table id="sudo" class="table table-bordered table-striped table-hover tabledatatable">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <!-- <th>Mapel</th> -->
                        <th>Username</th>
                        <th>kode Guru</th>
                        <th>Nama Lengkap</th>
                        <th>hp</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th width="18%">Opsi</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($guru as $gr) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <!-- <td><?= $gr->Nama_mapel; ?></td> -->
                        <td><?= $gr->username; ?></td>
                        <td><?= $gr->kodeGuru; ?></td>
                        <td><?= $gr->nama_lengkap; ?></td>
                        <td><?= $gr->hp; ?></td>
                        <td><?= $gr->alamat; ?></td>
                        <td><?php
                                if ($gr->status == "Aktif") {
                                    echo "<span class='badge badge-success'>Aktif</span>";
                                } else if ($gr->status == "Tidak Aktif") {
                                    echo "<span class='badge badge-danger'>Non Aktif</span>";
                                }
                                ?></td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="<?= base_url() . 'admin/guru_edit/' . $gr->id_guru; ?>"><i class="fa fa-wrench"></i>Edit</a>
                            <a class="btn btn-sm btn-danger" href="<?= base_url() . 'admin/guru_hapus/' . $gr->id_guru; ?>"><i class="fa fa-trash"></i>Hapus</a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </table>
        </div>
    </div>
</div>


<!-- 
<script>
    var sl_ap = document.getElementById('sl_ap');
    var sh_cut = document.getElementById('shortcut');


    sl_ap.style.opacity = 0;
    sl_ap.style.visibility = "hidden";
    sl_ap.style.width = "0px";
    sl_ap.style.height = "1650px";
    sh_cut.style.height = "1650px";
    document.getElementById('main-content').style.width = "1200px";
    //document.getElementById('main-content').style.height="1000px";

    function showAdminProfil() {
        document.getElementById('main-content').style.width = "900px";
        document.getElementById('main-content').style.transition = "all 0.8s";
        sl_ap.style.width = "300px";
        sl_ap.style.opacity = 1;
        sh_cut.style.height = "1750px";
        sl_ap.style.visibility = "visible";
        sl_ap.style.transition = "all 0.8s";


    }

    function hideAdminProfil() {
        sl_ap.style.opacity = 0;
        sl_ap.style.visibility = "hidden";
        sl_ap.style.width = "0px";
        sl_ap.style.height = "1650px";
        sh_cut.style.height = "1650px";
        document.getElementById('main-content').style.width = "1200px";
        //document.getElementById('main-content').style.height="1000px";
    }
</script> -->