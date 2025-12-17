<?php
include "koneksi.php";

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$tgl_lahir = $_POST['birth_date'];

$sql = "INSERT INTO user (name, email, username, password, birth_date)
        VALUES ('$name', '$email', '$username',  md5('$password'), '$tgl_lahir')";
$query = mysqli_query($koneksi, $sql);

if($query) {
    header ("location:login.php?Register berhasil");
    exit;
} else {
    header ("location:register.php?Register gagal");
    exit;
}
?>