<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$id_user = $_SESSION['id'];
$id_dokumen = $_GET['id'];

mysqli_query($koneksi, "insert into tb_riwayat_download values (NULL,'$waktu','$id_user','$id_dokumen')")or die(mysqli_error($koneksi));

$data = mysqli_query($koneksi,"select * from tb_dokumen where id_dokumen='$id_dokumen'");
$d = mysqli_fetch_assoc($data);
header("location:../upload/".$d['file']);

