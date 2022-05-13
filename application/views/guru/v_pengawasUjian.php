<link href="<?= base_url() . 'assets/datepicker/'; ?>dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() . 'assets/datepicker/'; ?>dist/js/datepicker.min.js"></script>
<!-- date time picker -->
<link href="<?= base_url() . 'assets/datetimepicker/'; ?>jquery.datetimepicker.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() . 'assets/datetimepicker/'; ?>jquery.js"></script>
<script src="<?= base_url() . 'assets/datetimepicker/'; ?>build/jquery.datetimepicker.full.min.js"></script>

<div class="container-fluid">
    <div class="header row">
        <div class="col-md-12">
            <h2 class="header-tittle  animated infinity bounceInDown ">
                Pengawas Ujian
            </h2>
            <h6 class="sub-header-tittle  animated infinity bounceInDown ">
                Administrasi Ujian Pengawas
            </h6>
        </div>
    </div>
    <br>
    <div class="col-md-12">
        <?php
        $mapel = $this->db->query("SELECT * FROM mapel WHERE kodeMapel ='$pawas->kodeMapel'")->row();
        $berita = $this->db->query("SELECT * FROM beritaacara WHERE idpengawas = '$pawas->idpengawas' AND nama_mapel = '$mapel->Nama_mapel'");
        if ($berita->num_rows() > 0) {
            $id = $berita->row();
            ?>
            <button class="btn btn-success disabled"><i class="fas fa-plus"></i> Berita Acara</button>
            <a class="btn btn-info" href="<?= base_url() . 'Cetakpdf/Cetakberita/' . $id->idBerita; ?>" taget="blank"><i class="fas fa-eye"></i> View</a>
        <?php } else { ?>

            <button id="tom" class="btn btn-success"><i class="fas fa-plus"></i> Berita Acara</button>
        <?php } ?>

        <br>
        <br>
        <table id="pengawas_ujian" class="table table-hover table-primary" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Mapel</th>
                    <th>code</th>
                    <th>status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="berita" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Buat Berita Acara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form id="beritaAcara" action="<?= base_url() . 'guru/aksiberita' ?>" method="post">
                        <?php foreach ($test as $tt) { ?>
                            <input type="hidden" name="mapel" id="mapel" value="<?= $tt->Nama_mapel ?>">
                            <input type="hidden" name="idpengawas" id="idpengawas" value="<?= $pawas->idpengawas ?>">
                            
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_uji" class="font-weight-bold">Jenis Ujian</label>
                                    <select name="jenis_uji" id="jenis_uji" class="form-control">
                                        <option value="">Pilih Jenis Ujian</option>
                                        <?php foreach ($uji as $U) { ?>
                                            <option value="<?= $U->namaTes ?>"><?= $U->namaTes ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ruang" class="font-weight-bold">Ruang Ujian</label>
                                    <input type="text" class="form-control" name="ruang" id="ruang" value="<?= $Ruang->nama_ruang; ?>" readonly>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Akhir row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pengawas1" class="font-weight-bold">Pengawas 1</label>
                                    <input type="text" class="form-control" name="pengawas1" id="pengawas1" value="<?= $guru1->nama_lengkap; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Pengawas2" class="font-weight-bold">Pengawas 2</label>
                                    <select name="Pengawas2" id="Pengawas2" class="form-control">
                                        <option value="">Pilih</option>
                                        <?php foreach ($guru2 as $gr2) { ?>
                                            <option value="<?= $gr2->nama_lengkap ?>"><?= $gr2->nama_lengkap ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir row -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="siswa" class="font-weight-bold">Jumlah Siswa</label>
                                    <input type="number" name="siswa" id="siswa" class="form-control" value="<?= $jumlahSiswaTotal->kls; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="siswaH" class="font-weight-bold">Siswa Hadir</label>
                                    <input type="number" name="siswaH" id="siswaH" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tsiswa" class="font-weight-bold">Siswa Tidak Hadir</label>
                                    <input type="number" name="tsiswa" id="tsiswa" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Row -->
                        <div class="row">
                            <div class="col-md-12">
                                <label for="namaTH" class="font-weight-bold">NIS Tidak Hadir</label>
                                <textarea name="namaTH" id="namaTH" cols="20" rows="5" class="form-control"></textarea>
                                <p>Masukan Nisnya jika tidak hadir</p>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row">
                            <div class="col-md-3">
                                <label for="waktuM" class="font-weight-bold">Waktu Mulai</label>
                                <input type="text" id="waktuM" name="waktuM" class="form-control datetimepicker2" value="<?= $waktu->jamMulai; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="waktuA" class="font-weight-bold">Waktu Akhir</label>
                                <input type="text" id="waktuA" name="waktuA" class="form-control datetimepicker2" value="<?= $waktu->batasMasuk; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="tahunP" class="font-weight-bold">Tahun Pelajaran</label>
                                <input type="text" id="tahunP" name="tahunP" class="form-control"  value="<?= $waktu->tahunAjaran ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="codeSoal" class="font-weight-bold">Kode Soal</label>
                                <input type="text" id="codeSoal" name="codeSoal" class="form-control" value="<?= $pawas->codeSoal; ?>" readonly>
                            </div>
                        </div>
                        <!-- akhir row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="catatan" class="font-weight-bold">Catatan Selama Ujian </label>
                                    <textarea name="catatan" id="catatan" cols="10" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary askiBerita">Save changes</button>
            </div>
        </div>
    </div>
    </div>
<script src="<?= base_url() . 'assets/sweetJs/sweetalert2.all.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/js/jsku.js' ?>"></script>
    <script>
        $(document).ready(function() {

           let pengawasUjian =  $('#pengawas_ujian').DataTable({
                "lengthMenu": [
                    [ 10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "processing": true,
                ajax: {
                    url: `<?= base_url('guru/pengawasAjax/'.$this->session->userdata('kode')) ?>`,
                    type: 'GET',
                    dataSrc: function (data) {
                        var return_data = new Array();
                        for (let i = 0; i < data.length; i++) {
                            let statusFinish = '';
                            if(data[i]['nilai'] > 0){
                                statusFinish = `<span class="badge badge-success">Selesai</span>`;
                            }else{
                                statusFinish =`<span class="badge badge-secondary">Sedang Dikerjakan</span>`;
                            }
                            
                            return_data.push({
                                'nomor': i + 1,
                                'nis': data[i]['ujian'].nis,
                                'idSiswaUjian': data[i]['ujian'].idSiswaUjian,
                                'nama': data[i]['ujian'].nama_siswa,
                                'kelas': data[i]['ujian'].Nama_kelas,
                                'mapel': data[i]['ujian'].Nama_mapel,
                                'codeSoal': data[i]['ujian'].codeSoal,
                                'statusFinish': statusFinish,
                    
                            })
                        }
                        return return_data;
                    }
                },
                columns: [
                    { 'data': 'nomor' },
                    { 'data': 'nis' },
                    { 'data': 'nama' },
                    { 'data': 'kelas' },
                    { 'data': 'mapel' },
                    { 'data': 'codeSoal' },
                    { 'data': 'statusFinish' },
                    {
                        "orderable": false,
                        "data": null,
                        "defaultContent": ` 
                        <button id="restart" type="button" class="btn btn-success"><i class="fa fa-history"></i></button> | 
                        <button id="keluar-siswa" type="button" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i></button`
                    }
                    
                ],
            });
           setInterval(function(){ 
            pengawasUjian.ajax.reload() 
            }, 5000);
                // Keluar siswa
            $('#pengawas_ujian tbody').on('click', '#keluar-siswa', function () {
                    var dataUjian = pengawasUjian.row($(this).parents('tr')).data();
                    let id = dataUjian.idSiswaUjian;
                    Swal.fire({
                        title: 'Apakah Yakin Untuk Megeluarkan ?',
                        text: "Siswa Akan dikeluarkan",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtomText: 'Ya'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: "GET",
                                url: `<?= base_url();?>guru/aksiKeluar/${id}`,
                                statusCode: {
                                    403: function () {
                                        Swal.fire(
                                            'Oops!',
                                            'Your Account Is Not Perminssion This Feature.',
                                            'error'
                                        )
                                    }
                                }
                            }).done(function () {
                                Swal.fire(
                                    'Account has been kick, success!',
                                    'success'
                                )
                            }).always(function () {
                                pengawasUjian.ajax.reload();
                            });
                        }
                    })
            });// Restart siswa
            $('#pengawas_ujian tbody').on('click', '#restart', function () {
                    var dataUjian = pengawasUjian.row($(this).parents('tr')).data();
                    let id = dataUjian.idSiswaUjian;
                    Swal.fire({
                        title: 'Apakah Yakin ?',
                        text: "Siswa Akan direstart",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtomText: 'Ya'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: "GET",
                                url: `<?= base_url();?>guru/restartSiswa/${id}`,
                                statusCode: {
                                    403: function () {
                                        Swal.fire(
                                            'Oops!',
                                            'Your Account Is Not Perminssion This Feature.',
                                            'error'
                                        )
                                    }
                                }
                            }).done(function () {
                                Swal.fire(
                                    'Account has been Reset, success!',
                                    'success'
                                )
                            }).always(function () {
                                pengawasUjian.ajax.reload();
                            });
                        }
                    })
            });
        });
    </script>
    <!-- Sweet Alert -->
    
    <script>
        $('#tom').on('click', function() {
            $('#berita').modal('show');
        })

        // dataTable

        
        $('.askiBerita').on('click', function() {
            $('#beritaAcara').submit();
        })
    </script>

    <script src="<?= base_url() . 'assets/datepicker/'; ?>dist/js/i18n/datepicker.en.js"></script>
    <script>
        jQuery('#datetimepicker').datetimepicker();
        jQuery('#datetimepicker4').datetimepicker({
            format: 'd/m/Y',
            lang: 'ru'
        });
        jQuery('#image_button').click(function() {
            jQuery('#datetimepicker4').datetimepicker('show'); //support hide,show and destroy command
        });

        jQuery('.datetimepicker2').datetimepicker({
            datepicker: false,
            format: 'H:i'
        });
        jQuery('#datetimepicker3').datetimepicker({
            datepicker: false,
            format: 'H:i'
        });
    </script>