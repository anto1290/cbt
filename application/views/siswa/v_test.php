<!-- css ragu ragu -->
<script src="<?= base_url() . 'assets/sweetJs/sweetalert2.all.min.js' ?>"></script>
<style>
    .badgebox {
        opacity: 0;
    }

    .badgebox+.badge {
        /* Move the check mark away when unchecked */
        text-indent: -999px;
        /* Makes the badge's width stay the same checked and unchecked */
        border: 1px solid black;
        width: 20px;
    }

    .badgebox:focus+.badge {
        /* Set something to make the badge looks focused */
        /* This really depends on the application, in my case it was: */

        /* Adding a light border */
        box-shadow: inset 0px 0px 5px;
        /* Taking the difference out of the padding */
    }

    .badgebox:checked+.badge {
        /* Move the check mark back when checked */
        text-indent: 0;
    }

    [type="radio"] {
        position: fixed;
        opacity: 0;
        width: 0;
        height: 0;
    }

    [type="radio"]+img {
        cursor: pointer;
    }

    ul h4 img {
        position: relative;
    }

    ul h4 img:hover {
        z-index: 100;
        background-image: url(<?= base_url() . 'gambar/bahan/pilih.png' ?>);
        opacity: 1;
    }



    ul h4 [type="radio"]:checked+img {
        background-image: url(<?= base_url() . 'gambar/bahan/pilih.png' ?>);
        z-index: 100;

    }

    /* .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 100;
        width: 100vw;
        height: 100vh;
        margin-top: 250px;
        margin-left: 580px;
        background-repeat: no-repeat;
        background-position: center;
        background-color: rgba(192, 192, 192, 0.5);
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    } */
    .loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(2, 2, 2, 0.86);
        z-index: 100;
        background-repeat: no-repeat;
    }

    .loader img {
        margin-left: 680px;
        width: 100px;
        margin-top: 250px;
        position: absolute;
    }

    /* For mobile phones: */
    @media only screen and (max-width:400px) {
        .loader img {
            margin-left: 45%;
            margin-top: 50%;
            width: 60px;
            position: absolute;
        }
    }

    @media only screen and (min-width:500px) and (max-width: 768px) {
        .loader img {
            margin-left: 45%;
            margin-top: 50%;
            width: 95px;
            position: absolute;
        }
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-primary" style="background:linear-gradient(90deg, rgba(32,61,209,1) 0%, rgba(37,149,245,1) 100%);">
    <span class="navbar-brand"><img src="<?= base_url() . 'gambar/smk.png'; ?>" width="100"></span>
    <div class="collapse navbar-collapse">
    </div>
    <div class="col-md-11">
        <div class="row">
            <div class="col-md-4">
                <h4>Soal : <?= $no ?></h4>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <p id='timer'></p>
            </div>

        </div>
    </div>
</nav>
<div class="container-fluid">
    <?php
    $uri3 = ($this->uri->segment(3));
    $uri4 = ($this->uri->segment(4));
    $Agama = $this->session->userdata('Agama');
    // foreach($soal as $s) {
    $jawaban = $this->db->query("SELECT * FROM jawaban WHERE Nomor_test=$uri4 AND codeSoal='$uri3' AND kodeMapel='$s->kodeMapel'  AND nis = $siswa AND jenis_soal='1'")->row();
    ?>
    <div class="loader">
        <img src="<?= base_url() . 'gambar/logo/preload.gif' ?>" alt="">
    </div>
    <?php

    $cek = $this->db->query("SELECT * FROM jawaban WHERE Nomor_test=$uri4 AND codeSoal='$uri3' AND kodeMapel='$s->kodeMapel' AND nis=$siswa AND jenis_soal = '1'")->num_rows(); ?>
    <?php if ($cek > 0) { ?>
        <!-- <?= base_url() . 'siswa/test_update' ?> -->
        <form id="updateTest" action="#" method="post">
            <input type="hidden" name="idjawab" value="<?= $jawaban->idjawab; ?>">
            <input type="hidden" name="kodeMapel" value="<?= $jawaban->kodeMapel; ?>">
            <input type="hidden" name="codeSoal" value="<?= $jawaban->codeSoal; ?>">
            <input type="hidden" name="Nomor_soal" value="<?= $jawaban->Nomor_soal; ?>">
            <input type="hidden" name="nis" value="<?= $jawaban->nis; ?>">
            <input type="hidden" name="kodeGuru" value="<?= $s->kodeGuru; ?>">
            <input type="hidden" name="jsoal" value="<?= $jawaban->jenis_soal; ?>">
            <input type="hidden" name="halaman" value="<?= $uri4; ?>">
            <br>
            <?php
                $soal = strip_tags($s->soal, "<br><u><b><i><p><img>");
                if (empty($s->gambar_soal) && empty($s->audio_soal)) {
                    echo "<legend>$soal</legend>";
                } else if (empty($s->gambar_soal)) { ?>
                <ul>
                    <p><b>Perhatikan Suara Berikut !</b></p>
                </ul>
                <ul><audio controls>
                        <source src="<?= base_url() . 'audio/' . $s->audio_soal ?>"></audio></ul>
                <legend><?php echo "$soal"; ?></legend>
            <?php } else if (empty($s->audio_soal)) { ?>
                <ul>
                    <p><b>Perhatikan Gambar Berikut !</b></p>
                </ul>
                <ul><img src="<?= base_url() . 'gambar/soal/' . $s->gambar_soal ?>" width="400"></ul>
                <legend><?php echo "$soal"; ?></legend>
            <?php } else { ?>
                <ul>
                    <p><b>Perhatikan Gambar & Suara Berikut !</b></p>
                </ul>
                <ul><img src="<?= base_url() . 'gambar/soal/' . $s->gambar_soal ?>" width="400"></ul>
                <ul><audio controls>
                        <source src="<?= base_url() . 'audio/' . $s->audio_soal ?>"></audio></ul>
                <legend><?php echo "$soal"; ?></legend>
            <?php } ?>
            <ul>
                <h4><input <?php if ($jawaban->jawaban == "A") {
                                    echo "checked";
                                } ?> class="ceked" type="radio" id="jawabA" value="A" name="jawaban">
                    <img onclick="check(0)" class="cek" id="A" src="<?= base_url() . 'gambar/bahan/A.png' ?>">
                    <?= $s->opsi_a; ?></h4>
            </ul>
            <ul>
                <h4><input <?php if ($jawaban->jawaban == "B") {
                                    echo "checked";
                                } ?> class="ceked" type="radio" id="jawabB" value="B" name="jawaban">
                    <img onclick="check(1)" class="cek" id="B" src="<?= base_url() . 'gambar/bahan/B.png' ?>"> <?= $s->opsi_b; ?></h4>
            </ul>
            <ul>
                <h4><input <?php if ($jawaban->jawaban == "C") {
                                    echo "checked";
                                } ?> class="ceked" type="radio" id="jawabC" value="C" name="jawaban">
                    <img onclick="check(2)" class="cek" id="C" src="<?= base_url() . 'gambar/bahan/C.png' ?>"> <?= $s->opsi_c; ?></h4>
            </ul>
            <ul>
                <h4><input <?php if ($jawaban->jawaban == "D") {
                                    echo "checked";
                                } ?> class="ceked" type="radio" id="jawabD" value="D" name="jawaban">
                    <img onclick="check(3)" class="cek" id="D" src="<?= base_url() . 'gambar/bahan/D.png' ?>"> <?= $s->opsi_d; ?></h4>
            </ul>
            <ul>
                <h4><input <?php if ($jawaban->jawaban == "E") {
                                    echo "checked";
                                } ?> class="ceked" type="radio" id="jawabE" value="E" name="jawaban">
                    <img onclick="check(4)" class="cek" id="E" src="<?= base_url() . 'gambar/bahan/E.png' ?>"> <?= $s->opsi_e; ?></h4>
            </ul>
            <div class="footer">
                <hr>
                <!-- PHP -->
                <?php
                    $tampil2 = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND S.codeSoal='$uri3' AND (S.Tingkatan='$Tingkatan' OR S.Tingkatan='All')AND (PS.Jurusan='$jurusan->nama' OR PS.Jurusan = 'ALL') AND jenis_soal = '1'  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK' OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->num_rows();
                    $jmlhalaman = ceil($tampil2 / 1);
                    ?>
                <input type="hidden" name="jmlH" id="jmlH" value="<?= $jmlhalaman ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <?php if ($uri4 > 1) {
                                    $previous = $uri4 - 1; ?>
                                <a style="width:180px;" class="btn btn-success" href="<?= base_url() . 'siswa/test/' . $uri3 . '/' . $previous; ?>"><i class="fas fa-arrow-alt-circle-left pull-left"></i> Previous</a>

                            <?php } ?>
                        </div>
                        <div class="col-md-4">
                            <label for="warning" style="width:180px;" class="btn btn-warning text-white">
                                <center><input <?php if ($jawaban->Ragu == 1) {
                                                        echo "checked";
                                                    } ?> type="checkbox" name="ragu" id="warning" class="badgebox" value="1"><span class="badge">&check;</span> Ragu - Ragu</center>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <?php

                                if ($uri4 < $jmlhalaman) { ?>
                                <button style="width:180px;" type="button" id="nextUpdate" class="btn btn-success">Next <i class="fas fa-arrow-alt-circle-right"></i></button>
                                <?php } else if ($uri4 == $jmlhalaman) {
                                        $cekesay = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND S.codeSoal='$uri3' AND (S.Tingkatan='$Tingkatan' OR S.Tingkatan='All')AND (PS.Jurusan='$jurusan->nama' OR PS.Jurusan = 'ALL') AND jenis_soal = '2'  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK'OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->num_rows();
                                        $cekRagu = $this->db->query("SELECT * FROM jawaban WHERE codeSoal='$uri3' AND kodeMapel='$s->kodeMapel' AND nis=$siswa AND jenis_soal =1 AND Ragu=1")->num_rows();
                                        if ($cekRagu == 0 && $cekesay == 0) { ?>

                                    <button type="button" style="width:200px;" class="btn btn-primary tombol-selesai">
                                        <a class="finishTime"></a> Finish <i class="fas fa-check-circle"></i>
                                    </button>
                                <?php } else if ($cekRagu > 0) { ?>
                                    <button type="button" id="tombol-ragu" style="width:180px;" class="btn btn-primary ">Finish <i class="fas fa-check-circle"></i></button>
                                <?php   } else { ?>
                                    <button type="button" id="pindah-esai" style="width:180px;" class="btn btn-success pindah-esai">Next <i class="fas fa-check-circle"></i></button>
                            <?php }
                                } ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script type="text/javascript">
            var fup = document.getElementById('updateTest').querySelectorAll('.ceked');
            var jawbaanup = "<?= $jawaban->jawaban; ?>";
            var b;
            for (o = 0; 0 < fup.length; o++) {
                b = fup[o].value
                if (b == jawbaanup) {
                    checkup(o);
                }
            }

            function uncheckup(set) {
                for (i = 0; i < document.querySelectorAll('img.cek').length; i++) {
                    if (document.querySelectorAll('img.cek')[set].id != document.querySelectorAll('img.cek')[i].id) {
                        var y = document.querySelectorAll('img.cek')[i].id;
                        var w = document.getElementById(y);
                        w.setAttribute('src', '<?= base_url() . 'gambar/bahan/' ?>' + y + '.png')

                    }
                }

            }

            function checkup(nomor) {
                uncheckup(nomor)
                var x = document.querySelectorAll('img.cek')[nomor].id;
                document.getElementById('jawab' + x).checked = true;
                var z = document.getElementById(x);
                z.setAttribute('src', '<?= base_url() . 'gambar/bahan/pilih.png' ?>')
            }
        </script>
    <?php } else { ?>
        <!-- <?= base_url() . 'siswa/test_aksi' ?> -->
        <form id="nextaja" action="#" method="post">
            <input type="hidden" name="kodeMapel" value="<?= $s->kodeMapel; ?>">
            <input type="hidden" name="codeSoal" value="<?= $s->codeSoal; ?>">
            <input type="hidden" name="Nomor_soal" value="<?= $s->Nomor_soal; ?>">
            <input type="hidden" name="idsiswa" value="<?= $siswa; ?>">
            <input type="hidden" name="jsoal" value="<?= $s->jenis_soal; ?>">
            <input type="hidden" name="id_guru" value="<?= $s->kodeGuru; ?>">
            <input type="hidden" name="halaman" value="<?= $uri4; ?>">
            <?php
                $soal = strip_tags($s->soal, "<br><u><i><b><img>");
                if (empty($s->gambar_soal) && empty($s->audio_soal)) {
                    echo "<legend>  $soal</legend>";
                } else if (empty($s->gambar_soal)) { ?>
                <ul>
                    <p><b>Perhatikan Suara Berikut !</b></p>
                </ul>
                <ul><audio controls>
                        <source src="<?= base_url() . 'audio/' . $s->audio_soal ?>"></audio></ul>
                <legend><?php echo "$soal"; ?></legend>
            <?php } else if (empty($s->audio_soal)) { ?>
                <ul>
                    <p><b>Perhatikan Gambar Berikut !</b></p>
                </ul>
                <ul><img src="<?= base_url() . 'gambar/soal/' . $s->gambar_soal ?>" width="400"></ul>
                <legend><?php echo "$soal"; ?></legend>
            <?php } else { ?>
                <ul>
                    <p><b>Perhatikan Gambar & Suara Berikut !</b></p>
                </ul>
                <ul><img src="<?= base_url() . 'gambar/soal/' . $s->gambar_soal ?>" width="400"></ul>
                <ul><audio controls>
                        <source src="<?= base_url() . 'audio/' . $s->audio_soal ?>"></audio></ul>
                <legend><?php echo "$soal"; ?></legend>
            <?php } ?>
            <ul>
                <h4>
                    <input type="radio" id="jawabA" value="A" name="jawaban">
                    <img onclick="check(0)" class="cek" id="A" src="<?= base_url() . 'gambar/bahan/A.png' ?>"><?= $s->opsi_a; ?>
                </h4>
            </ul>
            <ul>
                <h4>
                    <input type="radio" id="jawabB" value="B" name="jawaban">
                    <img onclick="check(1)" class="cek" id="B" src="<?= base_url() . 'gambar/bahan/B.png' ?>"><?= $s->opsi_b; ?>
                </h4>
            </ul>
            <ul>
                <h4>
                    <input type="radio" id="jawabC" value="C" name="jawaban">
                    <img onclick="check(2)" class="cek" id="C" src="<?= base_url() . 'gambar/bahan/C.png' ?>"><?= $s->opsi_c; ?>
                </h4>
            </ul>
            <ul>
                <h4>
                    <input type="radio" id="jawabD" value="D" name="jawaban">
                    <img onclick="check(3)" class="cek" id="D" src="<?= base_url() . 'gambar/bahan/D.png' ?>"><?= $s->opsi_d; ?>
                </h4>
            </ul>
            <ul>
                <h4>
                    <input type="radio" id="jawabE" value="E" name="jawaban">
                    <img onclick="check(4)" class="cek" id="E" src="<?= base_url() . 'gambar/bahan/E.png' ?>"><?= $s->opsi_e; ?>
                </h4>
            </ul>
            <br>
            <div class="footer">
                <br>
                <hr>
                <!-- PHP -->
                <?php
                    $tampil2 = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND S.codeSoal='$uri3' AND (S.Tingkatan='$Tingkatan' OR S.Tingkatan='All')AND (PS.Jurusan='$jurusan->nama' OR PS.Jurusan = 'ALL') AND jenis_soal = '1'  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK'OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->num_rows();

                    $jmlhalaman = ceil($tampil2 / 1);
                    ?>
                <input type="hidden" name="jmlH" id="jmlH" value="<?= $jmlhalaman ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <?php if ($uri4 > 1) {
                                    $previous = $uri4 - 1; ?>
                                <a style="width:180px;" class="btn btn-success" href="<?= base_url() . 'siswa/test/' . $uri3 . '/' . $previous; ?>"><i class="fas fa-arrow-alt-circle-left"></i> Previous</a>

                            <?php } ?>
                        </div>
                        <div class="col-md-4">
                            <label for="warning" style="width:180px;" class="btn btn-warning text-white">
                                <center><input type="checkbox" name="ragu" id="warning" class="badgebox" value="1"><span class="badge">&check;</span> Ragu - Ragu</center>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <?php

                                if ($uri4 < $jmlhalaman) { ?>
                                <button style="width:180px;" type="button" id="nextAksi" class="btn btn-success">Next <i class="fas fa-arrow-alt-circle-right"></i></button>
                                <?php } else if ($uri4 == $jmlhalaman) {
                                        $cekesay = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND S.codeSoal='$uri3' AND(S.Tingkatan='$Tingkatan' OR S.Tingkatan='All')AND (PS.Jurusan='$jurusan->nama' OR PS.Jurusan = 'ALL') AND jenis_soal = '2'  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK' OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->num_rows();
                                        if ($cekesay > 0) {
                                            $cekRagu = $this->db->query("SELECT * FROM jawaban WHERE codeSoal='$uri3' AND kodeMapel='$s->kodeMapel' AND nis=$siswa AND jenis_soal =1 AND Ragu=1")->num_rows();
                                            if ($cekRagu == 0) { ?>
                                        <button style="width:180px;" type="button" id="nextEsay" class="btn btn-success">Next <i class="fas fa-arrow-alt-circle-right"></i></button>
                                    <?php } else { ?>
                                        <button type="button" id="tombol-ragu" style="width:180px;" class="btn btn-success ">Next <i class="fas fa-check-circle"></i></button>
                                    <?php }
                                            } else {
                                                $cekRagu = $this->db->query("SELECT * FROM jawaban WHERE codeSoal='$uri3' AND kodeMapel='$s->kodeMapel' AND nis=$siswa AND jenis_soal =1 AND Ragu=1")->num_rows();
                                                if ($cekRagu == 0) { ?>
                                        <button type="button" id="submit" style="width:200px;" class="btn btn-primary submit">
                                            <a class="finishTime"></a> Finish <i class="fas fa-check-circle"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button type="button" id="tombol-ragu" style="width:180px;" class="btn btn-primary ">Finish <i class="fas fa-check-circle"></i></button>
                            <?php }
                                    }
                                } ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php } ?>
    <?php //} 
    ?>
    <br>
