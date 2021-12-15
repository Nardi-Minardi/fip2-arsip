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
                                <?php 
                                    $id_user = $_SESSION['id'];
                                    $role_user = $_SESSION['role'];
                                    $profil = mysqli_query($koneksi,"select * from tb_user where id='$id_user' AND id_role='$role_user'");
                                    $profil = mysqli_fetch_assoc($profil);
                                    // var_dump($profil);
                                ?><br>
                                    <h5 class="badge badge-success">Nama: <?php echo $profil['nama_user'] ?></h5>
                                    <br>
                                    <h5 class="badge badge-success">Role: <?php echo $profil['nama_role'] ?></h5>
                                    
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


    <div class="panel">

        <div class="panel-body">

            <form method="get" action="">

                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Filter Kategori 3</label>
                            <select class="form-control" name="kategori_3" required="required">
                                <option value="">Pilih kategori 3</option>
                                <?php 
                                $kategori = mysqli_query($koneksi,"SELECT * FROM tb_kategori_3");
                                while($k = mysqli_fetch_array($kategori)){
                                    ?>
                                    <option <?php if(isset($_GET['kategori_3'])){if($_GET['kategori_3'] == $k['id_kategori_3']){echo "selected='selected'";}} ?> value="<?php echo $k['id_kategori_3']; ?>"><?php echo $k['nama_kategori_3'];  ?></option>
                                    <?php 
                                }
                               
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Tampilkan">
                    </div>

                </div>

            </form>

            <form method="get" action="">

                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Filter Kategori 4</label>
                            <select class="form-control" name="kategori_4" required="required">
                                <option value="">Pilih kategori 4</option>
                                <?php 
                                $kategori = mysqli_query($koneksi,"SELECT * FROM tb_kategori_4");
                                while($k = mysqli_fetch_array($kategori)){
                                    ?>
                                    <option <?php if(isset($_GET['kategori_4'])){if($_GET['kategori_4'] == $k['id_kategori_4']){echo "selected='selected'";}} ?> value="<?php echo $k['id_kategori_4']; ?>"><?php echo $k['nama_kategori_4']; ?></option>
                                    <?php 
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Tampilkan">
                    </div>

                </div>

            </form>

                <a data-toggle="modal" data-target="#exampleModal" id="tambahData" class="btn btn-success" style="float: right; color: #fff;">Tambah Data</a>

        </div>

    </div>

    <!-- modal tambah data -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="arsip_simpan.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php 
                            $id_user = $_SESSION['id'];
                            $role_user = $_SESSION['role'];
                            $kode_role = $_SESSION['kode_role'];
                            $profil = mysqli_query($koneksi,"select * from tb_user where id='$id_user' AND id_role='$role_user'");
                            $profil = mysqli_fetch_assoc($profil);
                        ?>
                            <input type="hidden" value="<?php echo $profil['id'];?>" name="id_user" class="form-control">
                            <input type="hidden" value="<?php echo $profil['kode_role'];?>" name="kode_role" class="form-control">

                        <div>
                            <label class="control-label">Role Anda</label>
                            <input readonly type="text" value="<?php echo $profil['nama_role'];?>" name="role_user" class="form-control">
                        </div>
                        <div style="padding-top: 15px !important;">
                            <label class="control-label">Waktu Upload</label>
                            <input readonly type="text" value="<?php echo date('Y-m-d H:i:s'); ?>" name="waktu_upload" class="form-control">
                        </div>

                        <!-- mengambil data dengan kode paling besar -->
                        <?php if($profil['kode_role'] == 'EA') { ?>
                            <?php
                            $role = strtoupper($profil['kode_role']);
                            // var_dump($role);
                            $query = mysqli_query($koneksi, "SELECT max(kode_dokumen) as kodeTerbesar FROM tb_dokumen WHERE `kode_role`='$role'");
                            $data = mysqli_fetch_array($query);
                            // var_dump($data);
                            $kodeDokumen = str_replace('EA', '', $data['kodeTerbesar']);
                            // var_dump($kodeDokumen);

                            // mengambil angka dari kode terbesar, menggunakan fungsi substr
                            // dan diubah ke integer dengan (int)
                            $urutan = (int) substr($kodeDokumen, 0, 6);
                            $urutan++;
                            // membentuk kode barang baru
                            $huruf = "EA";
                            $kodeDokumen = $huruf . sprintf("%06s", $urutan);
                            // var_dump($kodeDokumen);
                            ?>
                            <div style="padding-top: 15px !important;">
                                <label class="control-label">Kode Dokumen</label>
                                <input readonly type="text" value="<?php echo $kodeDokumen; ?>" placeholder="Masukan kode dokumen" required="required" autocomplete="off" name="kode_dokumen" class="form-control">
                            </div>  
                        <?php } ?>

                        <?php if($profil['kode_role'] == 'IA') { ?>
                            <?php
                            $role = strtoupper($profil['kode_role']);
                            $query = mysqli_query($koneksi, "SELECT max(kode_dokumen) as kodeTerbesar FROM tb_dokumen  where kode_role='$role'");
                            $data = mysqli_fetch_array($query);
                            $kodeDokumen = str_replace('IA', '', $data['kodeTerbesar']);
                            // var_dump($kodeDokumen);

                            // mengambil angka dari kode terbesar, menggunakan fungsi substr
                            // dan diubah ke integer dengan (int)
                            $urutan = (int) substr($kodeDokumen, 0, 6);
                            $urutan++;
                            // membentuk kode barang baru
                            $huruf = "IA";
                            $kodeDokumen = $huruf . sprintf("%06s", $urutan);
                            // var_dump($kodeDokumen);
                            ?>
                            <div style="padding-top: 15px !important;">
                                <label class="control-label">Kode Dokumen</label>
                                <input readonly type="text" value="<?php echo $kodeDokumen; ?>" placeholder="Masukan kode dokumen" required="required" autocomplete="off" name="kode_dokumen" class="form-control">
                            </div>
                            <?php } ?>
                        
                        <div style="padding-top: 15px !important;">
                            <label class="control-label">File</label>
                            <input id="file" type="file" placeholder="Masukan nama dokumen" required="required" autocomplete="off" name="file" class="form-control">
                        </div>
                       
                        <div style="padding-top: 15px !important;">
                            <label class="control-label">Nama Dokumen</label>
                            <input type="text" placeholder="Masukan nama dokumen" required="required" autocomplete="off" name="nama_dokumen" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kategori 3</label>
                            <select name="kategori_3" class="form-control" required="required">
                                <option value="">Pilih kategori</option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * from tb_kategori_3");
                                foreach($query as $row) { ?>
                                    <option value="<?php echo $row['id_kategori_3'];?>"><?php echo $row['nama_kategori_3'];?></option>               
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kategori 4</label>
                            <select name="kategori_4" class="form-control" required="required">
                                <option value="">Pilih kategori</option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * from tb_kategori_4");
                                foreach($query as $row) { ?>
                                    <option value="<?php echo $row['id_kategori_4'];?>"><?php echo $row['nama_kategori_4'];?></option>               
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-primary" >Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal tambah data -->


    <div class="panel">

        <div class="panel-heading">
            <h3 class="panel-title">Data arsip</h3>
        </div>
        <div class="panel-body">

            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Waktu Upload</th>
                        <th>Dokumen</th>
                        <th>Kategori</th>
                        <!-- <th>User</th> -->
                        <!-- <th>Keterangan</th> -->
                        <th class="text-center" width="20%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                //    LEFT JOIN kategori_3 ON kategori_3.id_kategori_3 = dokumen.id_kategori_3 LEFT JOIN kategori_4 ON kategori_4.id_kategori_4 = dokumen.id_kategori_4 
                    $id_user = $_SESSION['id'];
                    // var_dump($id_user);
                    $no = 1;
                    if(isset($_GET['kategori_3']) ){
                        $kategori_3 = $_GET['kategori_3'];
                        $arsip = mysqli_query($koneksi,"SELECT * FROM tb_dokumen LEFT JOIN tb_kategori_3 ON tb_kategori_3.id_kategori_3 = tb_dokumen.kategori_3 LEFT JOIN tb_kategori_4 ON tb_kategori_4.id_kategori_4 = tb_dokumen.kategori_4 WHERE id_user=$id_user and kategori_3=id_kategori_3 and kategori_3='$kategori_3' ORDER BY id_dokumen ASC");
                    }else if(isset($_GET['kategori_4']) ){
                        $kategori_4 = $_GET['kategori_4'];
                        $arsip = mysqli_query($koneksi,"SELECT * FROM tb_dokumen LEFT JOIN tb_kategori_3 ON tb_kategori_3.id_kategori_3 = tb_dokumen.kategori_3 LEFT JOIN tb_kategori_4 ON tb_kategori_4.id_kategori_4 = tb_dokumen.kategori_4 WHERE id_user=$id_user and kategori_4=id_kategori_4 and kategori_4='$kategori_4' ORDER BY id_dokumen ASC");
                    } else {
                        $arsip = mysqli_query($koneksi,"SELECT * FROM tb_dokumen LEFT JOIN tb_kategori_3 ON tb_kategori_3.id_kategori_3 = tb_dokumen.kategori_3 LEFT JOIN tb_kategori_4 ON tb_kategori_4.id_kategori_4 = tb_dokumen.kategori_4 WHERE id_user=$id_user and kategori_3=id_kategori_3 and kategori_4=id_kategori_4 ORDER BY id_dokumen ASC");
                    }

                    while($p = mysqli_fetch_array($arsip)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('H:i:s  d-m-Y',strtotime($p['waktu_upload'])) ?></td>
                            <td>

                                <b>KODE</b> : <?php echo $p['kode_dokumen'] ?><br>
                                <b>Nama</b> : <?php echo $p['nama_dokumen'] ?><br>
                                <b>Format</b> : <?php echo $p['format_dokumen'] ?><br>
                                

                            </td>
                            <td><?php echo $p['nama_kategori_3'] ?> - <?php echo $p['nama_kategori_4'] ?> </td>


                             <!-- modal hapus data -->
                            <div class="modal fade" id="modalHapus_<?php echo $p['id_dokumen']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalHapusLabel">PERINGATAN!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus data ini? <br>file dan semua yang berhubungan akan dihapus secara permanen.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                            <a href="arsip_hapus.php?id=<?php echo $p['id_dokumen']; ?>" class="btn-sm btn-primary"><i class="fa fa-check"></i> &nbsp; Ya, hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal hapus data -->
                          
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-warning" href="arsip_edit.php?id=<?php echo $p['id_dokumen']; ?>"><i class="fa fa-wrench"></i></a>
                                    <a target="_blank" class="btn btn-success" href="arsip_download.php?id=<?php echo $p['id_dokumen']; ?>"><i class="fa fa-download"></i></a>
                                    <a target="_blank" href="arsip_preview.php?id=<?php echo $p['id_dokumen']; ?>" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus_<?php echo $p['id_dokumen']; ?>">
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

<script>
    $(document).ready(function(){
        $('#file').change(function () {
            var fileExtension = ['jpeg', 'jpg', 'png', 'pdf'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    alert("File berupa : "+fileExtension.join(', '));
                    a=0;
                } 
            }); 
    });
</script>


<?php include 'footer.php'; ?>