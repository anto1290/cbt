<?php
$uri3 = ($this->uri->segment(3));
$uri4 = ($this->uri->segment(4));
$Agama = $this->session->userdata('Agama');
$jawaban = $this->db->query("SELECT * FROM jawaban WHERE Nomor_test=$uri4 AND codeSoal='$uri3' AND kodeMapel='$s->kodeMapel'  AND nis = $siswa AND jenis_soal='1'")->row();
$tampil2 = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND S.codeSoal='$uri3' AND (S.Tingkatan='$Tingkatan' OR S.Tingkatan='All')AND (PS.Jurusan='$jurusan->nama' OR PS.Jurusan = 'ALL') AND jenis_soal = '1'  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK' OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->num_rows();
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
                        <a style="width:50px; " class="border rounded bg-info btn btn-primary" href="<?= base_url() . 'siswa/pg/' . $uri3 . '/' . $j->id_soal; ?>"><?php echo "$j->id_soal" . $Jawabb->jawaban; ?></a>
                    <?php } else { ?>
                        <a style="width:50px; " class="border rounded bg-warning btn btn-warrning" href="<?= base_url() . 'siswa/pg/' . $uri3 . '/' . $j->id_soal; ?>"><?php echo "$j->id_soal" . $Jawabb->jawaban; ?></a>
                    <?php
                    }
                } else { ?>
                    <a style="width:50px; " class="border rounded bg-info btn btn-primary" href="<?= base_url() . 'siswa/pg/' . $uri3 . '/' . $j->id_soal; ?>"><?php echo "$j->id_soal" ?></a>
                <?php
                }
                ?>

            <?php

            }
            ?>

            <br />
            <!-- <div class="font-weight-bold" style="padding-bottom:20px; font-size:14px; color:#0066CC">Soal Esai</div>
            <?php
            $f = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON  SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND SU.codeSoal='$uri3' AND (S.Tingkatan='$Tingkatan' OR S.Tingkatan='All')AND (PS.Jurusan='$jurusan->nama' OR PS.Jurusan = 'ALL') AND jenis_soal=2  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK'OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->result();
            $no = 1; ?>
            <?php foreach ($f as $j) {
                $j->id_soal = $no++; ?>
                <a class="border rounded bg-info btn btn-primary" href="<?= base_url() . 'siswa/esay/' . $uri3 . '/' . $j->id_soal; ?>"><?php echo "$j->id_soal"; ?></a>
            <?php } ?> -->


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
<script>
    $(document).ready(function() {
        // let count = 45;
        // let mysetdetik;

        // function starthalder() {
        //     let kodeMapel = $('input:hidden[name=kodeMapel]').val();
        //     let codeSoal = $('input:hidden[name=codeSoal]').val();
        //     let x = count--;
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
        //     count = 45;
        // });

        $('#tombol-ragu').on('click', function() {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'JAWABAN TIDAK BOLEH RAGU - RAGU!!!',
            })
        });
        $("body").on("contextmenu", function(e) {
            return false;
        });

    });
</script>
<script type="text/javascript">
    function uncheck(set) {
        for (i = 0; i < document.querySelectorAll('img.cek').length; i++) {
            if (document.querySelectorAll('img.cek')[set].id != document.querySelectorAll('img.cek')[i].id) {
                let y = document.querySelectorAll('img.cek')[i].id;
                let w = document.getElementById(y);
                w.setAttribute('src', '<?= base_url() . 'gambar/bahan/' ?>' + y + '.png')

            }
        }

    }

    function check(nomor) {
        uncheck(nomor)
        let x = document.querySelectorAll('img.cek')[nomor].id;
        document.getElementById('jawab' + x).checked = true;
        let z = document.getElementById(x);
        z.setAttribute('src', '<?= base_url() . 'gambar/bahan/pilih.png' ?>')
    }
</script>