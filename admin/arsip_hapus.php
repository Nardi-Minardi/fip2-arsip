<?php 
include '../koneksi.php';
$id_dokumen = $_GET['id'];

// hapus file lama
$lama = mysqli_query($koneksi,"select * from tb_dokumen where id_dokumen='$id_dokumen'");
$l = mysqli_fetch_assoc($lama);
$nama_file_lama = $l['file'];
unlink("../upload/".$nama_file_lama);

mysqli_query($koneksi, "delete from tb_dokumen where id_dokumen='$id_dokumen'");
header("location:arsip.php?alert=sukses_hapus");
