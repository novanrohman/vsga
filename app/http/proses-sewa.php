<?php
include_once '../../config/config.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$tgl_sewa = $_POST['tgl_sewa'];
$jml_orang = (int)$_POST['jumlah_orang']; // Cast to integer
$tujuan = $_POST['tujuan'];
$hari_sewa = (int)$_POST['hari_sewa']; // Cast to integer
$jenis_bus = $_POST['jenis_bus'];
$total_harga = (int)$_POST['total_harga']; // Cast to integer
$discount = (int)$_POST['discount']; // Cast to integer

$sql = "INSERT INTO sewa (nama, email, telp, tgl_sewa, jumlah_orang, tujuan, hari_sewa, jenis_bus, total_harga, discount) 
        VALUES ('$nama', '$email', '$telp', '$tgl_sewa', '$jml_orang', '$tujuan', '$hari_sewa', '$jenis_bus', '$total_harga', '$discount')";

$status='';
if ($conn->query($sql) === TRUE) {
    $status = "sukses";
} else {
    $status = "gagal";
}

header("Location: ../../pages/booking.php?status=" . urlencode($status));
exit();

// $conn->close();
?>