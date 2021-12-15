<?php 
include '../koneksi.php';
$id_kategori_4 = $_GET['id'];

$data = mysqli_query($koneksi, "select * from tb_kategori_4 where id_kategori_4='$id_kategori_4'");
mysqli_query($koneksi, "delete from tb_kategori_4 where id_kategori_4='$id_kategori_4'");
header("location:kategori_4.php?alert=sukses_hapus");
