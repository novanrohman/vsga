<?php
include '../../config/config.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM sewa WHERE id='$id'")or die($massage="gagal");
header("location: ../../pages/admin/list.php", $massage='sukses');

?>