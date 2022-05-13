<?php
$ceke = $this->db->query("SELECT * FROM soal WHERE codeSoal = '$pkt->codeSoal' AND kodeMapel = '$pkt->kodeMapel' AND kodeGuru = '$pkt->kodeGuru' AND jenis_soal = 2")->num_rows();
$cekeq = $this->db->query("SELECT * FROM equation WHERE statuseq=1")->num_rows();
?>
<!-- TinyMCE -->
<script src="<?= base_url() . 'assets/tinymce/js/tinymce/tinymce.min.js'; ?>"></script>
<!-- <script src="<?= base_url() . 'assets/tinymce/js/tinymce/plugins/tiny_mce_wiris/plugin.js'; ?>"></script> -->
<script type="text/javascript">
  var eq = "<?= $cekeq; ?>"
  if (eq > 0) {
    tinymce.init({
      selector: 'textarea',
      plugins: ["eqneditor advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
      ],
      toolbar1: "undo redo | link image imagetools | styleselect media | bold italic | bullist numlist outdent indent",
      toolbar2: "eqneditor | bold italic underline|| subscript superscript |",
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
  } else {
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
  }
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
      <h4>Tambah Esai Baru</h4>
    </div>
    <div class="card-body">

      <div class="row">
        <div class="col-md-4"><a href="<?= base_url() . 'guru/soal/' . $this->uri->segment(3); ?>" class="btn btn-outline-dark pull-left"><i class="fa fa-arrow-left"></i> Kembali</a></div>
        <div class="col-md-4">
          <p><b>Sisah Bobot :</b> </p>
          <h4>
            <b>
              <?php $x =  $pkt->bobotesai - $sisah->JMLE;
              echo $x; ?>
            </b>
          </h4>
        </div>
      </div>
      <br><br>
      <form action="<?= base_url() . 'guru/soal_aksi'; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="jsoal" id="jsoal" value="2">
        <input type="hidden" name="idPaketSoal" id="idPaketSoal" value="<?= $pkt->idPaketSoal; ?>">
        <input type="hidden" name="codeSoal" id="codeSoal" value="<?= $pkt->codeSoal; ?>">
        <input type="hidden" name="codeMapel" id="codeMapel" value="<?= $pkt->kodeMapel; ?>">
        <input type="hidden" name="Tingkat" id="Tingkat" value="<?= $pkt->Tingkatan; ?>">
        <input type="hidden" name="jurusan" id="jurusan" value="<?= $pkt->Jurusan; ?>">
        <input type="hidden" name="kodeGuru" id="kodeGuru" value="<?= $pkt->kodeGuru; ?>">
        <input type="hidden" name="Nomor_soal" id="Nomor_soal" value="<?= ++$ceke ?>">
        <input type="hidden" name="opsi_a" value=" ">
        <input type="hidden" name="opsi_b" value=" ">
        <input type="hidden" name="opsi_c" value=" ">
        <input type="hidden" name="opsi_d" value=" ">
        <input type="hidden" name="opsi_e" value=" ">
        <input type="hidden" name="kunci" value=" ">
        <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">File Pendukung</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="font-weight-bold" for="image">Gambar Soal</label>
              <input class="form-control-file" type="file" name="image" id="image">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="font-weight-bold" for="audio">Audio Soal</label>
              <input class="form-control-file" type="file" name="audio" id="audio">
            </div>
          </div>
        </div>
        <div class="form-group">
          <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Pertanyaan Soal </h2>
          <textarea class="form-control mytextarea" name="soal" id="soal" cols="30" rows="3"></textarea>
        </div>
        <!-- <div class="form-group">
          <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Jawaban Esai</h2>
          <textarea class="form-control mytextarea" name="kunci" id="kunci" cols="30" rows="3"></textarea>
        </div> -->
        <div class="form-group">
          <h2 style="background-color:#070641; padding:10px;" class="rounded border text-white">Bobot Soal </h2>
          <input type="number" class="form-control" name="bobot" id="bobot" placeholder="Bobot Soal">
        </div>
        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Tambah Soal</button>
      </form>

    </div>
  </div>
</div>