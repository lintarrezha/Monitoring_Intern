<!DOCTYPE html>
<html>

<head>
    <title>Detail Mahasiswa</title>
    <!-- Import Font -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php
    include '../../config/database.php';
    include '../../config/function.php';
    $id_mahasiswa = $_POST["id_mahasiswa"];
    $sql = "SELECT * FROM tbl_mahasiswa WHERE id_mahasiswa=$id_mahasiswa LIMIT 1";
    $hasil = mysqli_query($kon, $sql);
    $data = mysqli_fetch_array($hasil);
    ?>

    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <!-- Header -->
            <div class="text-center mb-4">
                <div class="w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden">
                    <?php if (!empty($data['foto'])): ?>
                        <img src="apps/mahasiswa/foto/<?php echo $data["foto"]; ?>" width="130" <?php echo $data['foto']; ?>
                            alt="Foto <?php echo $data['nama']; ?>"
                            class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden">
                            <i class="fas fa-user-graduate text-gray-400 text-4xl"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <h2 class="text-2xl font-bold text-gray-800"><?php echo $data['nama']; ?></h2>
                <p class="text-gray-600"><?php echo $data['nim']; ?></p>
            </div>

            <!-- Info Grid -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Informasi Akademik -->
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-blue-600 mb-4 flex items-center">
                        <i class="fas fa-graduation-cap" style="margin: 10px;"></i>Informasi Akademik
                    </h3>
                    <div class="space-y-3">
                        <div class="bg-white p-3 rounded-md">
                            <p class="text-gray-700 flex items-center">
                                <i class="fas fa-building" style="margin-left: 15px; margin-top: 5px; margin-right: 5px"></i>
                                <b>Universitas: </b>
                                <?php echo $data['universitas']; ?>
                            </p>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <p class="text-gray-700 flex items-center">
                                <i class="fas fa-book" style="margin-left: 15px; margin-top: 5px; margin-right: 5px"></i>
                                <b>Jurusan: </b>
                                <?php echo $data['jurusan']; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Periode Magang -->
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-green-600 mb-4 flex items-center">
                        <i class="fas fa-calendar-alt" style="margin: 15px;"></i>Periode Magang
                    </h3>
                    <div class="space-y-3">
                        <div class="bg-white p-3 rounded-md">
                            <p class="text-gray-700 flex items-center">
                                <i class="fas fa-hourglass-start" style="margin-left: 15px; margin-top: 5px; margin-right: 5px"></i>
                                <b>Mulai Magang: </b>
                                <?php
                                $tgl = date("d", strtotime($data['mulai_magang']));
                                $bulan = date("m", strtotime($data['mulai_magang']));
                                $tahun = date("Y", strtotime($data['mulai_magang']));
                                echo $tgl . ' ' . MendapatkanBulan($bulan) . ' ' . $tahun;
                                ?>
                            </p>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <p class="text-gray-700 flex items-center">
                                <i class="fas fa-hourglass-end" style="margin-left: 15px; margin-top: 5px; margin-right: 5px"></i>
                                <b>Akhir Magang: </b>
                                <?php
                                $tgl = date("d", strtotime($data['akhir_magang']));
                                $bulan = date("m", strtotime($data['akhir_magang']));
                                $tahun = date("Y", strtotime($data['akhir_magang']));
                                echo $tgl . ' ' . MendapatkanBulan($bulan) . ' ' . $tahun;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200 md:col-span-2">
                    <h3 class="text-lg font-semibold text-purple-600 mb-4 flex items-center">
                        <i class="fas fa-address-card" style="margin: 10px;"></i> Informasi Kontak
                    </h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-white p-3 rounded-md">
                            <p class="text-gray-700 flex items-center">
                                <i class="fas fa-envelope" style="margin-left: 15px; margin-top: 5px; margin-right: 5px"></i>
                                <b>Email: </b>
                                <?php echo $data['email']; ?>
                            </p>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <p class="text-gray-700 flex items-center">
                                <i class="fas fa-phone" style="margin-left: 15px; margin-top: 5px; margin-right: 5px"></i>
                                <b>No Telp: </b>
                                <?php echo $data['no_telp']; ?>
                            </p>
                        </div>
                        <div class="bg-white p-3 rounded-md md:col-span-2">
                            <p class="text-gray-700 flex items-center">
                                <i class=" fas fa-map-marker-alt" style="margin-left: 15px; margin-top: 5px; margin-right: 5px"></i>
                                <b>Alamat: </b>
                                <?php echo $data['alamat']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</body>

</html>