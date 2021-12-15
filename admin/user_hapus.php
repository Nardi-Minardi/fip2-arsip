<?php 
include '../koneksi.php';
$id_user = $_GET['id'];

$data = mysqli_query($koneksi, "select * from tb_user where id='$id_user'");
$d = mysqli_fetch_assoc($data);
$foto = $d['foto'];
unlink("../gambar/user/$foto");
mysqli_query($koneksi, "delete from tb_user where id='$id_user'");
header("location:user.php?alert=sukses_hapus");
