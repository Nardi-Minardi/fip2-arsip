<?php 
include '../koneksi.php';
if(isset($_POST['id']))
{
    $id_role = $_POST['id'];
    $data = mysqli_query($koneksi, "select * from tb_role where id='$id_role'");
    $d = mysqli_fetch_assoc($data);
	echo json_encode($d);
	
}