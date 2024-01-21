<?php include 'template/headerpengguna.php';?>
<?php 
if(!empty($_POST['add_pengguna'])){
    $NamaPengguna = $_POST['NamaPengguna'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $NamaDepan = $_POST['NamaDepan'];
    $NamaBelakang = $_POST['NamaBelakang'];
    $NoHP = $_POST['NoHP'];
    $Alamat = $_POST['Alamat'];
    $idAkses = $_POST['IDAkses'];
    
    mysqli_query($conn,"insert into pengguna(NamaPengguna, Password, NamaDepan, NamaBelakang, NoHP, Alamat, IDAkses) values 
        ('$NamaPengguna','$Password','$NamaDepan','$NamaBelakang','$NoHP','$Alamat','$idAkses')")
    or die(mysqli_error($conn));
    echo '<script>window.location="addpengguna.php"</script>';
}
?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- pengguna -->
<div class="col-md-12 mb-3">
    <div class="card">
    <div class="card-header bg-purple">
            <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Tambah Pengguna</b></div>
    </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label><b>Nama Pengguna</b></label>
                    <input type="text" name="NamaPengguna" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Password</b></label>
                    <input type="password" name="Password" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Nama Depan</b></label>
                    <input type="text" name="NamaDepan" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Nama Belakang</b></label>
                    <input type="text" name="NamaBelakang" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>No. HP</b></label>
                    <input type="text" name="NoHP" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Alamat</b></label>
                    <input type="text" name="Alamat" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>ID Akses</b></label>
                    <div class="input-group">
                    <input type="text" name="IDAkses" class="form-control" required>
                    <div class="input-group-append">
                        <button name="add_pengguna" value="simpan" class="btn btn-purple" type="submit">
                        <i class="fa fa-plus mr-2"></i>Tambah</button>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end pengguna -->


<!-- table pengguna -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Pengguna</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_pengguna" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <!-- <th>Password</th> -->
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>ID Akses</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_pengguna = mysqli_query($conn,"select * from pengguna");
                while($d = mysqli_fetch_array($data_pengguna)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['NamaPengguna']; ?></td>
                    <!-- <td><?php echo $d['Password']; ?></td> -->
                    <td><?php echo $d['NamaDepan']; ?></td>
                    <td><?php echo $d['NamaBelakang']; ?></td>
                    <td><?php echo $d['Alamat']; ?></td>
                    <td><?php echo $d['NoHP']; ?></td>
                    <td><?php echo $d['IDAkses']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="editpengguna.php?id=<?php echo $d['IDPengguna']; ?>">
                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['IDPengguna']; ?>" 
                        onclick="javascript:return confirm('Hapus Data Pengguna ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
        </tbody>
        </table>
        </div>
    </div>
</div>
<!-- end table pengguna -->

</div><!-- end row col-md-9 -->
</div>
  
<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $idPengguna= $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM pengguna WHERE IDPengguna ='$idPengguna'");
    echo '<script>window.location="addpengguna.php"</script>';
}
?>
<?php include 'template/footer.php';?>
