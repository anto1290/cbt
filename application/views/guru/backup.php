<ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url().'guru'; ?>"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= base_url().'guru/bankSoal'; ?>"><i class="fa fa-pencil">
                    </i> Buat soal</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= base_url().'guru/input_nilai'; ?>"><i class="fa fa-pencil">
                    </i> Format Nilai</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= base_url().'guru/rekap'; ?>"><i class="fa fa-book">
                    </i> Rekap Nilai</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" href="<?= base_url().'guru/'; ?>"><i class="fa fa-thumbs-o-up">
                    </i> Koreksi</a>
                    </li>
                    <?php 
                    if($guru->PGS == "aktif"){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url().''; ?>">
                        <i class="fa fa-bell"></i> Pengawas</a>
                    </li>

                    <?php  
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url().'guru/ganti_password'; ?>">
                        <i class="fa fa-lock"></i> Ganti Password</a>
                    </li>
                </ul>
                <span class="navbar-text mr-3 text-center">
                    Halo, <?= $this->session->userdata('username'); ?> [Guru]
                </span>
                <a href="<?= base_url().'guru/logout' ?>" class="btn btn-outline-light ml-1">
                <i class="fa fa-power-off"></i> KELUAR</a>