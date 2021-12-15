<?php 
include '../koneksi.php';
$id_user  = $_POST['id'];
$nama  = $_POST['nama_user'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$id_role  = $_POST['id_role'];
$nama_role  = $_POST['nama_role'];
$kode_role  = $_POST['kode_role'];

// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($koneksi, "update tb_user set nama_user='$nama', username='$username', password='$password', id_role='$id_role', nama_role='$nama_role', kode_role='$kode_role' where id='$id_user'");
	header("location:user.php?alert=sukses_edit");
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:user.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "update tb_user set nama_user='$nama', username='$username', password='$password', id_role='$id_role', nama_role='$nama_role', kode_role='$kode_role', foto='$x' where id='$id_user'");		
		header("location:user.php?alert=sukses_edit");
	}
}elseif($filename==""){
	mysqli_query($koneksi, "update tb_user set nama_user='$nama', username='$username', password='$password', id_role='$id_role', nama_role='$nama_role', kode_role='$kode_role', where id='$id_user'");
	header("location:user.php?alert=sukses_edit");
}

