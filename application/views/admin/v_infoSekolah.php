<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Info Sekolah
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Sekolah Menegah Kerja
            </p>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <center>
                <h6>Informasi Data Sekolah</h6>
            </center>
        </div>
        <div class="card-body">
            <form action="<?= base_url() . 'admin/info' ?>" method="post">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <label class="font-weight-bold" for="namaSekolah">Nama Sekolah</label>
                                <input class="form-control" type="text" name="namaSekolah" id="namaSekolah" value="<?= $info->namaSekolah; ?>">
                            </div>
                        </div>
                    </div><!-- Akhir -->
                    <br>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <label class="font-weight-bold" for="NPSN">NPSN Sekolah</label>
                                <input class="form-control" type="text" name="NPSN" id="NPSN" value="<?= $info->NPSN; ?>">
                            </div>
                        </div>
                    </div><!-- Akhir -->
                    <br>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <label class="font-weight-bold" for="NSS">NSS Sekolah</label>
                                <input class="form-control" type="text" name="NSS" id="NSS" value="<?= $info->NSS; ?>">
                            </div>
                        </div>
                    </div><!-- Akhir -->
                    <br>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <label class="font-weight-bold" for="Alamat">Alamat Sekolah</label>
                                <input class="form-control" type="text" name="Alamat" id="Alamat" value="<?= $info->Alamat; ?>">
                            </div>
                        </div>
                    </div><!-- Akhir -->
                    <br>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold" for="RT">RT</label>
                                    <input class="form-control" type="text" name="RT" id="RT" value="<?= $info->RT; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="font-weight-bold" for="RW">RW</label>
                                    <input class="form-control" type="text" name="RW" id="RW" value="<?= $info->RW; ?>">
                                </div>
                            </div>
                        </div>
                    </div><!-- Akhir -->
                    <br>
                    <div class="row">
                        <div class="col-md-2 offset-3">
                            <div class="row">
                                <label class="font-weight-bold" for="kodePos">Kode Pos Sekolah</label>
                                <input class="form-control" type="text" name="kodePos" id="kodePos" value="<?= $info->kodePos; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-10">
                                    <label class="font-weight-bold" for="Telp">Telp Sekolah</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="kodeTe" id="kodeTe" class="form-control" value="021">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="Telp" id="Telp" value="<?= $info->Telp; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Akhir -->
                    <br>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <label class="font-weight-bold" for="Provinsi">Provinsi Sekolah</label>
                                <!-- <input class="form-control" type="text" name="Provinsi" id="Provinsi" value="<?= $info->Provinsi; ?>"> -->
                                <select class="form-control" name="Provinsi" id="Provinsi">
                                    <option value="<?= $info->Provinsi; ?>"><?= $info->Provinsi; ?></option>
                                    <?php foreach ($provinsi as $pro) { ?>
                                        <option value="<?= $pro->lokasi_nama; ?>"><?= $pro->lokasi_nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div><!-- Akhir -->
                    <br>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <label class="font-weight-bold" for="Kota">Kota Sekolah</label>
                                <!-- <input class="form-control" type="text" name="Kota" id="Kota" value="<?= $info->Kota; ?>"> -->
                                <select name="Kota" id="Kota" class="form-control">
                                    <option value="<?= $info->Kota; ?>"><?= $info->Kota; ?></option>
                                </select>
                            </div>
                        </div>
                    </div><!-- Akhir -->
                    <br>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <label class="font-weight-bold" for="Kecamatan">Kecamatan Sekolah</label>
                                <!-- <input class="form-control" type="text" name="Kecamatan" id="Kecamatan" value="<?= $info->Kecamatan; ?>"> -->
                                <select name="Kecamatan" id="Kecamatan" class="form-control">
                                    <option value="<?= $info->Kecamatan; ?>"><?= $info->Kecamatan; ?></option>
                                </select>
                            </div>
                        </div>
                    </div><!-- Akhir -->
                    <br>


                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <label class="font-weight-bold" for="kelurahan">Kelurahan Sekolah</label>
                                <input class="form-control" type="text" name="kelurahan" id="kelurahan" value="<?= $info->Kelurahan; ?>">
                            </div>
                        </div>
                    </div><!-- Akhir -->
                    <br>

                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <label class="font-weight-bold" for="Website">Website Sekolah</label>
                                <input class="form-control" type="text" name="Website" id="Website" value="<?= $info->Website; ?>">
                            </div>
                        </div>
                    </div><!-- Akhir -->
                    <br>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <label class="font-weight-bold" for="Email">Email Sekolah</label>
                                <input class="form-control" type="text" name="Email" id="Email" value="<?= $info->Email; ?>">
                            </div>
                        </div>
                    </div><!-- Akhir -->
                    <br>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Update Data</button>
                            </div>
                        </div>
                    </div><!-- Akhir -->
                </div>
            </form>
        </div>
    </div>
</div>
<br>

<!-- select ajax -->
<script>
    $(document).ready(function() {
        $('#Provinsi').change(function() {
            var nama = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/get_kota'); ?>",
                data: {
                    nama: nama
                },
                async: true,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += "<option  value='" + data[i].lokasi_nama + "'>" + data[i].lokasi_nama + "</option>";
                    }
                    $('#Kota').html(html);

                }

            })
        });
        $('#Kota').change(function() {
            var nama = $(this).val();
            console.log(nama);
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/get_kecamatan'); ?>",
                data: {
                    nama: nama
                },
                async: true,
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += "<option value='" + data[i].lokasi_nama + "'>" + data[i].lokasi_nama + "</option>";
                    }
                    $('#Kecamatan').html(html);

                }

            })
        });
    });
</script>


<!-- 
<script>
var sl_ap = document.getElementById('sl_ap');
var sh_cut = document.getElementById('shortcut');


sl_ap.style.opacity = 0;
sl_ap.style.visibility = "hidden";
sl_ap.style.width="0px";
sl_ap.style.height="1000px";
sh_cut.style.height = "1350px";
document.getElementById('main-content').style.width="1200px";
//document.getElementById('main-content').style.height="1000px";

function showAdminProfil(){
    document.getElementById('main-content').style.width="900px";
    document.getElementById('main-content').style.transition="all 0.8s";
    sl_ap.style.width="300px";
    sl_ap.style.opacity = 1;
    sh_cut.style.height = "1350px";
    sl_ap.style.visibility = "visible";
    sl_ap.style.transition = "all 0.8s";
  

}

function hideAdminProfil(){
    sl_ap.style.opacity = 0;
    sl_ap.style.visibility = "hidden";
    sl_ap.style.width="0px";
    sl_ap.style.height="1000px";
    sh_cut.style.height = "1350px";
    document.getElementById('main-content').style.width="1200px";
    //document.getElementById('main-content').style.height="1000px";
}
</script> -->