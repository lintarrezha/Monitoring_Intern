<?php
if ($_SESSION["level"] != 'Admin' and $_SESSION["level"] != 'admin') {
    echo "<br><div class='alert alert-danger'>Tidak Memiliki Hak Akses</div>";
    exit;
}
?>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="index.php?page=beranda">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">Pengaturan Website</li>
    </ol>
</div>
<!--/.row-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Profil Instansi
            </div>
            <div class="panel-body">
                <?php

                if (isset($_GET['edit'])) {
                    if ($_GET['edit'] == 'berhasil') {
                        echo "<div class='alert alert-success'><strong>Berhasil!</strong> Pengaturan Website Telah Diupdate</div>";
                    } else if ($_GET['edit'] == 'gagal') {
                        echo "<div class='alert alert-danger'><strong>Gagal!</strong> Pengaturan Website Gagal Diupdate</div>";
                    }
                }

                if (isset($_GET['absen'])) {
                    if ($_GET['absen'] == 'berhasil') {
                        echo "<div class='alert alert-success'><strong>Berhasil!</strong> Pengaturan Presensi Telah Diupdate</div>";
                    } else if ($_GET['absen'] == 'gagal') {
                        echo "<div class='alert alert-danger'><strong>Gagal!</strong> Pengaturan Presensi Gagal Diupdate</div>";
                    }
                }
                ?>

                <?php
                //Include database
                include 'config/database.php';
                //Mengambil data profil aplikasi
                $hasil = mysqli_query($kon, "select * from tbl_site order by nama_instansi desc limit 1");
                $data = mysqli_fetch_array($hasil);
                ?>

                <form action="apps/pengaturan/edit.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $data['id_site']; ?>" name="id_site">
                    </div>
                    <div class="form-group">
                        <label>Nama Instansi :</label>
                        <input type="text" class="form-control" value="<?php echo $data['nama_instansi']; ?>" name="nama_instansi" placeholder="Masukkan Nama Instansi" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Ketua/Pembimbing Lapangan Magang :</label>
                        <input type="text" class="form-control" value="<?php echo $data['pimpinan']; ?>" name="pimpinan" placeholder="Masukkan Nama Ketua" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Dosen Pembimbing Magang :</label>
                        <input type="text" class="form-control" value="<?php echo $data['pembimbing']; ?>" name="pembimbing" placeholder="Masukkan Nama Pembimbing" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat :</label>
                        <input type="text" class="form-control" value="<?php echo $data['alamat']; ?>" placeholder="Masukkan Alamat Instansi" name="alamat">
                    </div>
                    <div class="form-group">
                        <label>No Telp :</label>
                        <input type="text" class="form-control" value="<?php echo $data['no_telp']; ?>" placeholder="Masukkan Nomor Telepon" name="no_telp">
                    </div>
                    <div class="form-group">
                        <label>Website :</label>
                        <input type="text" class="form-control" value="<?php echo $data['website']; ?>" placeholder="Masukkan Alamat Website" name="website">
                    </div>
                    <div class="form-group">
                        <div id="msg"></div>
                        <label>Logo </label>
                        <input type="file" name="logo" class="file">
                        <br>
                        <img src="apps/pengaturan/logo/<?php echo $data['logo']; ?>" id="preview" width="10%" class="img-thumbnail">
                        <input type="hidden" name="logo_sebelumnya" value="<?php echo $data['logo']; ?>" />
                    </div>
                    <div class="input-group my-2">
                        <div class="input-group-append" style="margin-bottom: 10px;">
                            <button type="button" id="pilih_logo" class="browse btn btn-info"><i class="fa fa-search"></i> Ganti Logo</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="ubah_aplikasi"><i class="fa fa-edit"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Pengaturan Presensi
            </div>
            <div class="panel-body">

                <?php
                // Profil Aplikasi
                include 'config/database.php';
                $query = mysqli_query($kon, "select * from tbl_setting_absensi limit 1");
                $row = mysqli_fetch_array($query);
                $id_waktu = $row['id_waktu'];
                $mulai_absen = $row['mulai_absen'];
                $akhir_absen = $row['akhir_absen'];
                ?>

                <form action="apps/pengaturan/absensi.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $id_waktu ?>" name="id_waktu">
                    </div>
                    <div class="form-group">
                        <label>Mulai Presensi :</label>
                        <input type="time" class="form-control" value="<?php echo $mulai_absen ?>" name="mulai_absen" placeholder="Masukan Mulai Presensi" required>
                    </div>
                    <div class="form-group">
                        <label>Akhir Presensi:</label>
                        <input type="time" class="form-control" value="<?php echo $akhir_absen ?>" name="akhir_absen" placeholder="Masukan Akhir Presensi" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="ubah_absen"><i class="fa fa-edit"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .file {
        visibility: hidden;
        position: absolute;
    }
</style>

<script>
    $(document).on("click", "#pilih_logo", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });

    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>