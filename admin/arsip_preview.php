<?php include 'header.php'; ?>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Preview Arsip</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Preview Arsip</span></li>
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
        <div class="col-lg-12">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Preview Arsip</h3>
                </div>
                <div class="panel-body">

                    <a href="arsip.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

                    <br>
                    <br>

                    <?php 
                    $id_dokumen = $_GET['id'];  
                    $data = mysqli_query($koneksi,"SELECT * FROM tb_dokumen,tb_kategori_3,tb_kategori_4,tb_user WHERE id_user=id and kategori_4=id_kategori_4 and kategori_3=id_kategori_3 and id_dokumen='$id_dokumen'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <div class="row">
                            <div class="col-lg-4">

                                <table class="table">
                                    <tr>
                                        <th>Kode Dokumen</th>
                                        <td><?php echo $d['kode_dokumen']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Upload</th>
                                        <td><?php echo date('H:i:s  d-m-Y',strtotime($d['waktu_upload'])) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Dokumen</th>
                                        <td><?php echo $d['nama_dokumen']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori_3</th>
                                        <td><?php echo $d['nama_kategori_3']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori_4</th>
                                        <td><?php echo $d['nama_kategori_4']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Format Dokumen</th>
                                        <td><?php echo $d['format_dokumen']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>User Pengupload</th>
                                        <td><?php echo $d['nama_user']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Role User</th>
                                        <td><?php echo $d['nama_role']; ?></td>
                                    </tr>
                                </table>

                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                            <?php 
                            if($d['format_dokumen'] == "png" || $d['format_dokumen'] == "jpg" || $d['format_dokumen'] == "gif" || $d['format_dokumen'] == "jpeg"){
                                ?>
                                <img src="../upload/<?php echo $d['file']; ?>">
                                
                                <?php
                            }elseif($d['format_dokumen'] == "pdf"){
                                ?>

                                <div class="pdf-singe-pro">
                                    <a class="media" href="../upload/<?php echo $d['file']; ?>"></a>
                                </div>

                                <?php
                            }else{
                                ?>
                                <p>Preview tidak tersedia, silahkan <a target="_blank" style="color: blue" href="../upload/<?php echo $d['file']; ?>">Download di sini.</a></p>.
                                <?php
                            }
                            ?>

                            </div>
                        </div>





                        <?php 
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</div>



<?php include 'footer.php'; ?>