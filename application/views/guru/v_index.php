<div class="container conten">
    <div class="jumbotron text-center">
        <div class="col-sm-8 mx-auto">
            <h3>Selamat Datang <?=  $this->session->userdata('namaLengkap') ;?>!</h3>
                <p>di System CBT SMK DARMAWAN </p>
                <p>
                Anda telah login sebagai <b><?php echo $this->session->userdata('username'); ?></b> [Guru].
                </p>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
        Dashboard
        </div>
        <div class="card-body">
        </div>
    </div>
</div>