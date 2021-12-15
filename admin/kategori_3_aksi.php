<?php 
include '../koneksi.php';
$nama  = $_POST['nama_kategori_3'];

mysqli_query($koneksi, "insert into tb_kategori_3 values (NULL,'$nama')");
header("location:kategori_3.php?alert=sukses_tambah");