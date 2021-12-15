<?php 
include '../koneksi.php';
session_start();
$id_user = $_SESSION['id'];
$password = md5($_POST['password']);

mysqli_query($koneksi, "UPDATE tb_admin SET password='$password' WHERE id='$id_user'")or die(mysqli_errno());

header("location:gantipassword.php?alert=sukses");