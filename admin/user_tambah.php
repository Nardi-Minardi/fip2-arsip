<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Tambah User</h4>
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

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Tambah user</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">
                        <a href="user.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>

                    <form method="post" action="user_aksi.php" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama_user" required="required">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required="required">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required="required">
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Role</label>
                            <select id="role" name="id_role" class="form-control" required="required">
                                <option value="">Pilih Role</option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * from tb_role");
                                foreach($query as $row) { ?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row['nama_role'];?></option> 
                                                
                                <?php } ?>
                                
                                <div class="form-group">
                                    <input type="hidden" name="nama_role" class="form-control" id="nama_role">
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">Kode Role</label>
                                    <input type="text" readonly name="kode_role" class="form-control" id="kode_role">
                                </div>
                               
                                
                                    
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div>
<script>
    $(document).ready(function(){
       
        $('#role').on('change', function(){
            var idRole = $(this).val();
            // console.log(idRole);
            $.ajax({
                url: 'get_role.php',
                type: 'post',
                dataType: 'json',
                data: {
                    'id': idRole
                },
                dataType: 'json',
                
                })
                .done(function(data){
                   
                    $('#nama_role').val(data.nama_role);
                    $('#kode_role').val(data.kode_role);
                    // console.log(data);
                })
                .fail(function(data,xhr,textStatus,errorThrown){
                    alert(errorThrown);
            });
            
        });

    });
</script>


<?php include 'footer.php'; ?>