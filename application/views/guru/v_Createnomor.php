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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-plus" > Tambah Nomor</i></button>
<br>
<br>
    <table class="table table-sm table-primary">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode KD</th>
                <th>Nama Mapel</th>
                <th>Kelas</th>
                <th>Tahun Ajaran</th>
                <th>Opsi</th>
            </tr>
        </thead>
    <?php  $id = $this->session->userdata('id');
    $no =1;
    foreach($marger AS $mgr){?>
        <tbody>
            <tr>
                <td><?= $no++;  ?></td>   
                <td><?= $mgr->kodeKD ?></td>   
                <td><?= $mgr->Nama_mapel; ?></td>   
                <td><?= $mgr->tingkatan ;?></td>   
                <td><?= $mgr->tahunAjaran; ?></td>
                <td></td>   
            </tr>
        </tbody>
    <?php } ?>
    </table>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url().'guru/aksiKode' ;?>" method="post">
      <input type="hidden" name="kodeMapel" value="<?= $kodeMapel; ?>">
      <input type="hidden" name="idmengajar" value="<?= $idmengajar; ?>">
      <input type="hidden" name="idguru" value="<?= $id; ?>">

        <div class="modal-body">
            <div class="form-group">
                <label for="angkaKD" class="font-weight-bold">Angka KD</label>
                <input type="text" name="angkaKD" id="angkaKD" class="form-control">
                <p>Contoh : 1.2</p>
            </div>
            <div class="form-group">
                <label for="tahun" class="font-weight-bold">Tahun Ajaran</label>
                <input type="text" name="tahun" id="tahun" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>