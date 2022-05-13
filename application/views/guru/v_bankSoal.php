<div class="container-fluid">
    <center>
        <h3>BANK SOAL SMK DARMAWAN</h3>
    </center>
    <div class="card">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button id="create" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pen fa-fw"> </i>
                Create Bank Soal
            </button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewMapel"><i class="fas fa-eye fa-fw"> </i>
                Kode Mapel</button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewGuru"><i class="fas fa-eye fa-fw"> </i>
                Kode Guru</button>

            <!-- Modal Create Bank -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Membuat Bank Soal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formInsert" action="<?= base_url() . 'guru/bankAksi'; ?>" method="post">
                                <input type="hidden" name="kodeGuru" id="kodeGuru" value="<?= $this->session->userdata('kode'); ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="codeSoal">Kode Soal</label>
                                            <input class="form-control" type="text" name="codeSoal" id="codeSoal" autocomplete="off" required>
                                            <p id="notif-code"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="codeMapel">Kode mapel</label>
                                            <!-- <input class="form-control" type="text" name="codeMapel" id="codeMapel"> -->
                                            <select class="form-control" name="codeMapel" id="codeMapel" required>
                                                <option value="">Nama Mapel</option>
                                                <?php
                                                foreach ($mapel as $kmpl) {
                                                    echo "
                                                    <option value=" . $kmpl->kodeMapel . ">" . $kmpl->Nama_mapel . "</option>
                                                    ";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="Tingkatan">Tingkatan Kelas</label>
                                            <select class="form-control" name="Tingkatan" id="Tingkatan" required>
                                                <option value="">Pilih Tingkatan</option>
                                                <option value="All">All</option>
                                                <option value="X">Kelas X</option>
                                                <option value="XI">Kelas XI</option>
                                                <option value="XII">Kelas XII</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="jurusan">Jurusan</label>
                                            <select class="form-control" name="jurusan" id="jurusan">
                                                <option value="ALL">ALL</option>
                                                <?php foreach ($Jurusan as $JS) { ?>
                                                    <option value="<?= $JS->Nama; ?>"><?= $JS->Alias; ?></option>
                                                <?php  } ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="JumPG">Jumlah PG</label>
                                            <input class="form-control" type="number" name="JumPG" required id="JumPG">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="JumEsai">Jumlah Esai</label>
                                            <input class="form-control" type="number" name="JumEsai" required id="JumEsai">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="bobotPG">Bobot PG</label>
                                            <input class="form-control" type="text" name="bobotPG" required id="bobotPG">
                                            <p>Gunakan (' . ') Untuk Angka Koma</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="bobotEsai">Bobot Esai</label>
                                            <input class="form-control" type="number" name="bobotEsai" required id="bobotEsai">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="persenPG">Persen PG</label>
                                            <input class="form-control persenPG" type="number" name="persenPG" required id="persenPG">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="persenEsai">Persen Esai</label>
                                            <input class="form-control persenEsai" type="number" name="persenEsai" required id="persenEsai">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="tahunAjaran">Tahun Ajaran</label>
                                    <input class="form-control" type="text" name="tahunAjaran" required id="tahunAjaran">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="Agama">Agama</label>
                                    <select class="form-control" name="Agama" required id="Agama">
                                        <option value="ALL">ALL</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Kong Hu Cu">Kong Hu Cu</option>
                                    </select>
                                </div>
                                <!-- Batas Div Container From -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="insertBank" type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Bank Soal</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Mapel -->
        <div class="modal fade" id="viewMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">kode Mata Pelajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">

                            <table id="mapel" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kode Mapel</th>
                                        <th>Mata Pelajaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($mapel as $mpl) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $mpl->kodeMapel; ?></td>
                                            <td><?= $mpl->Nama_mapel; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p>Note : Copy paste aja codenya kalo perlu catet dulu agar kaga ribet liat liat truss</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-2">
            <table id="sudo" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Soal</th>
                        <th>Kode Mapel</th>
                        <th>Tingkatan</th>
                        <th>Jurusan</th>
                        <th>Jumlah PG</th>
                        <th>Jumlah Esai</th>
                        <th>Status</th>
                        <th>Tahun Ajaran</th>
                        <th width="25%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($paket as $pkt) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pkt->codeSoal; ?></td>
                            <td><?= $pkt->kodeMapel; ?></td>
                            <td><?= $pkt->Tingkatan; ?></td>
                            <td><?= $pkt->Jurusan; ?></td>
                            <td><?= $pkt->JPilihan; ?></td>
                            <td><?= $pkt->JEsai; ?></td>
                            <td><?= $pkt->status; ?></td>
                            <td><?= $pkt->tahunAjaran; ?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="<?= base_url() . 'guru/soal/' . $pkt->idPaketSoal; ?>"><i class="fa fa-paper-plane"></i></a>
                                <a class="editPaket btn btn-sm btn-warning" data-toggle="modal" data-Jurusan="<?= $pkt->Jurusan; ?>" data-Tingkatan="<?= $pkt->Tingkatan; ?>" data-kodeMapel="<?= $pkt->kodeMapel; ?>" data-codeSoal="<?= $pkt->codeSoal; ?>" data-id="<?= $pkt->idPaketSoal; ?>"><i class="fa fa-wrench"></i></a>
                                <a class="btn btn-sm btn-danger tombol-hapus" href="<?= base_url() . 'guru/hapusBank/' . $pkt->idPaketSoal; ?>"><i class="fa fa-trash"></i></a>
                                <a class="btn btn-sm btn-info" href="<?= base_url() . 'guru/previewPG/'. $pkt->idPaketSoal.'/1'; ?>"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-success disabled" href="<?= base_url() . 'guru/' ?>"><i class="fa fa-print"></i> </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Modal View Guru-->
<div class="modal fade" id="viewGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Kode Guru Anda :</h4><br>
                <h2><?= $this->session->userdata('kode') ?></h2>
            </div>
        </div>
    </div>
</div>
<!-- Modal Update-->
<div class="modal fade" id="dataEditBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Bank Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                ?>
                <form action="<?= base_url() . 'guru/editBank'; ?>" method="post">
                    <input type="hidden" name="idPaket" id="idPaket" class="idPaket">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="codeSoal">Kode Soal</label>
                                <input class="form-control editcodeSoal" type="text" name="codeSoal" id="codeSoal">
                                <input class="form-control oldcodeSoal" type="hidden" name="oldcodeSoal" id="oldcodeSoal">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="codeMapel">Kode mapel</label>
                                <input class="form-control editkodeMapel" type="text" name="codeMapel" id="codeMapel" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="Tingkatan">Tingkatan Kelas</label>
                                <select class="form-control tingkatan" name="Tingkatan" id="TingkatanE">
                                    <option value="">Pilih Tingkatan</option>
                                    <option value="All" id="All">All</option>
                                    <option value="X" id="X">Kelas X</option>
                                    <option value="XI" id="XI">Kelas XI</option>
                                    <option value="XII" id="XII">Kelas XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="jurusan">Jurusan</label>
                                <select class="form-control jurusan" name="jurusan" id="jurusanE">
                                    <?php foreach ($Jurusan as $Jrs) { ?>
                                        <option value="<?= $Jrs->Nama; ?>" id="<?= $Jrs->Nama; ?>"><?= $Jrs->Alias; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="JumPG">Jumlah PG</label>
                                <input class="form-control jumpg" type="number" name="JumPG" id="JumPG">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="JumEsai">Jumlah Esai</label>
                                <input class="form-control jumesai" type="number" name="JumEsai" id="JumEsai">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="bobotPG">Bobot PG</label>
                                <input class="form-control bobotpg" type="text" name="bobotPG" id="bobotPG">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="bobotEsai">Bobot Esai</label>
                                <input class="form-control bobotesai" type="number" name="bobotEsai" id="bobotEsai">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="persenPG">Persen PG</label>
                                <input class="form-control persenPG" type="number" name="persenPG" id="persenPG">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="persenEsai">Persen Esai</label>
                                <input class="form-control persenEsai" type="number" name="persenEsai" id="persenEsai">
                            </div>
                        </div>
                    </div>
                    <p>Persen harus menghasilkan 100 </p>
                    <div class="form-group">
                        <label class="font-weight-bold" for="tahunAjaran">Tahun Ajaran</label>
                        <input class="form-control tahunAjar" type="text" name="tahunAjaran" id="tahunAjaran">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="Agama">Agama</label>
                        <select class="form-control" name="Agama" id="AgamaE">
                            <option id="ALL" value="ALL">ALL</option>
                            <option id="Islam" value="Islam">Islam</option>
                            <option id="Kristen" value="Kristen">Kristen</option>
                            <option id="Budha" value="Budha">Budha</option>
                            <option id="Hindu" value="Hindu">Hindu</option>
                            <option id="Kong Hu Cu" value="Kong Hu Cu">Kong Hu Cu</option>
                        </select>
                    </div>
                    <!-- Batas Div Container From -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#sudo').DataTable({
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
        $('#mapel').DataTable({
            "lengthMenu": [
                [100, -1],
                [100, "All"]
            ]
        });
    });
