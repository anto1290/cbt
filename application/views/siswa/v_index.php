<div class="container">
    <div class="jumbotron text-center">
        <div class="col-sm-8 mx-auto">
            <h1>Selamat datang!</h1>
            <p>Ini merupakan System CBT SMK DARMAWAN </p>
            <p>
                Anda telah login sebagai <b><?php echo $this->session->userdata('nama_siswa'); ?></b> [Siswa].
            </p>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Profile
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label"><b>Nama Lengkap</b></label>
                        <input class="form-control col-md-6 form-control-plaintext" type="text" value="       : <?= $siswa->nama_siswa; ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for=""><b>Foto Siswa</b></label><br>
                        <img style="width: 4cm;height:6cm;position: absolute;" src="<?php if (!file_exists('gambar/siswa/' . $siswa->fotoSiswa)) {
                                                                                        echo (base_url() . 'gambar/siswa/nouser.png');
                                                                                    } else { ?>
                                                                                        <?= base_url() . 'gambar/siswa/' . $siswa->fotoSiswa;
                                                                                        }
                                                                                        ?>">

                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label"><b>Nomor Induk Siswa</b> </label>
                <input class="form-control col-md-6 form-control-plaintext" type="text" value=": <?= $siswa->nis; ?>">
            </div>
            <div class="form-group row">
                <?php
                $date = date_create($siswa->tanggalLahir);
                $d = date_format($date, "d-m-Y");
                ?>
                <label for="" class="col-md-3 col-form-label"><b>Tempat,Tanggal Lahir</b> </label>
                <input class="form-control col-md-6 form-control-plaintext" type="text" value=": <?= $siswa->tempatLahir; ?>,<?= $d; ?> ">
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label"><b>Jenis Kelamin</b> </label>
                <input class="form-control col-md-6 form-control-plaintext" type="text" value=": <?= $siswa->JenisKelamin; ?>">
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label"><b>Agama</b> </label>
                <input class="form-control col-md-6 form-control-plaintext" type="text" value=": <?= $siswa->Agama; ?>">
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label"><b> Alamat</b></label>
                <input class="form-control col-md-6 form-control-plaintext" type="text" value=": <?= $siswa->alamat_siswa; ?>">
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label"><b>Telepon/HP</b></label>
                <input class="form-control col-md-6 form-control-plaintext" type="text" value=": <?= $siswa->hp_siswa; ?>">
            </div>

        </div>
    </div>
</div>