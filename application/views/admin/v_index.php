<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row ">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                My Dashboard
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Latest report update this week and on
            </p>
        </div>
    </div>
    <div class="row report-group">
        <div class="col-md-3">
            <div id="rep" class="item-report col-md-12">
                <div class="row">
                    <div class="content col-md-12">
                        <div class="item-emblem">
                            <p class="icon-item-report">
                                <i class="fa fa-users"></i>
                            </p>
                        </div>
                        <p class="title-item">
                            Student
                        </p>
                        <p class="sub-title-item">
                            Total Number of Students
                        </p>
                        <p class="value-item">
                            <?php echo $this->db->query("SELECT * FROM siswa WHERE status_siswa='Aktif'")->num_rows(); ?>
                        </p>
                        <p class="des-item">
                            Aktif
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div id="rep1" class="item-report col-md-12">
                <div class="row">
                    <div class="content col-md-12">
                        <div class="item-emblem1">
                            <p class="icon-item-report">
                                <i class="fa fa-tablet"></i>
                            </p>
                        </div>
                        <p class="title-item">
                            Class
                        </p>
                        <p class="sub-title-item">
                            Total Number of Classes
                        </p>
                        <p class="value-item">
                            <?php echo $this->db->query("SELECT * FROM kelas")->num_rows(); ?>
                        </p>
                        <p class="des-item">
                            Aktif
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div id="rep2" class="item-report col-md-12">
                <div class="row">
                    <div class="content col-md-12">
                        <div class="item-emblem2">
                            <p class="icon-item-report">
                                <i class="fa fa-book"></i>
                            </p>
                        </div>
                        <p class="title-item">
                            Lesson
                        </p>
                        <p class="sub-title-item">
                            Total Number of Lessons
                        </p>
                        <p class="value-item">
                            <?php echo $this->m_data->get_data('mapel')->num_rows(); ?>
                        </p>
                        <p class="des-item">
                            Aktif
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div id="rep3" class="item-report col-md-12">
                <div class="row">
                    <div class="content col-md-12">
                        <div class="item-emblem3">
                            <p class="icon-item-report">
                                <i class="fa fa-user-secret"></i>
                            </p>
                        </div>
                        <p class="title-item">
                            Teacher
                        </p>
                        <p class="sub-title-item">
                            Total Number of Teachers
                        </p>
                        <p class="value-item">
                            <?php echo $this->db->query("SELECT * FROM guru WHERE status='aktif'")->num_rows(); ?>
                        </p>
                        <p class="des-item">
                            Aktif
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <hr>
    <center>
        <h2>Wellcome</h2>
        <div class='container'>
            Seconds : <div id='seconds'></div>
        </div>
        <p>System Commputer Based Test SMK Darmawan</p>
    </center>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Script -->
<script type='text/javascript'>
    var count = 5;
    var setawal = 5;
    var myInterval;
    // Active
    window.addEventListener('blur', startTimer);

    // Inactive
    window.addEventListener('focus', stopTimer);

    function timerHandler() {
        count--;
        document.getElementById("seconds").innerHTML = count;
    }

    // Start timer
    function startTimer() {
        console.log('focus');
        myInterval = window.setInterval(timerHandler, 1000);
    }

    // Stop timer
    function stopTimer() {
        window.clearInterval(myInterval);
        count = setawal;
    }
</script>