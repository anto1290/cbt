<?php
$uri3 = ($this->uri->segment(3));
$uri4 = ($this->uri->segment(4));
$Agama = $this->session->userdata('Agama');
$tampil2 = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND S.codeSoal='$uri3' AND (S.Tingkatan='$Tingkatan'OR S.Tingkatan='All')AND (PS.Jurusan='$jurusan->nama' OR PS.Jurusan = 'ALL') AND jenis_soal = '2'  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK'OR SU.jenis_ujian='TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->num_rows();
$jmlhalaman = ceil($tampil2 / 1);
?>
<?php if ($uri4 <= $jmlhalaman) { ?>
    <script type="text/javascript">
        function showHidehcr() {
            let hcr = document.getElementById("hcr");
            let w = hcr.offsetWidth;
            hcr.opened ? movehcr(0, 10 - w) : movehcr(5 - w, 0);
            hcr.opened = !hcr.opened;
        }

        function movehcr(x0, xf) {
            let hcr = document.getElementById("hcr");
            let dx = Math.abs(x0 - xf) > 10 ? 5 : 1;
            let dir = xf > x0 ? 1 : -1;
            let x = x0 + dx * dir;
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
            <div class="font-weight-bold" style="padding-bottom:20px; font-size:14px; color:#0066CC">Soal Esai</div>
            <?php
            $f = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND SU.codeSoal='$uri3' AND (S.Tingkatan='$Tingkatan' OR S.Tingkatan='All')AND (PS.Jurusan='$jurusan->nama' OR PS.Jurusan = 'ALL') AND jenis_soal=2  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK'OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->result();
            $no = 1; ?>
            <?php foreach ($f as $j) {
                $j->id_soal = $no++;
                $Jawabb = $this->db->query("SELECT * FROM jawaban WHERE Nomor_test = $j->id_soal AND codeSoal='$uri3' AND kodeMapel='$s->kodeMapel'  AND nis = $siswa AND jenis_soal='2'")->row();
                if ($Jawabb != null) { ?>
                    <?php if ($Jawabb->Ragu != 1) { ?>
                        <a style="width:50px; " class="border rounded bg-info btn btn-primary" href="<?= base_url() . 'siswa/esay/' . $uri3 . '/' . $j->id_soal; ?>"><?php echo "$j->id_soal" . $Jawabb->jawaban; ?></a>
                    <?php } else { ?>
                        <a style="width:50px; " class="border rounded bg-warning btn btn-warrning" href="<?= base_url() . 'siswa/esay/' . $uri3 . '/' . $j->id_soal; ?>"><?php echo "$j->id_soal" . $Jawabb->jawaban; ?></a>
                    <?php
                    }
                } else { ?>
                    <a style="width:50px; " class="border rounded bg-info btn btn-primary" href="<?= base_url() . 'siswa/esay/' . $uri3 . '/' . $j->id_soal; ?>"><?php echo "$j->id_soal" ?></a>
                <?php
                }
                ?>
            <?php } ?>


            <br>
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
        let hcr = document.getElementById("hcr");
        hcr.style.right = (23 - hcr.offsetWidth).toString() + "px";
    </script>

<?php } ?>
<script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-3.4.1.min.js'; ?>"></script>
<script>
    $(document).ready(function() {
        let base_url = "<?= base_url() . 'siswa/esay/' . $uri3; ?>";
        let uri4 = parseInt("<?= $uri4; ?>") + 1;
        $(".loader").hide();
        $('#updateTest').ready(function() {
            $('#nextup').on('click', function() {
                let jawaban = $("textarea[name=jawaban]").val();
                let idjawab = $('input:hidden[name=idjawab]').val();
                let ragu = $('input:checkbox[name=ragu]:checked').val();
                $.ajax({
                    url: "<?= base_url() . 'siswa/test_updateAEsay'; ?>",
                    type: "POST",
                    data: {
                        jawaban: jawaban,
                        idjawab: idjawab,
                        ragu: ragu
                    },
                    beforeSend: function() {
                        $('.loader').show();
                    }

                }).done(function(data) {
                    $(".loader").hide();
                    document.location.href = `${base_url}/${uri4}`;
                })
            });
            $('.tombol-selesai').on('click', function() {
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
                        let jawaban = $("textarea[name=jawaban]").val();
                        let idjawab = $('input:hidden[name=idjawab]').val();
                        let ragu = $('input:checkbox[name=ragu]:checked').val();
                        $.ajax({
                            url: "<?= base_url() . 'siswa/test_updateAEsay'; ?>",
                            type: "POST",
                            data: {
                                jawaban: jawaban,
                                idjawab: idjawab,
                                ragu: ragu
                            },
                            beforeSend: function() {
                                $('.loader').show();
                            }
                        }).done(function(data) {
                            let codeSoal = "<?= $uri3; ?>";
                            $.ajax({
                                url: "<?= base_url() . 'siswa/nilai'; ?>",
                                type: "POST",
                                data: {
                                    codeSoal: codeSoal
                                }
                            }).done(function() {
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
                                        document.location.href = "<?= base_url('siswa/logoutSelesai'); ?>";
                                    }
                                });
                            });
                        });
                    }
                });
            });
        });


        $('#nextaja').ready(function() {
            $('#nextAksi').on('click', function() {
                let jawaban = $("textarea[name=jawaban]").val();
                let kodeMapel = $('input:hidden[name=kodeMapel]').val();
                let codeSoal = $('input:hidden[name=codeSoal]').val();
                let Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
                let halaman = $('input:hidden[name=halaman]').val();
                let jsoal = $('input:hidden[name=jsoal]').val();
                let idsiswa = $('input:hidden[name=idsiswa]').val();
                let id_guru = $('input:hidden[name=id_guru]').val();
                let ragu = $('input:checkbox[name=ragu]:checked').val();
                $.ajax({
                    url: "<?= base_url('siswa/test_aksiE'); ?>",
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
            $('.tombol-selesai').on('click', function() {
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
                        let jawaban = $("textarea[name=jawaban]").val();
                        let kodeMapel = $('input:hidden[name=kodeMapel]').val();
                        let codeSoal = $('input:hidden[name=codeSoal]').val();
                        let Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
                        let halaman = $('input:hidden[name=halaman]').val();
                        let jsoal = $('input:hidden[name=jsoal]').val();
                        let idsiswa = $('input:hidden[name=idsiswa]').val();
                        let id_guru = $('input:hidden[name=id_guru]').val();
                        let ragu = $('input:checkbox[name=ragu]:checked').val();
                        $.ajax({
                            url: "<?= base_url() . 'siswa/test_aksiE'; ?>",
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
                        }).done(function(data) {
                            let codeSoal = "<?= $uri3; ?>";
                            $.ajax({
                                url: "<?= base_url() . 'siswa/nilai'; ?>",
                                type: "POST",
                                data: {
                                    codeSoal: codeSoal
                                }
                            }).done(function() {
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
                                        document.location.href = "<?= base_url('siswa/logoutSelesai'); ?>";
                                    }
                                });
                            });
                        });
                    }
                });
            });
        })
        $('#submit').on('click', function() {
            $('#nextaja').submit();
        });
        // let count = 45;
        // let mysetdetik;
        // function starthalder() {
        //     let kodeMapel = $('input:hidden[name=kodeMapel]').val();
        //     let codeSoal = $('input:hidden[name=codeSoal]').val();
        //     let x = count--;
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
        //     count = 45;
        // });
        $('#tombol-ragu').on('click', function() {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'JAWABAN TIDAK BOLEH RAGU - RAGU!!!',
            });
        });
    });
</script>