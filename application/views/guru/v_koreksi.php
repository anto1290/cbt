<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Koreksi Esay</h4>
        </div>
        <div class="card-body">
            <table id="sudo" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $uri3 = ($this->uri->segment(3));
                    $no = 1;
                    foreach ($Kelas as $k) {
                        ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $k->kodeKelas; ?></td>
                            <td><?= $k->Nama_kelas; ?></td>
                            <td>
                                <a href="<?= base_url('guru/korek/') . $uri3 . '/' . $k->kodeKelas; ?>" class="btn btn-success"><i class="fas fa-fw fa-book-reader"></i> Koreksi</a>
                            </td>
                        </tr>
                    <?php $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#sudo').DataTable();
    });
</script>