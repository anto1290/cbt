<div class="container-fluid">
    <div class="header row">
        <div class="col-md-12">
            <h2 class="header-tittle  animated infinity bounceInDown ">
                Membuat Analisa KI
            </h2>
            <h6 class="sub-header-tittle  animated infinity bounceInDown ">
                Administrasi Buku Guru Satu
            </h6>
        </div>
    </div>
    <br>
    <center><h4>Analisa Kompetensi Inti</h4></center>
    <?php 
     $id = $this->session->userdata('id');
    if($kodeMapel === 'A008' || $kodeMapel === 'A006'){ ?>
        <form action="<?= base_url().'guru/aksiSkl' ;?>" method="post">
        <input type="hidden" name="kodeMapel" id="kodeMapel" value="<?= $kodeMapel; ?>">
        <input type="hidden" name="id" id="id" value="<?= $id; ?>">
        <input type="hidden" name="idmengajar" id="idmengajar" value="<?= $idmengajar; ?>">
        <div class="form-group">
                <label for="ki1" class="font-weight-bold">Kompetensi Inti 1</label>
                <center><p class="font-weight-bold" >SIKAP SPRITUAL</p></center>
                <textarea class="form-control" name="ki1" id="ki1" cols="30" rows="10"></textarea>
                <p>Keterangan :Kompetensi Inti Sikap Spritual (KI-1) berdasarkan KI-KD mata pelajaran/silabus</p>
            </div>    
            <div class="form-group">
                <label for="ki2" class="font-weight-bold">Kompetensi Inti 2</label>
                <center><p class="font-weight-bold" >SIKAP SOSIAL</p></center>
                <textarea class="form-control" name="ki2" id="ki2" cols="30" rows="10"></textarea>
                <p>Keterangan :Kompetensi Inti Sikap Sosial (KI-2) berdasarkan KI-KD mata pelajaran/silabus</p>
            </div>    
            <div class="form-group">
                <label for="analisa1" class="font-weight-bold">ANALISIS DAN REKOMENDASI KI</label>
                <center><p class="font-weight-bold" ></p></center>
                <textarea class="form-control" name="analisa1" id="analisa1" cols="30" rows="10"></textarea>
                <p>Keterangan :Analisis: KI-1 dan KI-2 mata pelajaran untuk tingkat program pendidikan 3 tahun/4 tahun (sesuai ranah /tidak sesuai ranah)</p>
                <b>Rekomendasi: sesuai / tidak sesuai tingkat program pendidikan (pilih salah satu), jika tidak sesuai cantumkan KI yang sesuai tingkat program pendidikan.</b>
            </div> 
        <div class="form-group">
                <label for="ki3" class="font-weight-bold">Kompetensi Inti 3</label>
                <center><p class="font-weight-bold" >Pengetahuan</p></center>
                <textarea class="form-control" name="ki3" id="ki3" cols="30" rows="10"></textarea>
                <p>Keterangan :Kompetensi Inti Pengetahuan (KI-3) berdasarkan KI-KD mata pelajaran/silabus</p>
            </div>    
            <div class="form-group">
                <label for="ki4" class="font-weight-bold">Kompetensi Inti 4</label>
                <center><p class="font-weight-bold" >Keterampilan</p></center>
                <textarea class="form-control" name="ki4" id="ki4" cols="30" rows="10"></textarea>
                <p>Keterangan :Kompetensi Inti Keterampilan (KI-4) berdasarkan KI-KD mata pelajaran/silabus</p>
            </div>    
            <div class="form-group">
                <label for="analisa2" class="font-weight-bold">ANALISIS DAN REKOMENDASI KI</label>
                <center><p class="font-weight-bold" ></p></center>
                <textarea class="form-control" name="analisa2" id="analisa2" cols="30" rows="10"></textarea>
                <p>Keterangan :Analisis: KI-3 dan KI-4 mata pelajaran untuk tingkat program pendidikan 3 tahun / 4 tahun (pilih salah satu) dan (sesuai ranah /tidak sesuai ranah)</p>
                <b>Rekomendasi: sesuai / tidak sesuai tingkat program pendidikan (pilih salah satu), jika tidak sesuai cantumkan KI yang sesuai tingkat program pendidikan.</b>
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="tahun">Tahun Ajaran :</label>
                <input type="text" name="tahun" id="tahun" class="form-control">
                <p>Isi dengan Tahun Ajaran misal : Tahun Ajaran 2019/2020</p>
            </div> 
            <button class="btn btn-success" type="submit" nama="analis" ><i class="fa fa-save" ></i> Simpan Analisa</button>
        </form>
    <?php }else{ ?>
        <form action="<?= base_url().'guru/aksiSkl' ;?>" method="post">
        <input type="hidden" name="kodeMapel" id="kodeMapel" value="<?= $kodeMapel; ?>">
        <input type="hidden" name="id" id="id" value="<?= $id; ?>">
        <input type="hidden" name="idmengajar" id="idmengajar" value="<?= $idmengajar; ?>">
            <div class="form-group">
                <label for="ki3" class="font-weight-bold">Kompetensi Inti 3</label>
                <center><p class="font-weight-bold" >Pengetahuan</p></center>
                <textarea class="form-control" name="ki3" id="ki3" cols="30" rows="10"></textarea>
                <p>Keterangan :Kompetensi Inti Pengetahuan (KI-3) berdasarkan KI-KD mata pelajaran/silabus</p>
            </div>    
            <div class="form-group">
                <label for="ki4" class="font-weight-bold">Kompetensi Inti 4</label>
                <center><p class="font-weight-bold" >Keterampilan</p></center>
                <textarea class="form-control" name="ki4" id="ki4" cols="30" rows="10"></textarea>
                <p>Keterangan :Kompetensi Inti Keterampilan (KI-4) berdasarkan KI-KD mata pelajaran/silabus</p>
            </div>    
            <div class="form-group">
                <label for="analisa2" class="font-weight-bold">ANALISIS DAN REKOMENDASI KI</label>
                <center><p class="font-weight-bold" ></p></center>
                <textarea class="form-control" name="analisa2" id="analisa2" cols="30" rows="10"></textarea>
                <p>Keterangan :Analisis: KI-3 dan KI-4 mata pelajaran untuk tingkat program pendidikan 3 tahun / 4 tahun (pilih salah satu) dan (sesuai ranah /tidak sesuai ranah)</p>
                <b>Rekomendasi: sesuai / tidak sesuai tingkat program pendidikan (pilih salah satu), jika tidak sesuai cantumkan KI yang sesuai tingkat program pendidikan.</b>
            </div>    
            <div class="form-group">
                <label class="font-weight-bold" for="tahun">Tahun Ajaran :</label>
                <input type="text" name="tahun" id="tahun" class="form-control">
                <p>Isi dengan Tahun Ajaran misal : Tahun Ajaran 2019/2020</p>
            </div> 
            <button class="btn btn-success" type="submit" nama="analis" ><i class="fa fa-save" ></i> Simpan Analisa</button>
        </form>
    <?php } ?>
    <br>
    <br>
</div>