<div class="row">
    <ol class="breadcrumb">
        <li><a href="index.php?page=beranda">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">Profil</li>
    </ol>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Profil Mahasiswa</h3>
            </div>
            <div class="panel-body">
                <?php
                include 'config/database.php';
                $kode_pengguna = $_SESSION["kode_pengguna"];
                $sql = "SELECT * FROM tbl_mahasiswa WHERE kode_mahasiswa='$kode_pengguna' LIMIT 1";
                $hasil = mysqli_query($kon, $sql);
                $data = mysqli_fetch_array($hasil);
                ?>

                <?php
                if (isset($_GET['pengguna'])) {
                    if ($_GET['pengguna'] == 'berhasil') {
                        echo "<div class='alert alert-success'><strong>Berhasil!</strong> Ubah Password berhasil</div>";
                    } else if ($_GET['pengguna'] == 'gagal') {
                        echo "<div class='alert alert-danger'><strong>Gagal!</strong> Ubah Password gagal</div>";
                    }
                }
                ?>

                <div class="row">
                    <div class="col-md-3 text-center">
                        <div class="profile-image-container">
                            <img src="apps/mahasiswa/foto/<?php echo $data['foto']; ?>" id="preview" class="img-thumbnail profile-image" alt="Foto Profil">
                        </div>
                        <div class="mt-3">
                            <button kode_mahasiswa="<?php echo $data['kode_mahasiswa']; ?>" class="password btn btn-info btn-block">
                                <i class="fa fa-key"></i> Ubah Password
                            </button>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="profile-info">
                            <table class="table table-hover profile-table">
                                <tbody>
                                    <tr>
                                        <td class="profile-label">
                                            <div class="label-container">
                                                <i class="fa fa-user"></i>
                                                <span>Nama</span>
                                            </div>
                                        </td>
                                        <td class="profile-value"><?php echo $data['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="profile-label">
                                            <div class="label-container">
                                                <i class="fa fa-id-card"></i>
                                                <span>NIM</span>
                                            </div>
                                        </td>
                                        <td class="profile-value"><?php echo $data['nim']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="profile-label">
                                            <div class="label-container">
                                                <i class="fa fa-university"></i>
                                                <span>Universitas</span>
                                            </div>
                                        </td>
                                        <td class="profile-value"><?php echo $data['universitas']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="profile-label">
                                            <div class="label-container">
                                                <i class="fa fa-graduation-cap"></i>
                                                <span>Jurusan</span>
                                            </div>
                                        </td>
                                        <td class="profile-value"><?php echo $data['jurusan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="profile-label">
                                            <div class="label-container">
                                                <i class="fa fa-calendar"></i>
                                                <span>Mulai Magang</span>
                                            </div>
                                        </td>
                                        <td class="profile-value"><?php echo date('d/m/Y', strtotime($data["mulai_magang"])); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="profile-label">
                                            <div class="label-container">
                                                <i class="fa fa-calendar-check-o"></i>
                                                <span>Selesai Magang</span>
                                            </div>
                                        </td>
                                        <td class="profile-value"><?php echo date('d/m/Y', strtotime($data["akhir_magang"])); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="profile-label">
                                            <div class="label-container">
                                                <i class="fa fa-phone"></i>
                                                <span>Email</span>
                                            </div>
                                        </td>
                                        <td class="profile-value"><?php echo $data['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="profile-label">
                                            <div class="label-container">
                                                <i class="fa fa-phone"></i>
                                                <span>No. Telp</span>
                                            </div>
                                        </td>
                                        <td class="profile-value"><?php echo $data['no_telp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="profile-label">
                                            <div class="label-container">
                                                <i class="fa fa-map-marker"></i>
                                                <span>Alamat</span>
                                            </div>
                                        </td>
                                        <td class="profile-value"><?php echo $data['alamat']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .panel {
        border: 1px solid #ddd;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .panel-heading {
        background-color: #f5f5f5;
        border-bottom: 1px solid #ddd;
        padding: 15px;
    }

    .panel-title {
        color: #555;
        font-size: 18px;
        margin: 0;
    }

    .profile-image-container {
        padding: 15px;
        background: #fff;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .profile-image {
        width: 100%;
        max-width: 200px;
        height: auto;
    }

    .profile-info {
        background: #fff;
        padding: 15px;
        border: 1px solid #ddd;
    }

    .profile-table {
        margin-bottom: 0;
    }

    .profile-label {
        width: 30%;
        vertical-align: middle !important;
        padding: 12px 15px !important;
    }

    .label-container {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .label-container i {
        width: 20px;
        text-align: center;
        color: #666;
        font-size: 16px;
    }

    .label-container span {
        font-weight: 600;
        color: #555;
    }

    .profile-value {
        vertical-align: middle !important;
        padding: 12px 15px !important;
        color: #333;
    }

    .table-hover>tbody>tr:hover {
        background-color: #f9f9f9;
    }

    .btn-info {
        background-color: #5bc0de;
        border-color: #46b8da;
    }

    .btn-info:hover {
        background-color: #31b0d5;
        border-color: #269abc;
    }

    .alert {
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 4px;
    }

    .table>tbody>tr>td {
        border-top: 1px solid #eee;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="judul"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div id="tampil_data">
                    <!-- Data akan di load menggunakan AJAX -->
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>

        </div>
    </div>
</div>
<!-- Modal -->

<script>
    // Setting password mahasiswa
    $('.password').on('click', function() {
        var kode_mahasiswa = $(this).attr("kode_mahasiswa");
        $.ajax({
            url: 'apps/pengguna/ubah_password.php',
            method: 'post',
            data: {
                kode_mahasiswa: kode_mahasiswa
            },
            success: function(data) {
                $('#tampil_data').html(data);
                document.getElementById("judul").innerHTML = 'Ubah Password';
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });
</script>