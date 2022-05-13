<div class="main-content" id="main-content">
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Edit Mata Pelajaran
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Edit Mapel 
            </p>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Pelajaran</h4>
        </div>
        <div class="card-body">
        <a href="<?= base_url().'admin/mapel';?>" class="btn btn-outline-dark pull-left" ><i class="fa fa-arrow-left"></i> Kembali</a>
        <br><br>
        <?php foreach($mapel as $mpl) : ?>
        <form action="<?= base_url().'admin/mapel_update' ;?>" method="post">
        <input type="hidden" name="id" id="id" value="<?= $mpl->id_mapel; ?>">
            <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                <label class="font-weight-bold" for="nama">Nama mapel</label>
                <input type="Text" name="nama" id="nama" class="form-control" value="<?= $mpl->Nama_mapel ?>">
            </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold" for="kelompok">Kelompok Pelajaran</label>
                        <select class="form-control" name="kelompok" id="kelompok" required>
                            <option <?php if($mpl->kelompok == "A"){echo "selected='selected'" ;} ?> value="A">Kelompok A</option>
                            <option <?php if($mpl->kelompok == "B"){echo "selected='selected'" ;} ?> value="B">Kelompok B</option>
                            <option <?php if($mpl->kelompok == "C1"){echo "selected='selected'" ;} ?> value="C1">Kelompok C1</option>
                            <option <?php if($mpl->kelompok == "C2"){echo "selected='selected'" ;} ?> value="C2">Kelompok C2</option>
                            <option <?php if($mpl->kelompok == "C3"){echo "selected='selected'" ;} ?> value="C3">Kelompok C3</option>
                        </select>
                    </div>    
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold" for="jurusan">jurusan Pelajaran</label>
                        <select class="form-control" name="jurusan" id="jurusan" required>
                        <option value="">Pilih Jurusan</option>
                            <option <?php if($mpl->jurusan == "ALL"){echo "selected='selected'" ;} ?>  value="ALL">ALL</option>
                            <option <?php if($mpl->jurusan == "Usaha Perjalanan Wisata"){echo "selected='selected'" ;} ?> value="Usaha Perjalanan Wisata">Usaha Perjalanan Wisata</option>
                            <option <?php if($mpl->jurusan == "Perhotelan"){echo "selected='selected'" ;} ?> value="Perhotelan">Perhotelan</option>
                            <option <?php if($mpl->jurusan == "Tata Boga"){echo "selected='selected'" ;} ?> value="Tata Boga">Tata Boga</option>
                            <option <?php if($mpl->jurusan == "Caregiver"){echo "selected='selected'" ;} ?> value="Caregiver">Caregiver</option>
                        </select>
                    </div>      
                </div>
            </div>
            
            <button class="btn btn-success" type="submit"><i class="fa fa-save" ></i> Update Data</button>
        </form>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<script src="<?= base_url().'assets/js/main.js'; ?>"></script>