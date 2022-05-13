<?php $uri3 = ($this->uri->segment(3)); ?>
<!DOCTYPE html>
<html lang="en" translate="no">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Siswa - System CBT SMK Darmawan Sentul</title>
  <!-- css bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/bootstrap.css'; ?>">

  <!-- icon font awesome -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/all.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/brands.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/solid.css'; ?>">


  <!-- CSS Sendiri -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/admin.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/animate/animate.css'; ?>">
  <!-- JS MATH AJAX -->
  <script type="text/javascript" async src="<?= base_url() . 'assets/MathJax/es5/tex-mml-chtml.js'; ?>"></script>

  <!-- JQUERY -->
  <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery.js'; ?>"></script>
  <script src="<?= base_url() . 'assets/sweetJs/sweetalert2.all.min.js' ?>"></script>
</head>

<body>
  <?php

  $waktu_mulai = $this->db->query("SELECT lamaUjian FROM setujian WHERE codeSoal='$uri3'")->row();
  $temp_waktu = ($waktu_mulai->lamaUjian * 60) - $lewat; //dijadikan detik dan dikurangi waktu yang berlalu
  $temp_menit = (int) ($temp_waktu / 60);                //dijadikan menit lagi
  $temp_detik = $temp_waktu % 60;                       //sisa bagi untuk detik

  if ($temp_menit < 60) {
    /* Apabila $temp_menit yang kurang dari 60 meni */
    $jam    = 00;
    $menit  = $temp_menit;
    $detik  = $temp_detik;
    $finish = $menit - 20;
  } else {
    /* Apabila $temp_menit lebih dari 60 menit */
    $jam    = (int) ($temp_menit / 60);    //$temp_menit dijadikan jam dengan dibagi 60 dan dibulatkan menjadi integer 
    $menit  = $temp_menit % 60;           //$temp_menit diambil sisa bagi ($temp_menit%60) untuk menjadi menit
    $detik  = $temp_detik;
    $finish = $menit - 13;
  }
  ?>
  <!-- non aktif klik kanan -->
  <script type="text/javascript">
    function mousedwn(e) {
      try {
        if (event.button == 2 || event.button == 3) return false
      } catch (e) {
        if (e.which == 3) return false
      }
    }
    document.oncontextmenu = function() {
      return false
    };
    document.ondragstart = function() {
      return false
    };
    document.onmousedown = mousedwn
  </script>
  <!-- Fulll Screen -->
  <script type="text/javascript">
    // let el = document.documentElement,
    //   rfs = // for newer Webkit and Firefox
    //   el.requestFullScreen ||
    //   el.webkitRequestFullScreen ||
    //   el.mozRequestFullScreen ||
    //   el.msRequestFullscreen;

    // rfs.call(el);
    // Non Aktif keyboard
    // jQuery(document).keydown(function(event) {
    //   if (event.keyCode == 122) {
    //     return false;
    //   } else if (event.keyCode == 123) {
    //     return false;
    //   } else if (event.keyCode == 27) {
    //     return false;
    //   } else if (event.keyCode == 112) {
    //     return false;
    //   } else if (event.keyCode == 17) {
    //     return false;
    //   } else if (event.keyCode == 9) {
    //     return false;
    //   }
    // });
  </script>
  <!-- Countdown -->
  <script>
    $(document).ready(function() {
      /** Membuat Waktu Mulai Hitung Mundur Dengan
       * let detik = 0,
       * let menit = 1,
       * let jam = 1
       */
      let detik = "<?= $detik; ?>";
      let menit = "<?= $menit; ?>";
      let jam = "<?= $jam; ?>";
      let finish = "<?= $finish; ?>";

      /**
       * Membuat function hitung() sebagai Penghitungan Waktu
       */
      function hitung() {
        /** setTimout(hitung, 1000) digunakan untuk
         * mengulang atau merefresh halaman selama 1000 (1 detik)
         */
        setTimeout(hitung, 1000);

        /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
        if (menit < 10 && jam == 0) {
          var peringatan = 'style="color:red"';
        };
        if (jam < 10) {
          var ja = '0';
          var jme = '';
        } else if (menit < 10) {
          var ja = '0';
          var jme = '0';
        }
        /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
        $('#timer').html(
          '<h5 ' + peringatan + '>Sisa waktu anda <br>' + ja + jam + ' : ' + jme + menit + ' : ' + detik + '</h5>'
        );
        // Update
        // if (finish > 0 && jam == 0) {
        //   $('.tombol-selesai').ready(function() {
        //     $('.finishTime').text(jam + ':' + finish);
        //     $('.tombol-selesai').attr("disabled", true);
        //   });
        //   $('.submit').ready(function() {
        //     $('.finishTime').text(jam + ':' + finish);
        //     $('.submit').attr("disabled", true);
        //   });
        // } else if (finish == 0 && jam == 0) {
        //   $('.tombol-selesai').ready(function() {
        //     $('.finishTime').text(jam + ':' + finish);
        //     $('.tombol-selesai').attr("Enable", true);
        //   });
        //   $('.submit').ready(function() {
        //     $('.finishTime').text(jam + ':' + finish);
        //     $('.submit').attr("Enable", true);
        //   });
        // }
        // Blom Update
        /** Melakukan Hitung Mundur dengan Mengurangi letiabel detik - 1 */
        detik--;

        /** Jika let detik < 0
         * let detik akan dikembalikan ke 59
         * Menit akan Berkurang 1
         */
        if (detik < 0) {
          detik = 59;
          menit--;
          finish--;
          if (finish == 0) {
            finish = 0;
            window.setTimeout(location.reload(), 3000);
          }
          if (finish < 0) {
            finish = 0;
          }
          /** Jika menit < 0
           * Maka menit akan dikembali ke 59
           * Jam akan Berkurang 1
           */
          if (menit < 0) {
            menit = 59;
            jam--;

            /** Jika let jam < 0
             * clearInterval() Memberhentikan Interval dan submit secara otomatis
             */
            if (jam < 0) {
              clearInterval();
              // alert ("Maaf waktu anda habis dan waktu tes telah selesai"); 
              let x = "<?= base_url() . 'siswa/nilai/' . $uri3; ?>";
              habis(x);
            }
          }
        }

        function habis(x) {
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
              document.location.href = x;
            }
          })
        }
      }
      /** Menjalankan Function Hitung Waktu Mundur */
      hitung();
    });
  </script>