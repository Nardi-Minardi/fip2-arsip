<?php 
include '../koneksi.php';
$id_kategori_4  = $_POST['id'];
$nama  = $_POST['nama_kategori_4'];

mysqli_query($koneksi, "update tb_kategori_4 set nama_kategori_4='$nama' where id_kategori_4='$id_kategori_4'");
header("location:kategori_4.php?alert=sukses_edit");
