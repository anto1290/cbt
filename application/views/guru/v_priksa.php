<script src="<?= base_url() . 'assets/sweetJs/sweetalert2.all.min.js' ?>"></script>
<div class="container">
    <div class="card">
        <div class="card-header">
            <center>
                <h4>Periksa Jawaban</h4>
            </center>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="5%">poin</th>
                    <th width="80%">Esay</th>
                    <th width="10%">Bobot</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($soal as $P) {
                    $priksa =  $this->db->query("SELECT * FROM jawaban WHERE Nomor_soal=$P->Nomor_soal AND jenis_soal=2 AND nis=$nis AND codeSoal='$P->codeSoal' AND kodeMapel='$P->kodeMapel'AND kodeGuru='$P->kodeGuru'")->row_array();
                    $n =  $this->db->query("SELECT * FROM jawaban WHERE Nomor_soal=$P->Nomor_soal AND jenis_soal=2 AND nis=$nis AND codeSoal='$P->codeSoal' AND kodeMapel='$P->kodeMapel'AND kodeGuru='$P->kodeGuru'")->num_rows();
                    $kls = $this->db->query("SELECT kodeKelas FROM siswa WHERE nis=$nis")->row();
                    ?>
                    <tr>
                        <td rowspan="2">
                            <center><?= $P->Nomor_soal; ?></center>
                        </td>
                        <td rowspan="2">
                            <?php if ($priksa['nilai_esai'] == NULL || $priksa['Jawaban_esai']  == NULL) { ?>
                                <input type="text" value="<?= "Tidak menjawab"; ?>" disabled readonly>
                            <?php } else { ?>
                                <form id="updatein" class="formloop" action="<?= base_url() . 'guru/esai_update'; ?>" method="post">
                                    <input type="hidden" data-id="<?= $priksa['idjawab']; ?>" name="id" id="id" value="<?= $priksa['idjawab']; ?>">
                                    <input type="hidden" data-id="<?= $priksa['idjawab']; ?>" name="codeSoal" id="codeSoal" value="<?= $priksa['codeSoal']; ?>">
                                    <input type="hidden" data-id="<?= $priksa['idjawab']; ?>" name="bobotEsai" id="bobotEsai" value="<?= $P->bobotesaiSoal; ?>">
                                    <input type="hidden" data-id="<?= $priksa['idjawab']; ?>" name="kodeKelas" id="kodeKelas" value="<?= $kls->kodeKelas; ?>">
                                    <input type="number" data-id="<?= $priksa['idjawab']; ?>" class="nilai" name="nilai" id="nilai" value="<?= $priksa['nilai_esai']; ?>">
                                    <input type="hidden" name="count" id="count" value="<?= $n  ?>">
                                    <!-- <button class="btn btn-success" type="submit">Save</button> -->
                                </form>
                                <script>
                                    $(document).ready(function() {
                                        $("input[name='nilai'][data-id='<?= $priksa['idjawab']; ?>']").on("keyup", function() {
                                            var id = $(":input[name='id'][data-id='<?= $priksa['idjawab']; ?>']").val();
                                            var nilai = parseInt($(":input[name='nilai'][data-id='<?= $priksa['idjawab']; ?>']").val());
                                            var NULL = $(":input[name='nilai'][data-id='<?= $priksa['idjawab']; ?>']").length;
                                            var bobotEsai = parseInt($(":input[name='bobotEsai'][data-id='<?= $priksa['idjawab']; ?>']").val());
                                            if (nilai <= bobotEsai) {
                                                $.ajax({
                                                    type: "POST",
                                                    url: "<?= base_url() . 'guru/esaiUajax'; ?>",
                                                    data: {
                                                        id: id,
                                                        nilai: nilai
                                                    },
                                                    success: function(response) {
                                                        console.log(response);
                                                    }
                                                });
                                            } else {
                                                Swal.fire({
                                                    type: 'error',
                                                    title: 'Oops...',
                                                    text: 'Nilai yang diberikan lebih dari bobot!!!',
                                                });
                                                $(":input[name='nilai'][data-id='<?= $priksa['idjawab']; ?>']").val(0);
                                            }
                                        });
                                    });
                                </script>
                            <?php
                                }    ?>

                        </td>
                        <td><?= $P->soal; ?></td>
                        <td><?= $P->bobotesaiSoal; ?></td>
                    </tr>
                    <tr>
                        <td><?php if ($priksa['Jawaban_esai'] == NULL) {
                                    echo "Tidak dijawab";
                                } else {
                                    echo $priksa['Jawaban_esai'];
                                }; ?></td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <form id="prosesfrom" action="<?= base_url() . 'guru/esaiNilai' ?>" method="post">
            <input type="hidden" name="nis" id="nis" value="<?= $nis ?>">
            <input type="hidden" name="kodeMapel" id="kodeMapel" value="<?= $paket->kodeMapel; ?>">
            <input type="hidden" name="codeSoal" id="codeSoal" value="<?= $paket->codeSoal; ?>">
            <input type="hidden" name="kodeGuru" id="kodeGuru" value="<?= $paket->kodeGuru; ?>">
            <input type="hidden" name="persenPG" id="persenPG" value="<?= $paket->persenPg; ?>">
            <input type="hidden" name="persenEsai" id="persenEsai" value="<?= $paket->persenEsai; ?>">
            <input type="hidden" name="bobotesai" id="bobotesai" value="<?= $paket->bobotesai; ?>">
        </form>
        <button class="proses btn btn-success"><i class="fas fa-fw fa-save"></i> Proses</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".proses").on("click", function() {
            $("#prosesfrom").submit();
        })
    });
</script>