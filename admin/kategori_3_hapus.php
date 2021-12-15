<?php 
include '../koneksi.php';
$id_kategori_3 = $_GET['id'];

$data = mysqli_query($koneksi, "select * from tb_kategori_3 where id_kategori_3='$id_kategori_3'");
mysqli_query($koneksi, "delete from tb_kategori_3 where id_kategori_3='$id_kategori_3'");
header("location:kategori_3.php?alert=sukses_hapus");
