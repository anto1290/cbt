<div class="container-fluid">
    <div class="header row">
        <div class="col-md-12">
            <h2 class="header-tittle  animated infinity bounceInDown ">
                Buku Dua
            </h2>
            <h6 class="sub-header-tittle  animated infinity bounceInDown ">
                Administrasi Buku Guru Dua
            </h6>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-kode ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white wow" >Kode Etik Guru</h5>
                        </div>
                        <div class="card-footer">
                            
                                <a type="button" href="<?= base_url().'Cetakpdf/cetakEtik';?>" class="btn text-white" style="background: linear-gradient(90deg, rgba(32,61,209,1) 0%, rgba(37,149,245,1) 100%);" >Cetak Kode Etik</a>
                           
                        </div>
                    </div>
                </div><!-- Akhir -->
                <div class="col-md-3">
                    <div class="card bg-ikrar ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white" >Ikrar Guru</h5>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="<?= base_url().'Cetakpdf/ikrarGuru';?>" class="btn text-white"  style="background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);" >Cetak Ikrar Guru</a>
                        </div>
                    </div>
                </div><!-- Akhir -->
                <div class="col-md-3">
                    <div class="card bg-tertib ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white wow" >Tata Tertib</h5>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="<?= base_url().'Cetakpdf/tertibGuru';?>" class="btn text-white" style=" background: linear-gradient(90deg, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);" >Cetak Tata Tertib</a>
                        </div>
                    </div>
                </div><!-- Akhir -->
                <div class="col-md-3">
                    <div class="card bg-pembiasaan ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white wow" >Pembiasaan Guru</h5>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="<?= base_url().'Cetakpdf/pembiasaan';?>" class="btn text-white" style="background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);" >Cetak Pembiasaan</a>
                        </div>
                    </div>
                </div><!-- Akhir -->
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-kal ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white wow" >Kalender Akademik Sekolah</h5>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="" class="btn text-white" style="background: linear-gradient(0deg, rgba(255,123,92,1) 0%, rgba(255,211,92,1) 100%);" >Cetak Kalender</a>
                        </div>
                    </div>
                </div><!-- Akhir -->
                <div class="col-md-3">
                    <div class="card bg-waktu ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white wow" >Alokasi Waktu</h5>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="" class="btn text-white" style="background: linear-gradient(0deg, rgba(26,188,156,1) 0%, rgba(54,216,255,1) 100%);" >Membuat Alokasi Waktu</a>
                        </div>
                    </div>
                </div><!-- Akhir -->
                <div class="col-md-3">
                    <div class="card bg-prota ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white wow" >Program Tahunan</h5>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="" class="btn text-white" style="background: linear-gradient(90deg, rgba(32,61,209,1) 0%, rgba(54,216,255,1) 50%, rgba(37,149,245,1) 100%);" >Membuat Prota</a>
                        </div>
                    </div>
                </div><!-- Akhir -->
                <div class="col-md-3">
                    <div class="card bg-prosem ">
                        <div class="card-body">
                            <p><i class="fa fa-book icon" ></i></p>
                            <h5 class="text-white wow" >Program Semester</h5>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="" class="btn text-white" style="background: radial-gradient(circle, rgba(37,149,245,1) 0%, rgba(54,216,255,1) 100%);" >Membuat Prosem</a>
                        </div>
                    </div>
                </div><!-- Akhir -->
            </div>    
        </div>
    </div>
</div>
<br>
<br>
<br>    
<style>
.card-body{
    height:146px;
    }
.card.bg-kode {
    background: linear-gradient(90deg, rgba(32,61,209,1) 0%, rgba(37,149,245,1) 100%);
}
.card.bg-ikrar {
    background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
}
.card.bg-tertib {
    background: linear-gradient(90deg, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);
}
.card.bg-pembiasaan {
    background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);
}
.card.bg-kal {
    background: linear-gradient(0deg, rgba(255,123,92,1) 0%, rgba(255,211,92,1) 100%);
}
.card.bg-waktu {
    background: linear-gradient(0deg, rgba(26,188,156,1) 0%, rgba(54,216,255,1) 100%);
}
.card.bg-prota {
    background: linear-gradient(90deg, rgba(32,61,209,1) 0%, rgba(54,216,255,1) 50%, rgba(37,149,245,1) 100%);
}
.card.bg-prosem {
    background: radial-gradient(circle, rgba(37,149,245,1) 0%, rgba(54,216,255,1) 100%);
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