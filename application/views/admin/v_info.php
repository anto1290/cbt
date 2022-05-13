<div class="container-fluid">
<div class="card">
    <div class="card-header">
    <center><h6>Informasi Data Sekolah</h6></center>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
            <label for="nsekolah">Nama Sekolah</label>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" name="" id="nsekolah" value="<?= $info->namaSekolah ?>" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
            <label for="">NPSN</label>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" name="" id="" value="<?= $info->NPSN ?>" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
            <label for="">NIS/NSS/NDS</label>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" name="" id="" value="<?= $info->NSS ?>" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
            <label for="">Alamat Sekolah</label>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" name="" id="" value="<?= $info->Alamat ?>" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
            <label for="">Kode Pos</label>
            </div>
            <div class="col-md-2">
            <input class="form-control" type="text" name="" id="" value="<?= $info->kodePos ?>" readonly>
            </div>
            <div class="col-md-1">
                <label for="">Telp</label>
            </div>
            <div class="col-md-1">
            <input class="form-control" type="text" name="" id="" value="021" readonly>
            </div>
            <div class="col-md-2">
            <input class="form-control" type="text" name="" id="" value="<?= $info->Telp ?>" readonly>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
            <label for="">Kelurahan</label>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" name="" id="" value="<?= $info->Kelurahan ?>" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
            <label for="">Kecamatan</label>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" name="" id="" value="<?= $info->Kecamatan ?>" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
            <label for="">Kota/Kabupaten</label>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" name="" id="" value="<?= $info->Kota ?>" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
            <label for="">Provinsi</label>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" name="" id="" value="<?= $info->Provinsi ?>" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
            <label for="">Website</label>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" name="" id="" value="<?= $info->Website ?>" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
            <label for="">E-Mail</label>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" name="" id="" value="<?= $info->Email ?>" readonly>
            </div>
        </div>
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Edit Data Sekolah
        </button>

    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
                <label class="font-weight-bold" for="nsekolah">Nama Sekolah</label>
                <input class="form-control" type="text" name="nsekolah" id="nsekolah" value="<?= $info->namaSekolah ;?>">
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="npsn">NPSN</label>
                <input class="form-control" type="text" name="npsn" id="npsn" value="<?= $info->NPSN ;?>">
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="nss">NIS/NSS/NDS</label>
                <input class="form-control" type="text" name="nss" id="nss" value="<?= $info->NSS ;?>">
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="alamat">Alamat Sekolah</label>
                <textarea class="form-control" name="alamat" id="alamat" cols="10" rows="4"><?= $info->Alamat ;?></textarea>
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="kode">Kode Pos</label>
                <input class="form-control" type="text" name="kode" id="kode" value="<?= $info->kodePos ;?>">
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="Telp">Telp</label>
                <input class="form-control" type="text" name="Telp" id="Telp" value="<?= $info->Telp ;?>">
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="provinsi">Provinsi</label>
                <select class="form-control" name="provinsi" id="provinsi">
                    <option value="">Select Provinsi</option>
                    <?php foreach ($provinsi as $PR) { ?>
                    <option value="<?= $PR->lokasi_propinsi ;?>"><?= $PR->lokasi_nama ;?></option>
                    <?php
                } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="kota">Kota/Kabupaten</label>
                <input class="form-control" type="text" name="kota" id="kota" value="<?= $info->Kota ;?>">
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="kecamatan">Kecamatan</label>
                <input class="form-control" type="text" name="kecamatan" id="kecamatan" value="<?= $info->Kecamatan ;?>">
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="Kelurahan">Kelurahan</label>
                <input class="form-control" type="text" name="Kelurahan" id="Kelurahan" value="<?= $info->Kelurahan ;?>">
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="website">Website</label>
                <input class="form-control" type="text" name="website" id="website" value="<?= $info->Website ;?>">
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="Email">E-mail</label>
                <input class="form-control" type="text" name="Email" id="Email" value="<?= $info->Email ;?>">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>