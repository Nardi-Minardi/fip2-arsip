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
                                <h4 style="margin-bottom: 0px">Data User</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">User</span></li>
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
            <h3 class="panel-title">Data User</h3>
        </div>
        <div class="panel-body">

            <div class="pull-right">
                <a href="user_tambah.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah user</a>
            </div>
            <br>
            <br>
            <br>

            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th width="5%">Foto</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th class="text-center" width="10%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $user = mysqli_query($koneksi,"SELECT * FROM tb_user ORDER BY id DESC");
                    while($p = mysqli_fetch_array($user)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <?php 
                                if($p['foto'] == ""){
                                    ?>
                                    <img class="img-user" src="../gambar/sistem/user.png">
                                    <?php
                                }else{
                                    ?>
                                    <img class="img-user" src="../gambar/user/<?php echo $p['foto']; ?>">
                                    <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $p['nama_user'] ?></td>
                            <td><?php echo $p['username'] ?></td>
                            <td><?php echo $p['nama_role'] ?></td>

                            <div class="modal fade" id="exampleModal_<?php echo $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <a href="user_hapus.php?id=<?php echo $p['id']; ?>" class="btn-sm btn-primary"><i class="fa fa-check"></i> &nbsp; Ya, hapus</a>
                                        </div>
                                    </div>
                            </div>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="user_edit.php?id=<?php echo $p['id']; ?>" class="btn btn-default"><i class="fa fa-wrench"></i></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal_<?php echo $p['id']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>
            </table>


        </div>

    </div>
</div>


<?php include 'footer.php'; ?>