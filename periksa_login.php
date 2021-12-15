<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

	$login = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['id'];
		$_SESSION['nama'] = $data['nama_admin'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['status'] = "admin_login";

		header("location:admin/");
	}else{
		header("location:login.php?alert=gagal");
	}



