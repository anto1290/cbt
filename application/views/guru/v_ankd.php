<div class="container-fluid">
<div class="header row">
        <div class="col-md-12">
            <h2 class="header-tittle  animated infinity bounceInDown ">
                Analisa Kompetensi Dasar
            </h2>
            <h6 class="sub-header-tittle  animated infinity bounceInDown ">
                Administrasi Buku Guru Satu
            </h6>
        </div>
    </div>
    <br>
    <br>
    <div class="col-md-12">
    <div class="row">
    <form action="<?= base_url().'guru/buatKode'; ?>" method="post">
        <input type="hidden" name="kodeMapel" value="<?= $kodeMapel; ?>">
        <input type="hidden" name="idmengajar" value="<?= $idmengajar; ?>">
        <div class="form-group">
        <label class="font-weight-bold" for="nomor">Create Nomor KD</label>
        <button class="btn btn-info form-control" ><i class="fas fa-atlas" ></i> Buat Nomor KD</button>
        </div>
    </form>
    </div>
    <br>
    <hr>
    <br>
        <div class="row">
            <?php if($kodeMapel === "A008" || $kodeMapel === "A006") {?>
                <div class="col-md-4 offset-1">
                <div class="card">
                    <div class="card-body">
                    <i class="fas fa-book-open" ></i>
                    <h4>Analisa Kompetensi Dasar 1 & 2</h4>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4 offset-1">
                                <form action="" method="post">
                                    <input type="hidden" name="kodeMapel" value="<?= $kodeMapel; ?>">
                                    <input type="hidden" name="idmengajar" value="<?= $idmengajar; ?>">
                                    <button class="btn btn-primary" >Buat Analisa</button>
                                </form>
                            </div>
                            <div class="col-md-4 offset-1">
                                <form action="" method="post">
                                    <input type="hidden" name="kodeMapel" value="<?= $kodeMapel; ?>">
                                    <input type="hidden" name="idmengajar" value="<?= $idmengajar; ?>">
                                    <button class="btn btn-primary" >Lihat Analisa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset-1">
                <div class="card">
                    <div class="card-body">
                    <i class="fas fa-book-open" ></i>
                    <h4>Analisa Kompetensi Dasar 3 & 4</h4>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4 offset-1">
                                <form action="" method="post">
                                    <button class="btn btn-primary" >Buat Analisa</button>
                                </form>
                            </div>
                            <div class="col-md-4 offset-1">
                                <form action="" method="post">
                                    <button class="btn btn-primary" >Lihat Analisa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else{?>
                <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    <i class="fas fa-book-open" ></i>
                    <h4>Analisa Kompetensi Dasar 3 & 4</h4>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4 offset-1">
                                <form action="" method="post">
                                    <button class="btn btn-primary" >Buat Analisa</button>
                                </form>
                            </div>
                            <div class="col-md-4 offset-1">
                                <form action="" method="post">
                                    <button class="btn btn-primary" >Lihat Analisa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php } ?>
        </div>
    </div>


    </div>
</div>