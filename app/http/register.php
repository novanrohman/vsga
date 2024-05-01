<?php 
require_once("../../config/config.php");

if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // cek username
    $validate = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
    if (mysqli_num_rows($validate) > 0) {
        $status = "ada";
    } else {

        $sql = "INSERT INTO user (username, password, role) VALUES ('$username', '$password', 'customer')";
        $result = $conn->query($sql);
        if ($result) {
            $status = "sukses";
        } else {
            $status = "gagal";
        }
        
    }
    header("Location: ../../register.php?status=" . urlencode($status));
    exit();
}

?>