</div>
<script>
    $(document).ready(function() {
        var base_url = "<?= base_url() . 'siswa/test/' . $uri3  ?>";
        var essay = "<?= base_url() . 'siswa/esay/' . $uri3  ?>";
        var uri4 = <?= $uri4 ?> + 1;
        $(".loader").hide();
        $('#nextUpdate').on('click', function() {
            $('#updateTest').ready(function() {
                var idjawab = $('input:hidden[name=idjawab]').val();
                var jawaban = $('input:radio[name=jawaban]:checked').val();
                var kodeMapel = $('input:hidden[name=kodeMapel]').val();
                var codeSoal = $('input:hidden[name=codeSoal]').val();
                var Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
                var halaman = $('input:hidden[name=halaman]').val();
                var jsoal = $('input:hidden[name=jsoal]').val();
                var idsiswa = $('input:hidden[name=idsiswa]').val();
                var id_guru = $('input:hidden[name=id_guru]').val();
                var ragu = $('input:checkbox[name=ragu]:checked').val();
                $.ajax({
                    url: "<?= base_url() . 'siswa/test_updateAPG'; ?>",
                    type: "POST",
                    data: {
                        idjawab: idjawab,
                        jawaban: jawaban,
                        kodeMapel: kodeMapel,
                        codeSoal: codeSoal,
                        Nomor_soal: Nomor_soal,
                        halaman: halaman,
                        idsiswa: idsiswa,
                        jsoal: jsoal,
                        id_guru: id_guru,
                        ragu: ragu
                    },
                    beforeSend: function() {
                        $('.loader').show();
                    }

                }).done(function(data) {
                    $(".loader").hide();

                    document.location.href = base_url + '/' + uri4;
                });
            });

        });

        $('#nextAksi').on('click', function() {
            var jawaban = $('input:radio[name=jawaban]:checked').val();
            var kodeMapel = $('input:hidden[name=kodeMapel]').val();
            var codeSoal = $('input:hidden[name=codeSoal]').val();
            var Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
            var halaman = $('input:hidden[name=halaman]').val();
            var jsoal = $('input:hidden[name=jsoal]').val();
            var idsiswa = $('input:hidden[name=idsiswa]').val();
            var id_guru = $('input:hidden[name=id_guru]').val();
            var ragu = $('input:checkbox[name=ragu]:checked').val();
            $.ajax({
                url: "<?= base_url() . 'siswa/test_aksiA'; ?>",
                type: "POST",
                data: {
                    jawaban: jawaban,
                    kodeMapel: kodeMapel,
                    codeSoal: codeSoal,
                    Nomor_soal: Nomor_soal,
                    halaman: halaman,
                    idsiswa: idsiswa,
                    jsoal: jsoal,
                    id_guru: id_guru,
                    ragu: ragu
                },
                beforeSend: function() {
                    $('.loader').show();
                }

            }).done(function(data) {
                $(".loader").hide();

                document.location.href = base_url + '/' + uri4;
            });
        });
        $('#nextEsay').on('click', function() {
            var jawaban = $('input:radio[name=jawaban]:checked').val();
            var kodeMapel = $('input:hidden[name=kodeMapel]').val();
            var codeSoal = $('input:hidden[name=codeSoal]').val();
            var Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
            var halaman = $('input:hidden[name=halaman]').val();
            var jsoal = $('input:hidden[name=jsoal]').val();
            var idsiswa = $('input:hidden[name=idsiswa]').val();
            var id_guru = $('input:hidden[name=id_guru]').val();
            var ragu = $('input:checkbox[name=ragu]:checked').val();
            $.ajax({
                url: "<?= base_url() . 'siswa/test_aksiA'; ?>",
                type: "POST",
                data: {
                    jawaban: jawaban,
                    kodeMapel: kodeMapel,
                    codeSoal: codeSoal,
                    Nomor_soal: Nomor_soal,
                    halaman: halaman,
                    idsiswa: idsiswa,
                    jsoal: jsoal,
                    id_guru: id_guru,
                    ragu: ragu
                },
                beforeSend: function() {
                    $('.loader').show();
                }

            }).done(function() {
                $(".loader").hide();
                document.location.href = "<?= base_url() . 'siswa/esay/' . $uri3 . '/1'; ?>"
            });
        });
        $('#submit').on('click', function() {
            var jawaban = $('input:radio[name=jawaban]:checked').val();
            var kodeMapel = $('input:hidden[name=kodeMapel]').val();
            var codeSoal = $('input:hidden[name=codeSoal]').val();
            var Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
            var halaman = $('input:hidden[name=halaman]').val();
            var jsoal = $('input:hidden[name=jsoal]').val();
            var idsiswa = $('input:hidden[name=idsiswa]').val();
            var id_guru = $('input:hidden[name=id_guru]').val();
            var ragu = $('input:checkbox[name=ragu]:checked').val();
            $.ajax({
                url: "<?= base_url() . 'siswa/test_aksiA'; ?>",
                type: "POST",
                data: {
                    jawaban: jawaban,
                    kodeMapel: kodeMapel,
                    codeSoal: codeSoal,
                    Nomor_soal: Nomor_soal,
                    halaman: halaman,
                    idsiswa: idsiswa,
                    jsoal: jsoal,
                    id_guru: id_guru,
                    ragu: ragu
                },
                beforeSend: function() {
                    $('.loader').show();
                }

            }).done(function() {
                Swal.fire({
                    title: 'Apakah Yakin ?',
                    text: "Ujian Telah Diselesaikan ?",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtomText: 'Yes !'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            title: 'Ujian Telah Selesai',
                            text: "Tekan yes untuk mengakhiri semuanya",
                            type: 'success',
                            showCancelButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtomText: 'Yes !'
                        }).then((result) => {
                            if (result.value) {
                                document.location.href = "<?= base_url() . 'siswa/result_ujian/' . $uri3 ?>";
                            }
                        });
                    }
                });
            });
        });
        // var count = 8;
        // var mysetdetik;

        // function starthalder() {
        //     var kodeMapel = $('input:hidden[name=kodeMapel]').val();
        //     var codeSoal = $('input:hidden[name=codeSoal]').val();
        //     var x = count--;
        //     console.log(x);
        //     if (count == 0) {
        //         $.ajax({
        //             url: "<?= base_url() . 'siswa/cekKecurangan'; ?>",
        //             type: "POST",
        //             data: {
        //                 kodeMapel: kodeMapel,
        //                 codeSoal: codeSoal
        //             },
        //             success: function(data) {
        //                 document.location.href = "<?= base_url() . 'login?alert=keluar'; ?>"
        //             }

        //         });
        //     }
        // }
        // $(window).bind('blur', function() {
        //     mysetdetik = window.setInterval(starthalder, 1000);
        // });
        // $(window).bind('focus', function() {
        //     window.clearInterval(mysetdetik);
        //     count = 8;
        // });
    });
