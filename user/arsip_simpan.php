<?php 
include '../koneksi.php';

    $waktu_upload  = $_POST['waktu_upload'];
    $kode_dokumen = $_POST['kode_dokumen'];
    $nama_dokumen = $_POST['nama_dokumen'];
    $kategori_3 = $_POST['kategori_3'];
    $kategori_4 = $_POST['kategori_4'];

    $id_user  = $_POST['id_user'];
    $kode_role = $_POST['kode_role'];
    $role_user = $_POST['role_user'];

    //simpan gambar
	$ekstensi_diperbolehkan	= array('png','jpg','jpeg','pdf');
	$nama_file = $_FILES['file']['name'];
	$x = explode('.', $nama_file);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];	

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		   	$pecah_nama = str_replace(' ' , '_', $nama_file);
            $nama_baru = "Dokumen_".$kode_dokumen."_".$nama_file;
			move_uploaded_file($file_tmp, '../upload/'.$nama_baru);
			// $query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
           
        }
        
    $simpan = mysqli_query($koneksi, "insert into tb_dokumen (waktu_upload, kode_dokumen, nama_dokumen, format_dokumen, kategori_3, kategori_4, id_user, role_user, kode_role, file) 
                    values ('$waktu_upload','$kode_dokumen','$nama_dokumen','$ekstensi','$kategori_3','$kategori_4','$id_user','$role_user','$kode_role','$nama_baru')");
    // var_dump($simpan);
    if($simpan){
        header("location:arsip.php?alert=sukses");
    } else {
        header("location:arsip.php?alert=gagal");
    }




