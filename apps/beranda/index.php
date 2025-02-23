<div class="row">
    <ol class="breadcrumb">
        <li><a href="index.php?page=beranda">
                <em class="fa fa-home"></em>
            </a></li>
    </ol>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-dashboard"></i> Dashboard</h3>
            </div>
            <div class="panel-body">
                <!-- Welcome Section -->
                <div class="row">
                    <div class="col-md-8">
                        <?php if ($_SESSION['level']=='Admin' or $_SESSION['level']=='Admin'):?>
                            <h2><i class="fa fa-user-circle"></i> Selamat Datang, <?php echo $_SESSION["nama_admin"]; ?></h2>
                        <?php endif; ?>
                        <?php if ($_SESSION['level']=='Mahasiswa' or $_SESSION['level']=='mahasiswa'):?>
                            <h2><i class="fa fa-user-circle"></i> Selamat Datang, <?php echo $_SESSION["nama_mahasiswa"]; ?></h2>
                        <?php endif; ?>
                        
                        <?php 
                            include 'config/database.php';
                            $query = mysqli_query($kon, "select * from tbl_site limit 1");    
                            $site = mysqli_fetch_array($query);
                        ?>
                    </div>
                </div>
                <!-- System Overview -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Tenatang Sistem</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4>Sistem Monitoring Kegiatan Magang Mahasiswa <?php echo $site['nama_instansi'];?></h4>
                                        <p class="text-justify">Platform ini adalah solusi inovatif yang dirancang untuk mendukung kelancaran pengelolaan kegiatan dan kehadiran magang mahasiswa. 
                                            Melalui platform ini, Anda dapat dengan mudah mencatat kehadiran, mendokumentasikan kegiatan harian, 
                                            dan mengelola data magang secara terstruktur dan efisien.
                                            Dengan antarmuka yang ramah pengguna, sistem ini memprioritaskan kemudahan akses dan kenyamanan bagi seluruh pengguna. 
                                            Gunakan menu di sidebar untuk menjelajahi fitur-fitur yang tersedia, seperti pencatatan kehadiran, pengelolaan dokumen magang, dan pelaporan aktivitas secara real-time.
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>Batas Waktu Presensi</h4>
                                        <table class="table table-striped">
                                            <tr>
                                                <td width="30%">Dibuka</td>
                                                <td>: 08:00 WIB</td>
                                            </tr>
                                            <tr>
                                                <td>Ditutup</td>
                                                <td>: 13:00 WIB</td>
                                            </tr>
                                            <tr>
                                                <td>Hari Kerja</td>
                                                <td>: Senin - Jumat</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Current Date & Time -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="well">
                            <h3 id="date-time">
                                <script>
                                    function updateDateTime() {
                                        var now = new Date();
                                        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                        document.getElementById('date-time').innerHTML = 
                                            days[now.getDay()] + ', ' + 
                                            now.toLocaleDateString('id-ID', { 
                                                day: 'numeric',
                                                month: 'long',
                                                year: 'numeric'
                                            }) + '<br>' +
                                            now.toLocaleTimeString('id-ID');
                                    }
                                    updateDateTime();
                                    setInterval(updateDateTime, 1000);
                                </script>
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer>
                    <div class="row">
                        <div class="col-md-12 text-center copyright">
                            <hr>
                            <p>&copy; <?php echo date('Y'); ?> <?php echo $site['nama_instansi']; ?>. All Rights Reserved.</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>