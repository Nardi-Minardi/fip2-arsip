<?php 
include '../koneksi.php';
$id_kategori_3  = $_POST['id'];
$nama  = $_POST['nama_kategori_3'];

mysqli_query($koneksi, "update tb_kategori_3 set nama_kategori_3='$nama' where id_kategori_3='$id_kategori_3'");
header("location:kategori_3.php?alert=sukses_edit");
