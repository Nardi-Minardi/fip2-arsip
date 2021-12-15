<?php 
include '../koneksi.php';
$nama  = $_POST['nama_user'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$id_role  = $_POST['id_role'];
$nama_role  = $_POST['nama_role'];
$kode_role  = $_POST['kode_role'];


$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	mysqli_query($koneksi, "insert into tb_user (nama_user, username, password, id_role, nama_role, kode_role, foto) 
                    values ('$nama','$username','$password','$id_role','$nama_role','$kode_role',NULL)");
	header("location:user.php?alert=sukses");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:user.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into tb_user (nama_user, username, password, id_role, nama_role, kode_role, foto) 
                    values ('$nama','$username','$password','$id_role','$nama_role','$kode_role','$file_gambar')");
		header("location:user.php?alert=sukses");
	}
}

