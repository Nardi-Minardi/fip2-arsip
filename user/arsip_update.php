<?php 
include '../koneksi.php';
 
    $id_dokumen  = $_POST['id_dokumen'];
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
            // $ambil_kode = mysqli_query($koneksi, "SELECT kode_role FROM tb_user  where id='$id_user'");
            // $ambil_kode = mysqli_fetch_assoc($ambil_kode);
            // $kode_file = $ambil_kode['kode_role'];
            $pecah_nama = str_replace(' ' , '_', $nama_file);
            $nama_baru = "Dokumen_".$kode_dokumen."_".$nama_file;
            move_uploaded_file($file_tmp, '../upload/'.$nama_baru);
            // $query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
        
        }

    $update = mysqli_query($koneksi, "update tb_dokumen set waktu_upload='$waktu_upload', kode_dokumen='$kode_dokumen', nama_dokumen='$nama_dokumen', format_dokumen='$ekstensi', kategori_3='$kategori_3', kategori_4='$kategori_4', id_user='$id_user', role_user='$role_user', kode_role='$kode_role', file='$nama_baru' where id_dokumen='$id_dokumen' ");
    // var_dump($update);
    if($update){
    header("location:arsip.php?alert=sukses_edit");
    } else {
    header("location:arsip.php?alert=gagal");
    }