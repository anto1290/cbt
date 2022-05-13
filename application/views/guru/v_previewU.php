<script src="<?= base_url() . 'assets/sweetJs/sweetalert2.all.min.js' ?>"></script>
<style>
    [type="radio"] {
        position: fixed;
        opacity: 0;
        width: 0;
        height: 0;
    }

    [type="radio"]+img {
        cursor: pointer;
    }

    .opsiGambar img {
        position: relative;
    }

    .opsiGambar img:hover {
        z-index: 100;
        background-image: url(<?= base_url() . 'gambar/bahan/pilih.png' ?>);
        opacity: 1;
    }

    .opsiGambar [type="radio"]:checked+img {
        background-image: url(<?= base_url() . 'gambar/bahan/pilih.png' ?>);
        z-index: 100;

    }
    .loader {
        position: absolute;
        width: 100% ;
        height: 100%;
        z-index: 110;
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
    <div class="loader">
        <img src="<?= base_url() . 'gambar/logo/preload.gif' ?>" alt="">
    </div>

 <div class="container-fluid">
     <?php
        $uri3 = ($this->uri->segment(3));
        $uri4 = ($this->uri->segment(4));
        $Agama = $this->session->userdata('Agama');
        $jawaban = $this->db->query("SELECT * FROM jawabpreview WHERE Nomor_soal=$uri4 AND codeSoal='$s->codeSoal' AND kodeMapel='$s->kodeMapel'  AND kodeGuru='$s->kodeGuru' AND jenis_soal='1'")->row();
        ?>
    <div class="Nomor">
        No : <?= $uri4; ?>
    </div>
     <form id="updateTest" action="#" method="post">
         <input type="hidden" name="idjawab" value="<?= $jawaban->idpreview; ?>">
         <input type="hidden" name="kodeMapel" value="<?= $jawaban->kodeMapel; ?>">
         <input type="hidden" name="codeSoal" value="<?= $jawaban->codeSoal; ?>">
         <input type="hidden" name="Nomor_soal" value="<?= $jawaban->Nomor_soal; ?>">
         <input type="hidden" name="kodeGuru" value="<?= $s->kodeGuru; ?>">
         <input type="hidden" name="jsoal" value="<?= $jawaban->jenis_soal; ?>">
         <input type="hidden" name="halaman" value="<?= $uri4; ?>">
         <br>
         <div class="row ">
             <div class="col-md-11">
                 <?php
                    $soal = $s->soal;
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
             </div>
         </div>
         <div class="row opsiGambar">
             <div class="col-md-1">
                 <h4><input <?php if ($jawaban->jawaban == "A") {
                                echo "checked";
                            } ?> class="ceked" type="radio" id="jawabA" value="A" name="jawaban">
                     <img onclick="check(0)" class="cek" id="A" src="<?= base_url() . 'gambar/bahan/A.png' ?>"> </h4>

             </div>
             <div class="col-md-11">
                 <h4>
                     <?= $s->opsi_a; ?>
                 </h4>
             </div>
         </div>
         <div class="row opsiGambar">
             <div class="col-md-1">
                 <h4><input <?php if ($jawaban->jawaban == "B") {
                                echo "checked";
                            } ?> class="ceked" type="radio" id="jawabB" value="B" name="jawaban">
                     <img onclick="check(1)" class="cek" id="B" src="<?= base_url() . 'gambar/bahan/B.png' ?>"> </h4>
             </div>
             <div class="col-md-11">
                 <h4>
                     <?= $s->opsi_b; ?>
                 </h4>
             </div>
         </div>
         <div class="row opsiGambar">
             <div class="col-md-1">
                 <h4><input <?php if ($jawaban->jawaban == "C") {
                                echo "checked";
                            } ?> class="ceked" type="radio" id="jawabC" value="C" name="jawaban">
                     <img onclick="check(2)" class="cek" id="C" src="<?= base_url() . 'gambar/bahan/C.png' ?>"> </h4>
             </div>
             <div class="col-md-11">
                 <h4>
                     <?= $s->opsi_c; ?>
                 </h4>
             </div>
         </div>
         <?php
            if ($s->opsi_d == NULL) {
            } else {
            ?>
             <div class="row opsiGambar">
                 <div class="col-md-1">
                     <h4><input <?php if ($jawaban->jawaban == "D") {
                                    echo "checked";
                                } ?> class="ceked" type="radio" id="jawabD" value="D" name="jawaban">
                         <img onclick="check(3)" class="cek" id="D" src="<?= base_url() . 'gambar/bahan/D.png' ?>">
                     </h4>
                 </div>
                 <div class="col-md-11">
                     <h4>
                         <?= $s->opsi_d; ?>
                     </h4>
                 </div>
             </div>
         <?php }
            if ($s->opsi_e == NULL) {
            } else { ?>
             <div class="row opsiGambar">
                 <div class="col-md-1">
                     <h4><input <?php if ($jawaban->jawaban == "E") {
                                    echo "checked";
                                } ?> class="ceked" type="radio" id="jawabE" value="E" name="jawaban">
                         <img onclick="check(4)" class="cek" id="E" src="<?= base_url() . 'gambar/bahan/E.png' ?>">
                     </h4>
                 </div>
                 <div class="col-md-11">
                     <h4>
                         <?= $s->opsi_e; ?>
                     </h4>
                 </div>
             </div>
         <?php } ?>
         <div class="footer">
             <hr>
             <!-- PHP -->
             <?php
                $tampil2 = $this->db->query("SELECT * FROM soal WHERE kodeMapel='$s->kodeMapel' AND kodeGuru='$s->kodeGuru' AND codeSoal='$s->codeSoal' AND jenis_soal=1 ")->num_rows();
                $jmlhalaman = ceil($tampil2 / 1);
                ?>
             <input type="hidden" name="jmlH" id="jmlH" value="<?= $jmlhalaman ?>">
             <div class="container">
                 <div class="row">
                     <div class="col-md-4">
                         <?php if ($uri4 > 1) {
                                $previous = $uri4 - 1; ?>
                             <a style="width:180px;" class="btn btn-success" href="<?= base_url() . 'guru/previewPG' . $uri3 . '/' . $previous; ?>"><i class="fas fa-arrow-alt-circle-left pull-left"></i> Previous</a>
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
                                $cekesay = $this->db->query("SELECT * FROM soal WHERE kodeMapel='$s->kodeMapel' AND kodeGuru='$s->kodeGuru' AND codeSoal='$s->codeSoal' AND jenis_soal=2")->num_rows();
                                $cekRagu = $this->db->query("SELECT * FROM jawabpreview WHERE codeSoal='$s->codeSoal' AND kodeMapel='$s->kodeMapel'  AND jenis_soal =1 AND Ragu=1")->num_rows();
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
     <br>
 </div>
 <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-3.4.1.min.js'; ?>"></script>
 <script>
     $(document).ready(function() {
          let base_url = "<?= base_url() . 'guru/previewPG/' . $uri3  ?>";
        let essay = "<?= base_url() . 'guru/previewEsay/' . $uri3  ?>";
         let uri4 = <?= $uri4 ?> + 1;
         $(".loader").hide();
         // From Update
         $('#updateTest').ready(function() {
             // Jika function selesai
             $('#nextUpdate').on('click', function() {
                 let idjawab = $('input:hidden[name=idjawab]').val();
                 let jawaban = $('input:radio[name=jawaban]:checked').val();
                 let kodeMapel = $('input:hidden[name=kodeMapel]').val();
                 let codeSoal = $('input:hidden[name=codeSoal]').val();
                 let Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
                 let halaman = $('input:hidden[name=halaman]').val();
                 let jsoal = $('input:hidden[name=jsoal]').val();
                 let id_guru = $('input:hidden[name=id_guru]').val();
                 let ragu = $('input:checkbox[name=ragu]:checked').val();
                 $.ajax({
                     url: "<?= base_url() . 'guru/previewAksiPGU'; ?>",
                     type: "POST",
                     data: {
                         idjawab: idjawab,
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
                     document.location.href = base_url + '/' + uri4;
                 });
             });
             $('.tombol-selesai').on('click', function() {
                 let idjawab = $('input:hidden[name=idjawab]').val();
                 let jawaban = $('input:radio[name=jawaban]:checked').val();
                 let kodeMapel = $('input:hidden[name=kodeMapel]').val();
                 let codeSoal = $('input:hidden[name=codeSoal]').val();
                 let Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
                 let halaman = $('input:hidden[name=halaman]').val();
                 let jsoal = $('input:hidden[name=jsoal]').val();
                 
                 let id_guru = $('input:hidden[name=id_guru]').val();
                 let ragu = $('input:checkbox[name=ragu]:checked').val();
                 $.ajax({
                     url: "<?= base_url() . 'guru/previewAksiPGU'; ?>",
                     type: "POST",
                     data: {
                         idjawab: idjawab,
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
                             }).done(function(dat) {
                                console.log(dat);
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
                                         document.location.href = "<?= base_url('guru/bankSoal'); ?>";
                                     }
                                 });
                             });
                         }
                     });
                 });

             });
             // Update dan Pindah Ke Esay
             $('#pindah-esai').on('click', function() {
                 let idjawab = $('input:hidden[name=idjawab]').val();
                 let jawaban = $('input:radio[name=jawaban]:checked').val();
                 let kodeMapel = $('input:hidden[name=kodeMapel]').val();
                 let codeSoal = $('input:hidden[name=codeSoal]').val();
                 let Nomor_soal = $('input:hidden[name=Nomor_soal]').val();
                 let halaman = $('input:hidden[name=halaman]').val();
                 let jsoal = $('input:hidden[name=jsoal]').val();
                 
                 let id_guru = $('input:hidden[name=id_guru]').val();
                 let ragu = $('input:checkbox[name=ragu]:checked').val();
                 $.ajax({
                     url: "<?= base_url() . 'guru/previewAksiPGU'; ?>",
                     type: "POST",
                     data: {
                         idjawab: idjawab,
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
                     document.location.href = "<?= base_url() . 'guru/previewEsay/' . $uri3 . '/1'; ?>"
                 });
             });
             // function update
             let fup = document.getElementById('updateTest').querySelectorAll('.ceked');
             let jawbaanup = "<?= $jawaban->jawaban; ?>";
             for (o = 0; 0 < fup.length; o++) {
                 let b = fup[o].value;
                 if (b == jawbaanup) {
                     checkup(o);
                 }
             }

             function uncheckup(set) {
                 for (i = 0; i < document.querySelectorAll('img.cek').length; i++) {
                     if (document.querySelectorAll('img.cek')[set].id != document.querySelectorAll('img.cek')[i].id) {
                         let y = document.querySelectorAll('img.cek')[i].id;
                         let w = document.getElementById(y);
                         w.setAttribute('src', '<?= base_url() . 'gambar/bahan/' ?>' + y + '.png')
                     }
                 }
             }

             function checkup(nomor) {
                 uncheckup(nomor)
                 let x = document.querySelectorAll('img.cek')[nomor].id;
                 document.getElementById('jawab' + x).checked = true;
                 let z = document.getElementById(x);
                 z.setAttribute('src', '<?= base_url() . 'gambar/bahan/pilih.png' ?>')
             }
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