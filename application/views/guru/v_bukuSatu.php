<div class="container-fluid">
    <div class="header row">
        <div class="col-md-12">
            <h2 class="header-tittle  animated infinity bounceInDown ">
                Buku Satu
            </h2>
            <h6 class="sub-header-tittle  animated infinity bounceInDown ">
                Administrasi Buku Guru Satu
            </h6>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-skl ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white wow" >Standar Kompetensi Lulusan</h5>
                        </div>
                        <div class="card-footer">
                            
                                <a type="button" href="<?= base_url().'guru/skl' ?>" class="btn text-white" style="background: linear-gradient(90deg, rgba(32,61,209,1) 0%, rgba(37,149,245,1) 100%);" >Membuat SKL</a>
                           
                        </div>
                    </div>
                </div><!-- Akhir -->
                <div class="col-md-3">
                    <div class="card bg-kikd ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white wow" >Kompetensi Inti & Kompetensi Dasar</h5>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="" class="btn text-white"  style="background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);" >Membuat KI & KD</a>
                        </div>
                    </div>
                </div><!-- Akhir -->
                <div class="col-md-3">
                    <div class="card bg-silabus ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white wow" >Silabus</h5>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="" class="btn text-white" style=" background: linear-gradient(90deg, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);" >Membuat Silabus</a>
                        </div>
                    </div>
                </div><!-- Akhir -->
                <div class="col-md-3">
                    <div class="card bg-rpp ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white wow" >Rencana pelaksanaan pembelajaran</h5>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="" class="btn text-white" style="background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);" >Membuat RPP</a>
                        </div>
                    </div>
                </div><!-- Akhir -->
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-skbm ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white wow" >Standar Ketutansan Belajar Minimum</h5>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="" class="btn text-white" style="background: linear-gradient(0deg, rgba(255,123,92,1) 0%, rgba(255,211,92,1) 100%);" >Membuat SKBM</a>
                        </div>
                    </div>
                </div><!-- Akhir -->
            </div>    
        </div>
    </div>
</div>
<style>
.card-body{
    height:146px;
    }
.card.bg-skl {
    background: linear-gradient(90deg, rgba(32,61,209,1) 0%, rgba(37,149,245,1) 100%);
}
.card.bg-kikd {
    background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
}
.card.bg-silabus {
    background: linear-gradient(90deg, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);
}
.card.bg-rpp {
    background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);
}
.card.bg-skbm {
    background: linear-gradient(0deg, rgba(255,123,92,1) 0%, rgba(255,211,92,1) 100%);
}
.card .card-footer a {
    width:100%;
    height:100%;
    
}
.icon {
    color : #FFF;
    width:30px;
    height:30px;
}
</style>