</script>
<script type="text/javascript">
    function uncheck(set) {
        for (i = 0; i < document.querySelectorAll('img.cek').length; i++) {
            if (document.querySelectorAll('img.cek')[set].id != document.querySelectorAll('img.cek')[i].id) {
                var y = document.querySelectorAll('img.cek')[i].id;
                var w = document.getElementById(y);
                w.setAttribute('src', '<?= base_url() . 'gambar/bahan/' ?>' + y + '.png')

            }
        }

    }

    function check(nomor) {
        uncheck(nomor)
        var x = document.querySelectorAll('img.cek')[nomor].id;
        document.getElementById('jawab' + x).checked = true;
        var z = document.getElementById(x);
        z.setAttribute('src', '<?= base_url() . 'gambar/bahan/pilih.png' ?>')
    }
</script>
<!-- Right Slider nav -->
<style>
    #hcr {
        position: fixed;
        top: 180px;
        z-index: 100;
    }

    *html #hcr {
        position: relative;
    }

    .hcrtab {
        height: 60px;
        width: 55px;
        float: left;
        cursor: pointer;
    }

    .hcrtab img {
        height: 60px;
        width: 60px;
    }

    .hcrcontent {
        float: left;
        border: 2px solid #003e82;
        background: #f3f6f7;
        width: 350px;
        height: 300px;
        padding: 10px;
        overflow-x: hidden;
        /* Hide horizontal scrollbar */
        overflow-y: scroll;
    }

    .hc-credit {
        font-size: 9px
    }

    .hc-credit a {
        text-decoration: none
    }
