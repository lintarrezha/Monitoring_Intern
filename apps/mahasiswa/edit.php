<?php
session_start();
if (isset($_POST['edit_mahasiswa'])) {
    include '../../config/database.php';
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        mysqli_query($kon, "START TRANSACTION");
        $id_mahasiswa = input($_POST["id_mahasiswa"]);
        $nama = input($_POST["nama"]);
        $universitas = input($_POST["universitas"]);
        $jurusan = input($_POST["jurusan"]);
        $nim = input($_POST["nim"]);
        $mulai_magang = input($_POST["mulai_magang"]);
        $akhir_magang = input($_POST["akhir_magang"]);
        $no_telp = input($_POST["no_telp"]);
        $alamat = input($_POST["alamat"]);
        $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg', 'gif');
        $pengguna = input($_POST["pengguna"]);
        $email = input($_POST["email"]);

        $foto_saat_ini = $_POST['foto_saat_ini'];
        $foto_baru = $_FILES['foto_baru']['name'];
        $reset_foto = $_POST['reset_foto'] === "1";

        $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg', 'gif');
        $x = explode('.', $foto_baru);
        $ekstensi = strtolower(end($x));
        $ukuran    = $_FILES['foto_baru']['size'];
        $file_tmp = $_FILES['foto_baru']['tmp_name'];


        if ($reset_foto) {
            // Delete current photo if it's not already the default
            if ($foto_saat_ini != 'foto_default.png') {
                unlink("foto/" . $foto_saat_ini);
            }
            $sql = "UPDATE tbl_mahasiswa SET
                nama='$nama',
                universitas='$universitas',
                jurusan='$jurusan',
                nim='$nim',
                mulai_magang='$mulai_magang',
                akhir_magang='$akhir_magang',
                alamat='$alamat',
                no_telp='$no_telp',
                foto='foto_default.png'
                WHERE id_mahasiswa=$id_mahasiswa";
        } else {
            $foto_baru = $_FILES['foto_baru']['name'];
            $x = explode('.', $foto_baru);
            $ekstensi = strtolower(end($x));
            $ukuran    = $_FILES['foto_baru']['size'];
            $file_tmp = $_FILES['foto_baru']['tmp_name'];

            if (!empty($foto_baru)) {
                if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                    move_uploaded_file($file_tmp, 'foto/' . $foto_baru);
                    if ($foto_saat_ini != 'foto_default.png') {
                        unlink("foto/" . $foto_saat_ini);
                    }
                    $sql = "UPDATE tbl_mahasiswa SET
                        nama='$nama',
                        universitas='$universitas',
                        jurusan='$jurusan',
                        nim='$nim',
                        mulai_magang='$mulai_magang',
                        akhir_magang='$akhir_magang',
                        alamat='$alamat',
                        no_telp='$no_telp',
                        email='$email',
                        foto='$foto_baru'
                        WHERE id_mahasiswa=$id_mahasiswa";
                }
            } else if (!empty($_FILES['foto_baru']['name'])) {
                $foto_baru = $_FILES['foto_baru']['name'];
                $x = explode('.', $foto_baru);
                $ekstensi = strtolower(end($x));
                $ukuran    = $_FILES['foto_baru']['size'];
                $file_tmp = $_FILES['foto_baru']['tmp_name'];

                if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                    move_uploaded_file($file_tmp, 'foto/' . $foto_baru);
                    if ($foto_saat_ini != 'foto_default.png') {
                        unlink("foto/" . $foto_saat_ini);
                    }

                    $sql = "UPDATE tbl_mahasiswa SET
                        nama='$nama',
                        universitas='$universitas',
                        jurusan='$jurusan',
                        nim='$nim',
                        mulai_magang='$mulai_magang',
                        akhir_magang='$akhir_magang',
                        alamat='$alamat',
                        no_telp='$no_telp',
                        email='$email',
                        foto='$foto_baru'
                        WHERE id_mahasiswa=$id_mahasiswa";
                }
            } else {
                $sql = "UPDATE tbl_mahasiswa SET
                    nama='$nama',
                    universitas='$universitas',
                    jurusan='$jurusan',
                    nim='$nim',
                    mulai_magang='$mulai_magang',
                    akhir_magang='$akhir_magang',
                    no_telp='$no_telp',
                    email='$email',
                    alamat='$alamat'
                    WHERE id_mahasiswa=$id_mahasiswa";
            }
        }

        $edit_mahasiswa = mysqli_query($kon, $sql);
        if ($edit_mahasiswa) {
            mysqli_query($kon, "COMMIT");
            header("Location:../../index.php?page=mahasiswa&edit=berhasil");
        } else {
            mysqli_query($kon, "ROLLBACK");
            header("Location:../../index.php?page=mahasiswa&edit=gagal");
        }
    }
}
?>

