<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Edit Arsip</h4>
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


    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Edit Data</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="arsip.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>

                    <?php 
                    $id_dokumen = $_GET['id'];              
                    $data = mysqli_query($koneksi, "SELECT * FROM tb_dokumen LEFT JOIN tb_kategori_3 ON tb_kategori_3.id_kategori_3 = tb_dokumen.kategori_3 LEFT JOIN tb_kategori_4 ON tb_kategori_4.id_kategori_4 = tb_dokumen.kategori_4 WHERE id_dokumen='$id_dokumen'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <form method="post" action="arsip_update.php" enctype="multipart/form-data">

                            <input type="hidden" name="id_dokumen" value="<?php echo $d['id_dokumen']; ?>">
                            <input type="hidden" name="id_user" value="<?php echo $profil['id'];?>">
                            <input type="hidden" name="kode_role" value="<?php echo $d['kode_role']; ?>">

                            <div class="form-group">
                                <label class="control-label">Role Anda</label>
                                <input readonly type="text" value="<?php echo $profil['nama_role'];?>" name="role_user" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Waktu Upload</label>
                                <input readonly type="text" value="<?php echo date('Y-m-d H:i:s'); ?>" name="waktu_upload" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Kode Dokumen</label>
                                <input readonly type="text" value="<?php echo $d['kode_dokumen']; ?>" required="required" autocomplete="off" name="kode_dokumen" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Dokumen</label>
                                <input type="text" value="<?php echo $d['nama_dokumen']; ?>" required="required" autocomplete="off" name="nama_dokumen" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="file" value="<?php echo $d['file']; ?>" required="required">
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
                                <select name="kategori_4" class="form-control" required="required">
                                    <option value="">Pilih kategori</option>
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * from tb_kategori_4");
                                    foreach($query as $row) { ?>
                                        <option value="<?php echo $row['id_kategori_4'];?>"><?php echo $row['nama_kategori_4'];?></option>               
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label></label>
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </div>

                        </form>

                        <?php 
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>