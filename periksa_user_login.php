<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	var_dump($data);
	$_SESSION['id'] = $data['id'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['role'] = $data['id_role'];
	$_SESSION['kode_role'] = $data['kode_role'];
	$_SESSION['status'] = "user_login";

	header("location:user/");
}else{
	header("location:user_login.php?alert=gagal");
}

