<?php
$ceke = $this->db->query("SELECT * FROM soal WHERE codeSoal = '$pkt->codeSoal' AND kodeMapel = '$pkt->kodeMapel' AND kodeGuru ='$pkt->kodeGuru' AND jenis_soal = 1")->num_rows();
?>
<!-- TinyMCE -->
<script src="<?= base_url() . 'assets/tinymce/js/tinymce/tinymce.min.js'; ?>"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea',
        plugins: ["advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar1: "undo redo | link image imagetools | styleselect media | bold italic | bullist numlist outdent indent",
        toolbar2: "| bold italic underline| subscript superscript |",
        image_advtab: true,
        images_upload_url: "<?php echo base_url("guru/tinymce_upload") ?>",
        file_picker_types: 'image',
        image_force_tabs: true,
        paste_data_images: true,
        relative_urls: false,
        remove_script_host: false,
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    var id = 'post-image-' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var blobInfo = blobCache.create(id, file, reader.result);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
            };
            input.click();
        }
    });
</script>
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Soal PG Baru</h4>
        </div>
        <div class="card-body">
            <a href="<?= base_url() . 'guru/soal/' . $this->uri->segment(3); ?>" class="btn btn-outline-dark pull-left"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br><br>
            <form id="tambahSoal" action="<?= base_url() . 'guru/soal_aksi'; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="jsoal" id="jsoal" value="1">
                <input type="hidden" name="idPaketSoal" id="idPaketSoal" value="<?= $pkt->idPaketSoal; ?>">
                <input type="hidden" name="codeSoal" id="codeSoal" value="<?= $pkt->codeSoal; ?>">
                <input type="hidden" name="codeMapel" id="codeMapel" value="<?= $pkt->kodeMapel; ?>">
                <input type="hidden" name="Tingkat" id="Tingkat" value="<?= $pkt->Tingkatan; ?>">
                <input type="hidden" name="jurusan" id="jurusan" value="<?= $pkt->Jurusan; ?>">
                <input type="hidden" name="kodeGuru" id="kodeGuru" value="<?= $pkt->kodeGuru; ?>">
                <input type="hidden" name="Nomor_soal" id="Nomor_soal" value="<?= ++$ceke ?>">
                <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">File Pendukung</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold" for="image">Gambar Soal</label><br>
                            <img src="<?= base_url(); ?>gambar/bahan/default/nopic.png" width="100px" alt="nopic">
                            <br>
                            <input class="form-control-file" type="file" name="image" id="image">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold" for="audio">Audio Soal</label><br>
                            <img src="<?= base_url() . 'gambar/bahan/default/noaudio.png' ?>" width="100px" alt="nopic">
                            <br>
                            <input class="form-control-file" type="file" name="audio" id="audio">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold" for="video">Video Soal</label><br>
                            <img src="<?= base_url() . 'gambar/bahan/default/nov.png' ?>" width="100px" alt="nopic">
                            <br>
                            <input class="form-control-file" type="file" name="video" id="video">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Pertanyaan Soal </h2>
                    <textarea class="form-control" name="soal" id="soal" cols="30" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">KUNCI</h2>
                            <center>
                                <label style="margin-top: 50px;" class="switch">
                                    <input type="checkbox" name="kunci" id="kunci" class="form-control" value="A">
                                    <span class="slider round"></span>
                                </label>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Jawaban A</h2>
                            <textarea class="form-control" name="opsi_a" id="opsi_a" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">KUNCI</h2>
                            <center>
                                <label style="margin-top: 50px;" class="switch">
                                    <input type="checkbox" name="kunci" id="kunci" class="form-control" value="B">
                                    <span class="slider round"></span>
                                </label>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Jawaban B</h2>
                            <textarea class="form-control" name="opsi_b" id="opsi_b" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">KUNCI</h2>
                            <center>
                                <label style="margin-top: 50px;" class="switch">
                                    <input type="checkbox" name="kunci" id="kunci" class="form-control" value="C">
                                    <span class="slider round"></span>
                                </label>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Jawaban C</h2>
                            <textarea class="form-control" name="opsi_c" id="opsi_c" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">KUNCI</h2>
                            <center>
                                <label style="margin-top: 50px;" class="switch">
                                    <input type="checkbox" name="kunci" id="kunci" class="form-control" value="D">
                                    <span class="slider round"></span>
                                </label>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Jawaban D</h2>
                            <textarea class="form-control" name="opsi_d" id="opsi_d" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">KUNCI</h2>
                            <center>
                                <label style="margin-top: 50px;" class="switch">
                                    <input type="checkbox" name="kunci" id="kunci" class="form-control" value="E">
                                    <span class="slider round"></span>
                                </label>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Jawaban E</h2>
                            <textarea class="form-control" name="opsi_e" id="opsi_e" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Tambah Soal</button>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() . 'assets/js/soaljs.js'; ?>"></script>