</style>
<?php if ($uri4 <= $jmlhalaman) { ?>
    <script type="text/javascript">
        function showHidehcr() {
            var hcr = document.getElementById("hcr");
            var w = hcr.offsetWidth;
            hcr.opened ? movehcr(0, 10 - w) : movehcr(5 - w, 0);
            hcr.opened = !hcr.opened;
        }

        function movehcr(x0, xf) {
            var hcr = document.getElementById("hcr");
            var dx = Math.abs(x0 - xf) > 10 ? 5 : 1;
            var dir = xf > x0 ? 1 : -1;
            var x = x0 + dx * dir;
            hcr.style.right = x.toString() + "px";
            if (x0 != xf) {
                setTimeout("movehcr(" + x + ", " + xf + ")", 10);
            }
        }
    </script>
    <div id="hcr">
        <div class="hcrtab" onclick="showHidehcr()">
            <img src="<?= base_url() . '/gambar/logo/soal.png'; ?>" alt="">
        </div>
        <div class="hcrcontent">
            <div class="font-weight-bold" style="padding-bottom:20px; font-size:14px; color:#0066CC">Soal Pilihan Ganda</div>
            <?php
                $v = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND SU.codeSoal='$uri3' AND (S.Tingkatan='$Tingkatan' OR S.Tingkatan='All')AND (PS.Jurusan='$jurusan->nama' OR PS.Jurusan = 'ALL') AND jenis_soal =1  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK'OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->result();
                ?>
            <?php $no = 1;
                //} 
                foreach ($v as $j) {
                    $j->id_soal = $no++;
                    ?>
                <?php
                        $Jawabb = $this->db->query("SELECT * FROM jawaban WHERE Nomor_test = $j->id_soal AND codeSoal='$uri3' AND kodeMapel='$s->kodeMapel'  AND nis = $siswa AND jenis_soal='1'")->row();
                        if ($Jawabb != null) { ?>
                    <?php if ($Jawabb->Ragu != 1) { ?>
                        <a style="width:50px; " class="border rounded bg-info btn btn-primary" href="<?= base_url() . 'siswa/test/' . $uri3 . '/' . $j->id_soal; ?>"><?php echo "$j->id_soal" . $Jawabb->jawaban; ?></a>
                    <?php } else { ?>
                        <a style="width:50px; " class="border rounded bg-warning btn btn-warrning" href="<?= base_url() . 'siswa/test/' . $uri3 . '/' . $j->id_soal; ?>"><?php echo "$j->id_soal" . $Jawabb->jawaban; ?></a>
                    <?php
                                }
                            } else { ?>
                    <a style="width:50px; " class="border rounded bg-info btn btn-primary" href="<?= base_url() . 'siswa/test/' . $uri3 . '/' . $j->id_soal; ?>"><?php echo "$j->id_soal" ?></a>
                <?php
                        }
                        ?>

            <?php

                }
                ?>

            <br />
            <div class="font-weight-bold" style="padding-bottom:20px; font-size:14px; color:#0066CC">Soal Esai</div>
            <?php
                $f = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON  SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND SU.codeSoal='$uri3' AND (S.Tingkatan='$Tingkatan' OR S.Tingkatan='All')AND (PS.Jurusan='$jurusan->nama' OR PS.Jurusan = 'ALL') AND jenis_soal=2  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK'OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->result();
                $no = 1; ?>
            <?php foreach ($f as $j) {
                    $j->id_soal = $no++; ?>
                <a class="border rounded bg-info btn btn-primary" href="<?= base_url() . 'siswa/esay/' . $uri3 . '/' . $j->id_soal; ?>"><?php echo "$j->id_soal"; ?></a>
            <?php } ?>


            <br>
            <div class="hc-credit">
                <span style="float:left">

                    <a href="javascript:showHidehcr()">
                        [close]
                    </a>
                </span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var hcr = document.getElementById("hcr");
        hcr.style.right = (23 - hcr.offsetWidth).toString() + "px";
    </script>

<?php } ?>
<!-- Sweet Alert -->
<script>
    function waktuHabis(x) {
        var hrefs = x;
        Swal.fire({
            title: 'MAAF WAKTU ANDA TELAH HABIS !!',
            text: "Trima kasih telah melaksanakan ujian!",
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                document.location.href = hrefs;
            }
        })

    }
