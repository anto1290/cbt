<!-- css ragu ragu -->
<script src="<?= base_url() . 'assets/sweetJs/sweetalert2.all.min.js' ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/esay.css'); ?>">
<style>
    .loader {
        position: absolute;
        display: none;
        width: 100% ;
        height: 100%;
        z-index: 110;
        left: 0;
        top: 0;
        background-color: rgba(0,0,0,0.7);
    }
    .loader img {
        position: absolute;
        left: 50%;
        top:50%;
        transform: translate(-50%,-50%);
    }
    .Nomor {
    background-color: blue;
    position: absolute;
    top: 9.5vh;
    font-size: larger;
    font-weight: bold;
    color: whitesmoke;
    left: 0;
    width: 100%;
    height: 50px;
    padding: 9px;
    }
</style>
<div class="container-fluid">
    <?php
    $uri3 = ($this->uri->segment(3));
    $uri4 = ($this->uri->segment(4));
    ?>
     <div class="loader">
        <img src="<?= base_url() . 'gambar/logo/preload.gif' ?>" alt="">
    </div>
    <div class="Nomor">
        No : <?= $uri4; ?>
    </div>
    <form id="nextaja" action="<?= base_url() . 'siswa/test_aksi' ?>" method="post">
        <input type="hidden" name="kodeMapel" value="<?= $s->kodeMapel; ?>">
        <input type="hidden" name="codeSoal" value="<?= $s->codeSoal; ?>">
        <input type="hidden" name="Nomor_soal" value="<?= $s->Nomor_soal; ?>">
        <input type="hidden" name="jsoal" value="2">
        <input type="hidden" name="id_guru" value="<?= $s->kodeGuru; ?>">
        <input type="hidden" name="halaman" value="<?= $uri4; ?>">
        <?php
        $soal = strip_tags($s->soal, "<br><u><btu><i><p><img><table></table><tr></tr><td></td><th></th>");
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
        <textarea class="form-control" name="jawaban" id="jawaban" cols="30" rows="10"></textarea>
        <br>
        <div class="modal-footer">
            <br>
            <hr>
            <!-- PHP -->
            <?php
            $tampil2 = $this->db->query("SELECT * FROM soal WHERE kodeMapel='$s->kodeMapel' AND kodeGuru='$s->kodeGuru' AND codeSoal='$s->codeSoal' AND jenis_soal=2 ")->num_rows();

            $jmlhalaman = ceil($tampil2 / 1);
            ?>
            <input type="hidden" name="jmlH" id="jmlH" value="<?= $jmlhalaman ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php if ($uri4 > 1) {
                            $previous = $uri4 - 1; ?>
                            <a style="width:180px;" class="btn btn-success" href="<?= base_url() . 'siswa/esay/' . $uri3 . '/' . $previous; ?>"><i class="fas fa-arrow-alt-circle-left"></i> Previous</a>

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
                            $cekRagu = $this->db->query("SELECT * FROM jawabpreview WHERE codeSoal='$s->codeSoal' AND kodeMapel='$s->kodeMapel' AND jenis_soal =2 AND Ragu=1")->num_rows();
                            if ($cekRagu == 0) { ?>
                                <button type="button" class="btn btn-primary tombol-selesai"><a class="finishTime"></a> Finish <i class="fas fa-check-circle"></i></button>
                            <?php } else { ?>
                                <button type="button" id="tombol-ragu" style="width:180px;" class="btn btn-primary ">Finish <i class="fas fa-check-circle"></i></button>
                        <?php
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Sweet Alert -->
    <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-3.4.1.min.js'; ?>"></script>
<script>
    $(document).ready(function() {
        let base_url = "<?= base_url() . 'guru/previewEsai/' . $uri3  ?>";
        let essay = "<?= base_url() . 'guru/previewEsai/' . $uri3  ?>";
        let uri4 = <?= $uri4 ?> + 1;
        $(".loader").hide();
        $('#nextaja').ready(function() {
            $('#nextAksi').on('click', function() {
                let jawaban = $('input:radio[name=jawaban]:checked').val();
                let kodeMapel = $('input:hidden[name=kodeMapel]').val();
                let codeSoal = $('input:hidden[name=codeSoal]').val();
                let Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
                let halaman = $('input:hidden[name=halaman]').val();
                let jsoal = $('input:hidden[name=jsoal]').val();
                let id_guru = $('input:hidden[name=id_guru]').val();
                let ragu = $('input:checkbox[name=ragu]:checked').val();
                $.ajax({
                    url: "<?= base_url() . 'guru/previewAksiPG'; ?>",
                    type: "POST",
                    data: {
                        jawaban: jawaban,
                        kodeMapel: kodeMapel,
                        codeSoal: codeSoal,
                        Nomor_soal: Nomor_soal,
                        halaman: halaman,
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
                    console.log(uri4)
                }).fail(function(data) {
                    document.location.href = `${base_url}/${uri4}`;
                });
            });
            $('#nextEsay').on('click', function() {
                let jawaban = $('input:radio[name=jawaban]:checked').val();
                let kodeMapel = $('input:hidden[name=kodeMapel]').val();
                let codeSoal = $('input:hidden[name=codeSoal]').val();
                let Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
                let halaman = $('input:hidden[name=halaman]').val();
                let jsoal = $('input:hidden[name=jsoal]').val();
                let id_guru = $('input:hidden[name=id_guru]').val();
                let ragu = $('input:checkbox[name=ragu]:checked').val();
                if(jawaban){
                $.ajax({
                    url: "<?= base_url() . 'guru/previewAksiPG'; ?>",
                    type: "POST",
                    data: {
                        jawaban: jawaban,
                        kodeMapel: kodeMapel,
                        codeSoal: codeSoal,
                        Nomor_soal: Nomor_soal,
                        halaman: halaman,
                        jsoal: jsoal,
                        id_guru: id_guru,
                        ragu: ragu
                    },
                    beforeSend: function() {
                        $('.loader').show();
                    }

                }).done(function() {
                    $(".loader").hide();
                    document.location.href = "<?= base_url() . 'guru/previewEsai/' . $uri3 . '/1'; ?>"
                });
            }else{
                    document.location.href = "<?= base_url() . 'guru/previewEsai/' . $uri3 . '/1'; ?>"
            }
            });
            $('#submit').on('click', function() {
                let jawaban = $('input:radio[name=jawaban]:checked').val();
                let kodeMapel = $('input:hidden[name=kodeMapel]').val();
                let codeSoal = $('input:hidden[name=codeSoal]').val();
                let Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
                let halaman = $('input:hidden[name=halaman]').val();
                let jsoal = $('input:hidden[name=jsoal]').val();
                
                let id_guru = $('input:hidden[name=id_guru]').val();
                let ragu = $('input:checkbox[name=ragu]:checked').val();
                $.ajax({
                    url: "<?= base_url() . 'guru/previewAksiPG'; ?>",
                    type: "POST",
                    data: {
                        jawaban: jawaban,
                        kodeMapel: kodeMapel,
                        codeSoal: codeSoal,
                        Nomor_soal: Nomor_soal,
                        halaman: halaman,
                        
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
                            $('.loader').hide();
                            let idpaketsoal = "<?= $uri3; ?>";
                            $.ajax({
                                url: "<?= base_url() . 'guru/nilai'; ?>",
                                type: "POST",
                                data: {
                                    idPaketSoal: idpaketsoal
                                },
                                beforeSend: function() {
                                    $('.loader').show();
                                }
                            }).done(function(data) {
                                console.log(data);
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
                                    $('.loader').hide();
                                    if (result.value) {
                                        document.location.href = "<?= base_url('guru/bankSoal'); ?>";
                                    }
                                });
                            });

                        }
                    });
                });
            });
        });
    });
</script>