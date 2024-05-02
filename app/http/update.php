<?php

include_once '../../config/config.php';

$id = $_POST['id'];
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

$sql = "UPDATE sewa SET 
nama = '$nama', 
email = '$email', 
telp = '$telp', 
tgl_sewa = '$tgl_sewa', 
jumlah_orang = '$jml_orang', 
tujuan = '$tujuan', 
hari_sewa = '$hari_sewa', 
jenis_bus = '$jenis_bus', 
total_harga = '$total_harga', 
discount = '$discount' 
WHERE id = '$id'";

$status='';
if ($conn->query($sql) === TRUE) {
    $status = "sukses";
} else {
    $status = "gagal";
}

// print_r($sql);

header("Location: ../../pages/admin/list.php?status=" . urlencode($status));
exit();

?>