</script>
<script>
    $(document).ready(function() {
        $('.tombol-selesai').on('click', function() {
            $('#updateTest').ready(function() {
                var idjawab = $('input:hidden[name=idjawab]').val();
                var jawaban = $('input:radio[name=jawaban]:checked').val();
                var kodeMapel = $('input:hidden[name=kodeMapel]').val();
                var codeSoal = $('input:hidden[name=codeSoal]').val();
                var Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
                var halaman = $('input:hidden[name=halaman]').val();
                var jsoal = $('input:hidden[name=jsoal]').val();
                var idsiswa = $('input:hidden[name=idsiswa]').val();
                var id_guru = $('input:hidden[name=id_guru]').val();
                var ragu = $('input:checkbox[name=ragu]:checked').val();
                $.ajax({
                    url: "<?= base_url() . 'siswa/test_updateAPG'; ?>",
                    type: "POST",
                    data: {
                        idjawab: idjawab,
                        jawaban: jawaban,
                        kodeMapel: kodeMapel,
                        codeSoal: codeSoal,
                        Nomor_soal: Nomor_soal,
                        halaman: halaman,
                        idsiswa: idsiswa,
                        jsoal: jsoal,
                        id_guru: id_guru,
                        ragu: ragu
                    },
                    beforeSend: function() {
                        $('.loader').show();
                    }

                }).done(function(data) {
                    $(".loader").hide();
                    Swal.fire({
                        title: 'Apakah Yakin ?',
                        text: "Ujian Telah Diselesaikan ?",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtomText: 'Yes !'
                    }).then((result) => {
                        if (result.value) {

                            Swal.fire({
                                title: 'Ujian Telah Selesai',
                                text: "Tekan yes untuk mengakhiri semuanya",
                                type: 'success',
                                showCancelButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                allowEnterKey: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtomText: 'Yes !'
                            }).then((result) => {
                                if (result.value) {

                                    document.location.href = "<?= base_url() . 'siswa/result_ujian/' . $uri3; ?>";
                                }
                            });
                        }
                    });
                });

            });
        });
        $('#tombol-ragu').on('click', function() {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'JAWABAN TIDAK BOLEH RAGU - RAGU!!!',
            })
        });
        $('#pindah-esai').on('click', function() {
            var idjawab = $('input:hidden[name=idjawab]').val();
            var jawaban = $('input:radio[name=jawaban]:checked').val();
            var kodeMapel = $('input:hidden[name=kodeMapel]').val();
            var codeSoal = $('input:hidden[name=codeSoal]').val();
            var Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
            var halaman = $('input:hidden[name=halaman]').val();
            var jsoal = $('input:hidden[name=jsoal]').val();
            var idsiswa = $('input:hidden[name=idsiswa]').val();
            var id_guru = $('input:hidden[name=id_guru]').val();
            var ragu = $('input:checkbox[name=ragu]:checked').val();
            $.ajax({
                url: "<?= base_url() . 'siswa/test_updateAPG'; ?>",
                type: "POST",
                data: {
                    idjawab: idjawab,
                    jawaban: jawaban,
                    kodeMapel: kodeMapel,
                    codeSoal: codeSoal,
                    Nomor_soal: Nomor_soal,
                    halaman: halaman,
                    idsiswa: idsiswa,
                    jsoal: jsoal,
                    id_guru: id_guru,
                    ragu: ragu
                },
                beforeSend: function() {
                    $('.loader').show();
                }

            }).done(function(data) {
                $(".loader").hide();
                document.location.href = "<?= base_url() . 'siswa/esay/' . $uri3 . '/1'; ?>"
            });
        });
    });
</script>
<!-- JS Bootstrap -->
<!-- <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery.js'; ?>"></script>