<?php
include '../../config/database.php';
$id_mahasiswa = $_POST["id_mahasiswa"];
$sql = "select * from tbl_mahasiswa where id_mahasiswa=$id_mahasiswa limit 1";
$hasil = mysqli_query($kon, $sql);
$data = mysqli_fetch_array($hasil);
?>

<form action="apps/mahasiswa/edit.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Nama Lengkap :</label>
                <input type="hidden" name="id_mahasiswa" class="form-control" value="<?php echo $data['id_mahasiswa']; ?>">
                <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama Mahasiswa" required>

            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Universitas :</label>
                <input type="text" name="universitas" class="form-control" value="<?php echo $data['universitas']; ?>" placeholder="Masukan Nama Universitas" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Jurusan :</label>
                <input type="text" name="jurusan" class="form-control" value="<?php echo $data['jurusan']; ?>" placeholder="Masukan Nama Jurusan" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Nomor Induk Mahasiswa :</label>
                <input type="text" name="nim" class="form-control" value="<?php echo $data['nim']; ?>" placeholder="Masukan Nomor Induk Mahasiswa" required>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Mulai Magang :</label>
                <input type="date" name="mulai_magang" class="form-control" value="<?php echo $data['mulai_magang']; ?>" required>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Akhir Magang :</label>
                <input type="date" name="akhir_magang" class="form-control" value="<?php echo $data['akhir_magang']; ?>" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>No Telp :</label>
                <input type="text" name="no_telp" class="form-control" placeholder="Masukan No Telp" value="<?php echo $data['no_telp']; ?>" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Email :</label>
                <input type="text" name="email" class="form-control" placeholder="Masukan Email" value="<?php echo $data['email']; ?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Alamat :</label>
                <textarea class="form-control" name="alamat" rows="4" id="alamat"><?php echo $data['alamat']; ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>Foto :</label><br>
            <img src="apps/mahasiswa/foto/<?php echo $data['foto']; ?>" id="preview" width="90%" class="rounded" alt="foto unggahan">
            <input type="hidden" name="foto_saat_ini" value="<?php echo $data['foto']; ?>" class="form-control" />
            <input type="hidden" name="reset_foto" id="reset_foto" value="0" />
        </div>
        <div class="col-sm-4">
            <div id="msg"></div>
            <label>Upload Foto Baru:</label>
            <input type="file" name="foto_baru" class="file">
            <div class="input-group my-3">
                <input type="text" class="form-control text-center" disabled placeholder="Upload File 1:1" id="file">
                <div class="input-group-append">
                    <button type="button" id="pilih_foto" class="browse btn btn-info" style="margin-top: 15px;"><i class="fa fa-search"></i> Pilih Foto</button>
                    <button type="button" id="reset_foto_btn" class="btn btn-secondary" style="margin-top: 15px;"><i class="fa fa-refresh"></i> Reset Foto</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <br>
                <button type="submit" name="edit_mahasiswa" id="Submit" class="btn btn-warning"><i class="fa fa-edit"></i> Update</button>
            </div>
        </div>
    </div>
</form>

<style>
    .file {
        visibility: hidden;
        position: absolute;
    }
</style>

<script>
    $(document).on("click", "#pilih_foto", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });

    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        // Proses gambar sebelum preview
        var reader = new FileReader();
        reader.onload = function(e) {
            // Buat image element sementara untuk mendapatkan dimensi asli
            var img = new Image();
            img.onload = function() {
                // Buat canvas untuk crop gambar
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');

                // Tentukan ukuran square (sisi terpendek)
                var size = Math.min(img.width, img.height);
                canvas.width = size;
                canvas.height = size;

                // Hitung posisi crop
                var srcX = (img.width - size) / 2;
                var srcY = (img.height - size) / 2;

                // Draw gambar yang sudah di-crop ke canvas
                ctx.drawImage(img, srcX, srcY, size, size, 0, 0, size, size);

                // Tampilkan hasil crop di preview
                document.getElementById("preview").src = canvas.toDataURL();
            }
            img.src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
        $("#reset_foto").val("0");
    });

    $("#reset_foto_btn").click(function() {
        // Clear file input and preview
        $(".file").val('');
        $("#file").val('');
        document.getElementById("preview").src = "apps/mahasiswa/foto/foto_default.png";
        $("#reset_foto").val("1");
    });
</script>