</script>

<script>
    $('#create').on('click', function() {
        $('#formInsert').ready(function() {
            $('#codeSoal').on("keyup", function() {
                var codeSoal = $('#codeSoal').val();

                $.ajax({
                    type: "POST",
                    url: "<?= base_url() . 'guru/cekCodeSoal' ?>",
                    dataType: "JSON",
                    data: {
                        codeSoal: codeSoal
                    },
                }).done(function(data) {
                    if (data != "NULL") {
                        document.getElementById('notif-code').innerHTML = "MAAF DATA SUDAH ADA";
                        document.getElementById('notif-code').style.color = "RED";
                        document.getElementById('notif-code').style.fontSize = "9pt";
                    } else {
                        document.getElementById('notif-code').innerHTML = "";
                    }
                });
            });
        });
    });

    $(".editPaket").on("click", function() {
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "<?= base_url() . 'guru/editBankSoal' ?>",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                $(".idPaket").val(data["idPaketSoal"]);
                $(".editcodeSoal").val(data["codeSoal"]);
                $(".oldcodeSoal").val(data["codeSoal"]);
                $(".editkodeMapel").val(data["kodeMapel"]);
                var tingkatan = data["Tingkatan"];
                var x = document.getElementById("TingkatanE").length;
                for (i = 0; i < x; i++) {
                    var w = document.getElementById("TingkatanE").options[i].value;
                    if (w === tingkatan) {
                        document.getElementById(tingkatan).selected = true;
                    }
                }
                var jurusan = data["Jurusan"];
                var jumlahJurusan = document.getElementById("jurusanE").length;
                for (JU = 0; JU < jumlahJurusan; JU++) {
                    var Jurusan = document.getElementById("jurusanE").options[JU].value;
                    if (Jurusan == jurusan) {
                        document.getElementById(jurusan).selected = true;
                    }
                }
                $(".jumpg").val(data["JPilihan"]);
                $(".jumesai").val(data["JEsai"]);
                $(".bobotpg").val(data["bobotpg"]);
                $(".bobotesai").val(data["bobotesai"]);
                $(".persenPG").val(data["persenPg"]);
                $(".persenEsai").val(data["persenEsai"]);
                $(".tahunAjar").val(data["tahunAjaran"]);
                var agama = data["Agama"];
                var Ag = document.getElementById("AgamaE").length;
                for (AG = 0; AG < Ag; AG++) {
                    var Agama = document.getElementById("AgamaE").options[AG].value;
                    if (Agama === agama) {
                        document.getElementById(agama).selected = true;
                    }
                }
            }
        }).done(function() {
            $("#dataEditBank").modal("show");
        })
    })
    $('.persenPG .persenEsai').on("keyup", function() {
        var x = $('.persenPG').val();
        var y = $('.persenEsai').val();
        var toT = parseInt(x) + parseInt(y);
        var cek = document.getElementsByClassName('persenPG');
        var ceke = document.getElementsByClassName('persenEsai');
        if (toT > 100) {
            cek[0].style.background = "red";
            cek[0].style.opacity = 0.9;
            cek[0].style.color = "white";
            ceke[0].style.background = "red";
            ceke[0].style.opacity = 0.9;
            ceke[0].style.color = "white";

        } else if (toT == 100) {
            cek[0].style.background = "Green";
            cek[0].style.opacity = 0.9;
            cek[0].style.color = "white";
            ceke[0].style.background = "Green";
            ceke[0].style.opacity = 0.9;
            ceke[0].style.color = "white";
        } else {
            cek[0].style.background = "Blue";
            cek[0].style.opacity = 0.9;
            cek[0].style.color = "white";
            ceke[0].style.background = "Blue";
            ceke[0].style.opacity = 0.9;
            ceke[0].style.color = "white";
        }
    });
    $('.persenEsai').on("keyup", function() {
        var x = $('.persenPG').val();
        var y = $('.persenEsai').val();
        var toT = parseInt(x) + parseInt(y);
        console.log(toT);
        if (toT > 100) {
            var cek = document.getElementsByClassName('persenPG');
            var ceke = document.getElementsByClassName('persenEsai');
            cek[0].style.background = "red";
            cek[0].style.opacity = 0.9;
            cek[0].style.color = "white";
            ceke[0].style.background = "red";
            ceke[0].style.opacity = 0.9;
            ceke[0].style.color = "white";

        }
    });
</script>
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
<!-- Sweet Alert -->
<script src="<?= base_url() . 'assets/sweetJs/sweetalert2.all.min.js' ?>"></script>
<!-- JS Bootstrap -->

<script type="text/javascript" src="<?= base_url() . 'assets/js/popper.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/bootstrap.js'; ?>"></script>

<script src="<?= base_url() . 'assets/js/jsku.js' ?>"></script>
</body>

</html>