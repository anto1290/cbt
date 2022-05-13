<html>

<head>
    <title>Result Ujian</title>
    <!-- css bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/bootstrap.css'; ?>">
    <!-- css datatables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/datatables.css'; ?>">

    <!-- icon font awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/all.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/brands.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/solid.css'; ?>">
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/animate/animate.css'; ?>">
    <!-- js datatables -->
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <?php $uri3 = ($this->uri->segment(3));                          ?>

</head>

<body>
    <form action="<?= base_url() . 'siswa/nilai' . '/' . $uri3; ?>" method="post">
        <?php
        $uri3 = ($this->uri->segment(3));
        $uri4 = ($this->uri->segment(4));
        $nis = $this->session->userdata('nis');
        $kode = $this->session->userdata('kode');
        $Tingkatan = $this->session->userdata('Tingkatan');
        $d = $this->session->userdata('idjurusan');

        $Agama = $this->session->userdata('Agama');
        // $kelas = $this->db->query("SELECT * FROM kelas WHERE kodeKelas='$kode'")->row();
        $gr = $this->db->query("SELECT * FROM paketsoal AS PS,setujian AS SU WHERE PS.codeSoal='$uri3' AND SU.codeSoal=PS.codeSoal")->row();
        ?>
        <input type="hidden" name="bobotpg" id="bobotpg" value="<?= $gr->bobotpg; ?>">
        <input type="hidden" name="kodeGuru" id="kodeGuru" value="<?= $gr->kodeGuru; ?>">
        <input type="hidden" name="bobotesai" id="bobotesai" value="<?= $gr->bobotesai; ?>">
        <input type="hidden" name="persen_pg" id="persen_pg" value="<?= $gr->persenPg; ?>">
        <input type="hidden" name="persen_esai" id="persen_esai" value="<?= $gr->persenEsai; ?>">
        <input type="hidden" name="kodeMapel" id="kodeMapel" value="<?= $gr->kodeMapel; ?>">
        <input type="hidden" name="codeSoal" id="codeSoal" value="<?= $gr->codeSoal; ?>">
        <input type="hidden" name="JUjian" id="JUjian" value="<?= $gr->jenis_ujian; ?>">
        <input type="hidden" name="jurusan" id="jurusan" value="<?= $d; ?>">

        <div class="container">
            <br>
            <div class="header row">
                <div class="col-md-12">
                    <h2 class="header-tittle  animated infinity bounceInDown ">
                        Siswa Selesai Ujian
                    </h2>
                    <h6 class="sub-header-tittle  animated infinity bounceInDown ">
                        Perhatikan Tata Cara
                    </h6>
                </div>
            </div>
            <br>
            <div class="row mt-5">
                <div class="col-md-6 offset-3">
                    <p><i class="fab fa-gripfire"> </i><b>Ujian Telah Selesai Trimakasih</b></p>
                    <p><i class="fab fa-gripfire"> </i><b>Peserta Wajib Mengklik Tombol Logout</b></p>
                    <p><i class="fab fa-gripfire"> </i><b>Setelahnya Peserta Wajib Clear History Pada Browser Anda</b></p>
                    <p><i class="fab fa-gripfire"> </i><b>Jangan lupa selalu Restart Smartphone atau laptop agar tidak terjadi error pada ujian brikutnya</b></p>

                    <button class="btn btn-lg btn-success"><i class="far fa-check-square"></i> Logout</button>
                </div>
    </form>
    </div>
    </div>