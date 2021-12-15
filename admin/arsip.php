<?php include 'header.php'; ?>

<div class="content-error">
    <?php 
    if(isset($_GET['alert'])){
        if($_GET['alert'] == "sukses"){
            echo "<div class='alert alert-success'>Berhasil Tambah Data</div>";
        }else if($_GET['alert'] == "sukses_edit"){
            echo "<div class='alert alert-success'>Berhasil Edit Data</div>";
        }else if($_GET['alert'] == "sukses_hapus"){
            echo "<div class='alert alert-success'>Berhasil Hapus Data</div>";
        }else if($_GET['alert'] == "gagal"){
            echo "<div class='alert alert-danger'>Gagal Tambah Data</div>";
        }
    }
    ?>
</div>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Arsip</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Arsip</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel">

        <div class="panel-heading">
            <h3 class="panel-title">Semua Arsip</h3>
        </div>
        <div class="panel-body">

            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Waktu Upload</th>
                        <th>Dokumen</th>
                       
                        <th>Kategori</th>
                        <th>Role User</th>
                        <th>Nama User Pengupload</th>
                        <th class="text-center" width="20%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_dokumen,tb_kategori_3,tb_kategori_4,tb_user WHERE id_user=id and kategori_4=id_kategori_4 and kategori_3=id_kategori_3 ORDER BY id_dokumen ASC");
                    // $data =  mysqli_fetch_array($query);
                    foreach($query as $row){?>
                        <tr>  
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('H:i:s  d-m-Y',strtotime($row['waktu_upload'])) ?></td>
                            <td>

                                <b>KODE</b> : <?php echo $row['kode_dokumen'] ?><br>
                                <b>Nama</b> : <?php echo $row['nama_dokumen'] ?><br>
                                <b>Format</b> : <?php echo $row['format_dokumen'] ?><br>

                            </td>
                           
                            <td><?php echo $row['nama_kategori_3'] ?> - <?php echo $row['nama_kategori_4'] ?></td>
                            <td><?php echo $row['role_user'] ?></td>     
                            <td><?php echo $row['nama_user'] ?></td>
                            <td class="text-center">


                                <div class="modal fade" id="exampleModal_<?php echo $row['id_dokumen']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">PERINGATAN!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data ini? <br>file dan semua yang berhubungan akan dihapus secara permanen.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                                <a href="arsip_hapus.php?id=<?php echo $row['id_dokumen']; ?>" class="btn btn-primary"><i class="fa fa-check"></i> &nbsp; Ya, hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="btn-group">
                                    <a target="_blank" class="btn btn-default" href="../upload/<?php echo $row['file']; ?>"><i class="fa fa-download"></i></a>
                                    <a target="_blank" href="arsip_preview.php?id=<?php echo $row['id_dokumen']; ?>" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal_<?php echo $row['id_dokumen']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                               
                            </td>
                        </tr>
                        
                    <?php }?>
                </tbody>
            </table>


        </div>

    </div>
</div>


<?php include 'footer.php'; ?>