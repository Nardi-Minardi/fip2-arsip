<?php 
include '../koneksi.php';
session_start();

$id_user = $_SESSION['id'];

$username  = $_POST['username'];
$nama  = $_POST['nama_user'];

$rand = rand();

$allowed =  array('gif','png','jpg','jpeg');

$filename = $_FILES['foto']['name'];

if($filename == ""){

	mysqli_query($koneksi, "update tb_user set nama_user='$nama', username='$username' where id='$id_user'")or die(mysqli_error($koneksi));
	header("location:profil.php?alert=sukses");

}else{

	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(in_array($ext,$allowed) ) {

		// hapus file lama
		$lama = mysqli_query($koneksi,"select * from tb_user where id='$id_user'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['foto'];
		unlink("../gambar/user/".$nama_file_lama);

		// upload file baru
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "update tb_user set nama_user='$nama', username='$username', foto='$nama_file' where id='$id_user'")or die(mysqli_error($koneksi));
		header("location:profil.php?alert=sukses");

	}else{

		header("location:profil.php?alert=gagal");
	}

}
