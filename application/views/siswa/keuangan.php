<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- css bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/bootstrap.css'; ?>">
    <!-- icon font awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/all.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/brands.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/solid.css'; ?>">
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/animate/animate.css'; ?>">
</head>
<body>
<div class="container">
    <div class="card mx-auto mt-5" style="max-width: 50%; min-height:200px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('gambar/bahan/keuangan.png') ?>" class="card-img" alt="keuangan">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Maaf,<?= $siswa->nama_siswa; ?></h5>
                <p class="card-text">Akun anda untuk sementara di tangguhkan. Silahkan Hubungi bagian keuangan SMK Darmawan</p>
                <p class="card-text" >hotline : <i class="fa fa-phone" > </i> (021)-87951526</p>
                <button id="kembali" class="btn btn-primary" ><i class="fa fa-arrow-alt-circle-left" ></i> Kembali</button>
            </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-3.4.1.min.js'; ?>"></script>
<script>
$(document).ready(function(){
    $('#kembali').click(function(){
        document.location.href="<?= base_url().'siswa/logout'; ?>"
    })
})
</script>
<script src="<?= base_url() . 'assets/js/popper.min.js'; ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/bootstrap.js'; ?>"></script>
</body>
</html>