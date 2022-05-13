<div class="container">
    <div class="card">
        <?php
        $uri3 = ($this->uri->segment(3));
        $uri4 = ($this->uri->segment(4));
        $kelas = $this->db->query("SELECT Nama_kelas FROM kelas WHERE kodeKelas='$uri4'")->row();
        ?>
        <div class="card-header">
            <h4>Koreksi Esay Kelas <?= $kelas->Nama_kelas; ?></h4>
            <br />
            <a href="<?= base_url('/guru/koreksi/').$uri3?>" class="btn btn-info"><i class="fas fa-fw fa-arrow-left"></i> Back</a>

        </div>
        <div class="card-body">
            <table id="sudo" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Nama Siswa</th>
                        <th>Tingkatan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    foreach ($siswa as $k) {
                        ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $k->Nama_kelas; ?></td>
                            <td><?= $k->nama_siswa; ?></td>
                            <td><?= $k->tingkatan; ?></td>
                            <td>
                                <form action="<?= base_url() . 'guru/priksa'; ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="nis" id="nis" value="<?= $k->nis; ?>">
                                    <input type="hidden" name="codeSoal" id="codeSoal" value="<?= $k->codeSoal; ?>">
                                    <input type="hidden" name="bobotesai" id="bobotesai" value="<?= $k->bobotesai; ?>">
                                    <input type="hidden" name="kodeMapel" id="kodeMapel" value="<?= $k->kodeMapel; ?>">
                                    <button class="btn btn-danger"><i class="fas fa-fw fa-pencil-ruler"></i></button>
                                </form>
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