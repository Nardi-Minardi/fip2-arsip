<?php 
include '../koneksi.php';
$nama  = $_POST['nama_kategori_4'];

mysqli_query($koneksi, "insert into tb_kategori_4 values (NULL,'$nama')");
header("location:kategori_4.php?alert=sukses_tambah");