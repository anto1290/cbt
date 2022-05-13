<?php
$cekeq = $this->db->query("SELECT * FROM equation WHERE statuseq=1")->num_rows();
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
            toolbar1: "undo redo | link image imagetools | styleselect media | bullist numlist outdent indent",
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
<script type="text/javascript">
    window.MathJax = {
        tex2jax: {
            inlineMath: [
                ['$', '$'],
                ["\\(", "\\)"]
            ],
            processEscapes: true
        }
    };
</script>
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Soal PG</h4>
        </div>
        <div class="card-body">
            <?php
            foreach ($pkt as $s) : ?>
                <a href="<?= base_url() . 'guru/soal/' . $s->idPaketSoal; ?>" class="btn btn-outline-dark pull-left"><i class="fa fa-arrow-left"></i> Kembali</a>
                <br><br><?php
                        $uri4 = $this->uri->segment(4);
                        ?>
                <form id="editSoal" action="<?= base_url() . 'guru/soal_update'; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?= $s->id_soal; ?>">
                    <input type="hidden" name="idPaketSoal" id="idPaketSoal" value="<?= $s->idPaketSoal; ?>">
                    <input type="hidden" name="codeSoal" id="codeSoal" value="<?= $s->codeSoal; ?>">
                    <input type="hidden" name="codeMapel" id="codeMapel" value="<?= $s->kodeMapel; ?>">
                    <input type="hidden" name="Tingkat" id="Tingkat" value="<?= $s->Tingkatan; ?>">
                    <input type="hidden" name="jurusan" id="jurusan" value="<?= $s->Jurusan; ?>">
                    <input type="hidden" name="jsoal" id="jsoal" value="1">
                    <input type="hidden" name="kodeGuru" id="kodeGuru" value="<?= $s->kodeGuru; ?>">
                    <input type="hidden" name="Nomor_soal" id="Nomor_soal" value="<?= $s->Nomor_soal; ?>" required>
                    <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">File Pendukung</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold" for="image">Gambar Soal</label>
                                <br>
                                <?php
                                if ($s->gambar_soal) { ?>
                                    <img src="<?= base_url() . 'gambar/soal/' . $s->gambar_soal; ?>" width="200px">
                                    <br>
                                    <br>
                                    <input class="form-control-file" type="file" name="image" id="image">
                                <?php } else { ?>
                                    <img src="<?= base_url() . 'gambar/bahan/default/nopic.png' ?>" width="100px" alt="nopic">
                                    <input class="form-control-file" type="file" name="image" id="image">

                                <?php } ?>
                                <input type="hidden" name="old_image" value="<?= $s->gambar_soal; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold" for="audio">Audio Soal</label>
                                <?php if ($s->audio_soal) { ?>
                                    <audio controls class="mb-3" src="<?= base_url() . 'audio/' . $s->audio_soal; ?>" width="200px"></audio>
                                <?php } else { ?>
                                    <br>
                                    <img src="<?= base_url() . 'gambar/bahan/default/noaudio.png' ?>" width="100px" alt="nopic">
                                <?php } ?>
                                <input class="form-control-file" type="file" name="audio" id="audio">
                                <input type="hidden" name="old_audio" value="<?= $s->audio_soal; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold" for="video">Video Soal</label><br>
                                <?php if ($s->video_soal) { ?>
                                    <video width="250px" controls>
                                        <source src="<?= base_url() . 'video/' . $s->video_soal ?>" type="video/mp4">
                                        <source src="<?= base_url() . 'video/' . $s->video_soal ?>" type="video/flv">
                                        <source src="<?= base_url() . 'video/' . $s->video_soal ?>" type="video/avi">
                                        <source src="<?= base_url() . 'video/' . $s->video_soal ?>" type="video/vwm">
                                        <source src="<?= base_url() . 'video/' . $s->video_soal ?>" type="video/mkv">
                                    </video>
                                <?php } else { ?>
                                    <img src="<?= base_url() . 'gambar/bahan/default/nov.png' ?>" width="100px" alt="nopic">
                                    <br>
                                <?php } ?>
                                <input class="form-control-file" type="file" name="video" id="video">
                                <input type="hidden" name="old_video" value="<?= $s->video_soal; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Pertanyaan Soal </h2>
                        <textarea class="form-control" name="soal" id="soal" cols="30" rows="3"><?= $s->soal; ?></textarea>
                    </div>
                    <div class="form-group">
                        <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Jawaban A</h2>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="tes">
                                    <p><b>Kunci :</b></p>
                                    <label class="switch">
                                        <input type="checkbox" name="kunci" id="kunci" class="form-control" value="A" <?php if ($s->kunci_jawab == "A") {
                                                                                                                            echo "checked";
                                                                                                                        }; ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <textarea class="form-control" name="opsi_a" id="opsi_a" cols="30" rows="3"><?= $s->opsi_a; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Jawaban B</h2>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="tes">
                                    <p><b>Kunci :</b></p>
                                    <label class="switch">
                                        <input type="checkbox" name="kunci" id="kunci" class="form-control" value="B" <?php if ($s->kunci_jawab == "B") {
                                                                                                                            echo "checked";
                                                                                                                        }; ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <textarea class="form-control" name="opsi_b" id="opsi_b" cols="30" rows="3"><?= $s->opsi_b; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Jawaban C</h2>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="tes">
                                    <p><b>Kunci :</b></p>
                                    <label class="switch">
                                        <input type="checkbox" name="kunci" id="kunci" class="form-control" value="C" <?php if ($s->kunci_jawab == "C") {
                                                                                                                            echo "checked";
                                                                                                                        }; ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <textarea class="form-control" name="opsi_c" id="opsi_c" cols="30" rows="3"><?= $s->opsi_c; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Jawaban D</h2>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="tes">
                                    <p><b>Kunci :</b></p>
                                    <label class="switch">
                                        <input type="checkbox" name="kunci" id="kunci" class="form-control" value="D" <?php if ($s->kunci_jawab == "D") {
                                                                                                                            echo "checked";
                                                                                                                        }; ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <textarea class="form-control" name="opsi_d" id="opsi_d" cols="30" rows="3"><?= $s->opsi_d; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Jawaban E</h2>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="tes">
                                    <p><b>Kunci :</b></p>
                                    <label class="switch">
                                        <input type="checkbox" name="kunci" id="kunci" class="form-control" value="E" <?php if ($s->kunci_jawab == "E") {
                                                                                                                            echo "checked";
                                                                                                                        }; ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <textarea class="form-control" name="opsi_e" id="opsi_e" cols="30" rows="3"><?= $s->opsi_e; ?></textarea>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>

                </form>
        </div>
        <div class="row">
            <div class="col-md-4 offset-1">
                <button class="btn btn-success" type="button" id="submit"><i class="fa fa-plus"></i> Edit Soal</button>
            </div>
        </div>
    </div>
</div>
<style>
    .tes {
        height: 100%;
        width: 100px;
        margin-left: 15px;
        margin-top: 80px;
    }
</style>
<script src="<?= base_url() . 'assets/js/soaljs.js'; ?>"></script>