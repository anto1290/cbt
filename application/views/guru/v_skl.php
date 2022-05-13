<div class="container-fluid">
<div class="header row">
        <div class="col-md-12">
            <h2 class="header-tittle  animated infinity bounceInDown ">
                Analisa SKL dan KI KD
            </h2>
            <h6 class="sub-header-tittle  animated infinity bounceInDown ">
                Administrasi Buku Guru Satu
            </h6>
        </div>
    </div>
    <br>
    <div class="col-md-12">
    <?php foreach($grab AS $gb) : ?>
        Mapel : <?= $gb->Nama_mapel ;?> Kelas <?= $gb->tingkatan; ?>
        <div class="row">
            <div class="col-md-4">
                <div class="card skl">
                    <div class="card-body">
                    <i class="fa fa-book-reader" style="font-size:25px; color:white;"></i>
                        <h4 style="color:white;" >Analisa Kompetensi Inti</h4>
                    </div>
                    <div class="card-footer">
                       <div class="row">
                            <div class="col-md-6">
                                <form action="<?= base_url().'guru/sklKomInti' ?>" method="post">
                                <input type="hidden" name="kodeMapel" id="kodeMapel" value="<?= $gb->kodeMapel; ?>">
                                <input type="hidden" name="idmengajar" id="idmengajar" value="<?= $gb->idmengajar; ?>">
                                <button class="btn btn-primary" >Buat Analisa</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="<?= base_url().'guru/vskl'; ?>" method="post">
                                <input type="hidden" name="kodeMapel" id="kodeMapel" value="<?= $gb->kodeMapel; ?>">
                                <input type="hidden" name="idmengajar" id="idmengajar" value="<?= $gb->idmengajar; ?>">
                                <button class="btn btn-info" style="width:112px; height:38px;" >View</button>
                                </form>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card kikd">
                    <div class="card-body">
                    <i class="fa fa-book-reader" style="font-size:25px; color:white;"></i>
                        <h4 style="color:white;" >Analisa Kompetensi Dasar</h4>
                    </div>
                    <div class="card-footer">
                        <form action="<?= base_url().'guru/ankd';?>" method="post">
                            <input type="hidden" name="kodeMapel" id="kodeMapel" value="<?= $gb->kodeMapel; ?>">
                            <input type="hidden" name="idmengajar" id="idmengajar" value="<?= $gb->idmengajar; ?>">
                            <button class="btn btn-primary" >Buat Analisa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php endforeach; ?>
    </div>
    <br>
    <br>
</div>
<style>
.skl{
    background: linear-gradient(90deg, rgba(32,61,209,1) 0%, rgba(37,149,245,1) 100%);
}
.kikd{
    background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
}
</style>