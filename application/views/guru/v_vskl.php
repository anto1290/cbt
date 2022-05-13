<div class="container-fluid">
<div class="header row">
        <div class="col-md-12">
            <h2 class="header-tittle  animated infinity bounceInDown ">
                View Hasil Analisa
            </h2>
            <h6 class="sub-header-tittle  animated infinity bounceInDown ">
                Administrasi Buku Guru Satu
            </h6>
        </div>
    </div>
    <br>
    <table class="table table-info table-striped" >
        <thead>
            <tr>
            <center> <th>No</th></center>
            <center> <th>Mapel</th></center>
            <center> <th>Tingkatan</th></center>
            <center><th>Tahun Ajaran</th></center>
            <center><th>Opsi</th></center>
               
               
                
                
            </tr>
        </thead>
    <?php 
    $no = 1;
    foreach($grab AS $gb) :
    ?>
    <tbody>
        <tr>
           <center><td><?= $no; ?></td> </center> 
           <center><td><?= $gb->Nama_mapel; ?></td></center>
           <center><td><?= $gb->tingkatan; ?></td></center>
        <center><td><?= $gb->tahunAjaran; ?></td></center>
        <center>
        <td>
            <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"></i>View</button>
            <a href="" class="btn btn-sm btn-warning disabled" ><i class="fa fa-wrench" ></i>Edit</a>
            <a href="" class="btn btn-sm btn-danger disabled" ><i class="fa fa-trash" ></i>Hapus</a>
        </td>
        </center>
        </tr>
    </tbody>

    <?php $no++;  endforeach ?>
    </table>

</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php if($kodeMapel == 'A008' || $kodeMapel === 'A006'){ ?>
            <table>
                <thead class="table table-borderless table-hover">
                    <tr>
                        <th>No</th>
                        <th>Kompetnsi inti sikap spiritual</th>
                        <th>Kompetnsi inti sikap sosial</th>
                        <th>analisa</th>
                    </tr>
                </thead>
                <?php $n = 1;
                foreach($grab AS $ka){ ?>
                <tbody>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $ka->sikapSpiritual; ?></td>
                        <td><?= $ka->sikapSosial; ?></td>
                        <td><?= $ka->analisa1; ?></td>
                    </tr>
                </tbody>
                <?php }?>
            </table>
            <br>
            <br>
            <table>
                <thead class="table table-borderless table-hover">
                    <tr>
                        <th>No</th>
                        <th>Kompetnsi inti Pengetahuan</th>
                        <th>Kompetnsi inti Keterampilan</th>
                        <th>analisa</th>
                    </tr>
                </thead>
                <?php $i = 1;
                foreach($grab AS $ka){ ?>
                <tbody>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $ka->pengetahuan; ?></td>
                        <td><?= $ka->keterampilan; ?></td>
                        <td><?= $ka->analisa2; ?></td>
                    </tr>
                </tbody>
                <?php }?>
            </table>
            <?php }else {?>
                <table border="1px"  >
                <thead class="table table-borderless table-hover">
                    <tr>
                        <th>No</th>
                        <th>Kompetnsi inti Pengetahuan</th>
                        <th>Kompetnsi inti Keterampilan</th>
                        <th>analisa</th>
                    </tr>
                </thead>
                <?php $i = 1;
                foreach($grab AS $ka){ ?>
                <tbody>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $ka->pengetahuan; ?></td>
                        <td><?= $ka->keterampilan; ?></td>
                        <td><?= $ka->analisa2; ?></td>
                    </tr>
                </tbody>
                <?php }?>
            </table>
            
            <?php } ?>
      </div>
    </div>
  </div>
</div>



