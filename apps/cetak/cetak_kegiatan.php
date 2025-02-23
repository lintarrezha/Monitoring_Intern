<?php
    $id_mahasiswa = $_GET["id_mahasiswa"];
    $tanggal_awal = $_GET["tanggal_awal"];
    $tanggal_akhir = $_GET["tanggal_akhir"];

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="'.$namafile.'"');

    require('../../source/plugin/fpdf/fpdf.php');
    
    class PDF extends FPDF {
        function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
        {
            $this->Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);
        }
    }

    $pdf = new PDF('P', 'mm', 'Letter');

    include '../../config/database.php';
    include '../../config/function.php';
    $query = mysqli_query($kon, "select * from tbl_site limit 1");    
    $row = mysqli_fetch_array($query);
    $pimpinan = $row['pimpinan'];
    $pembimbing = $row['pembimbing'];

    $pdf->AddPage();

    $pdf->Image('../../apps/pengaturan/logo/'.$row['logo'],15,7,20,20);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(0,7,strtoupper($row['nama_instansi']),0,1,'C');
    $pdf->SetFont('Arial','B',7);
    $pdf->Cell(0,5,$row['alamat'],0,1,'C');
    $pdf->Cell(0,7,$row['website'].' | Telp '.$row['no_telp'],0,1,'C');

    //Membuat garis (line)
    $pdf->SetLineWidth(1);
    $pdf->Line(10,31,206,31);
    $pdf->SetLineWidth(0);
    $pdf->Line(10,32,206,32);

    $sql="select * from tbl_mahasiswa where id_mahasiswa=$id_mahasiswa";
    $hasil=mysqli_query($kon,$sql);
    $data = mysqli_fetch_array($hasil); 

    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,5,'',0,1,'C');
    $pdf->Cell(0,7,'JURNAL KEGIATAN HARIAN',0,1,'C');
    $pdf->Cell(0,5,'',0,1,'C');
    $pdf->Cell(0,5,'',0,1,'C');
    $pdf->Cell(0,5,'',0,1,'C');

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,6,'Nama ',0,0);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(31,6,': '.$data['nama'],0,1);
    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,6,'NIM ',0,0);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(31,6,': '.$data['nim'],0,1);
    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,6,'Universitas ',0,0);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(31,6,': '.$data['universitas'],0,1);
    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,6,'Jurusan ',0,0);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(31,6,': '.$data['jurusan'],0,1);

    //Membuat header tabel
    $pdf->Cell(10,3,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,6,'No',1,0,'C');
    $pdf->Cell(20,6,'Hari',1,0,'C');
    $pdf->Cell(30,6,'Tanggal',1,0,'C');
    $pdf->Cell(30,6,'Jam',1,0,'C');
    $pdf->Cell(105,6,'Kegiatan',1,1,'C');

    $pdf->SetFont('Arial','',10);

    $no = 0;

    $sql="SELECT tbl_kegiatan.id_kegiatan, tbl_kegiatan.id_mahasiswa, 
    DATE_FORMAT(tbl_kegiatan.tanggal, '%d-%M-%Y') AS tanggal, 
    DAYNAME(tbl_kegiatan.tanggal) AS hari, 
    tbl_kegiatan.waktu_awal, tbl_kegiatan.waktu_akhir,
    tbl_kegiatan.kegiatan
    FROM tbl_kegiatan WHERE tbl_kegiatan.id_mahasiswa = '$id_mahasiswa'
    AND tbl_kegiatan.tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
    ORDER BY tbl_kegiatan.tanggal ASC;";
    $hasil=mysqli_query($kon,$sql);

    while ($data = mysqli_fetch_assoc($hasil)){
        $hari = $data["hari"];
        $tgl = date("d", strtotime($data['tanggal']));
        $bulan = date("m", strtotime($data['tanggal']));
        $tahun = date("Y", strtotime($data['tanggal']));    
        $waktu_awal = date("H:i", strtotime($data['waktu_awal']));
        $waktu_akhir = date("H:i", strtotime($data['waktu_akhir']));
        $no++;

        // Store starting Y position
        $startY = $pdf->GetY();
        
        // Get height needed for wrapped text
        $pdf->SetX($pdf->GetX() + 90); // Move to kegiatan column position
        $pdf->MultiCell(105, 6, $data["kegiatan"], 0, 'L');
        $endY = $pdf->GetY();
        $height = $endY - $startY;
        
        // Reset position and draw all cells with correct height
        $pdf->SetY($startY);
        
        // Draw cells with borders first
        $pdf->Cell(10, $height, '', 1, 0, 'C');
        $pdf->Cell(20, $height, '', 1, 0, 'C');
        $pdf->Cell(30, $height, '', 1, 0, 'C');
        $pdf->Cell(30, $height, '', 1, 0, 'C');
        
        // Draw the kegiatan cell border
        $pdf->Cell(105, $height, '', 1, 1, 'L');
        
        // Reset position and draw content
        $pdf->SetY($startY);
        $pdf->Cell(10, $height, $no, 0, 0, 'C');
        $pdf->Cell(20, $height, MendapatkanHari($hari), 0, 0, 'C');
        $pdf->Cell(30, $height, $tgl.' '.MendapatkanBulan($bulan).' '.$tahun, 0, 0, 'C');
        $pdf->Cell(30, $height, $waktu_awal.' - '.$waktu_akhir, 0, 0, 'C');
        
        // Print the wrapped text
        $pdf->MultiCell(105, 6, $data["kegiatan"], 0, 'L');
        
        // Check if we need to add a new page
        if($pdf->GetY() > 250) {
            $pdf->AddPage();
            
            // Reprint the header
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(10,6,'No',1,0,'C');
            $pdf->Cell(20,6,'Hari',1,0,'C');
            $pdf->Cell(30,6,'Tanggal',1,0,'C');
            $pdf->Cell(30,6,'Jam',1,0,'C');
            $pdf->Cell(105,6,'Kegiatan',1,1,'C');
            $pdf->SetFont('Arial','',10);
        }
    }

    $tanggal=date('Y-m-d');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(340,15,'',0,1,'C');
    $pdf->Cell(340,12,'',0,1,'C');
    
    // Membuat tanda tangan sejajar
    $leftX = 40;  // Posisi X untuk tanda tangan kiri
    $rightX = 140; // Posisi X untuk tanda tangan kanan
    $currentY = $pdf->GetY();

    // Tanda tangan pimpinan (kiri)
    $pdf->SetX($leftX);
    $pdf->Cell(10,0,'Pengawas Magang',0,0,'C');
    
    // Tanda tangan pembimbing (kanan)
    $pdf->SetX($rightX);
    $pdf->Cell(50,0,'Pembimbing Magang',0,1,'C');
    
    // Nama pimpinan dan pembimbing
    $pdf->SetY($currentY + 30);
    $pdf->SetX($leftX);
    $pdf->Cell(10,0,$pimpinan,0,0,'C');
    
    $pdf->SetX($rightX);
    $pdf->Cell(50,0,$pembimbing,0,1,'C');


    $kueri="select nama from tbl_mahasiswa where id_mahasiswa=$id_mahasiswa";
    $hasilsql=mysqli_query($kon,$kueri);
    $hasilnama = mysqli_fetch_array($hasilsql); 
    $nama=$hasilnama['nama'];
    $namafile = 'Kegiatan Harian-'.$nama.'-'.date('YmdHis').'.pdf';
    $pdf->Output('files/'.$namafile, 'F');
    readfile('files/'.$namafile);
?>