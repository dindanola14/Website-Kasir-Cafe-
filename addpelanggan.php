<?php include 'template/headerpengguna.php';?>
<?php 
if(!empty($_POST['add_pelanggan'])){
    $NamaPelanggan = $_POST['NamaPelanggan'];
    $NamaDepanPel = $_POST['NamaDepanPel'];
    $NamaBelakangPel = $_POST['NamaBelakangPel'];
    $NoHPPel = $_POST['NoHPPel'];
    
    mysqli_query($conn,"insert into pelanggan(NamaPelanggan, NamaDepanPel, NamaBelakangPel, NoHPPel) values ('$NamaPelanggan','$NamaDepanPel','$NamaBelakangPel','$NoHPPel')")
    or die(mysqli_error($conn));
    echo '<script>window.location="addpelanggan.php"</script>';
}
?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- pelanggan -->
<div class="col-md-12 mb-3">
    <div class="card">
    <div class="card-header bg-purple">
            <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Tambah Pelanggan</b></div>
    </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label><b>Nama Pelanggan</b></label>
                    <input type="text" name="NamaPelanggan" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Nama Depan Pelanggan</b></label>
                    <input type="text" name="NamaDepanPel" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Nama Belakang Pelanggan</b></label>
                    <input type="text" name="NamaBelakangPel" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>No. HP Pelanggan</b></label>
                    <div class="input-group">
                    <input type="text" name="NoHPPel" class="form-control" required>
                    <div class="input-group-append">
                        <button name="add_pelanggan" value="simpan" class="btn btn-purple" type="submit">
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
<!-- end pelanggan -->


<!-- table pelanggan -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Pelanggan</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_pelanggan" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Depan Pelanggan</th>
                    <th>Nama Belakang Pelanggan</th>
                    <th>No. HP Pelanggan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_pelanggan = mysqli_query($conn,"select * from pelanggan");
                while($d = mysqli_fetch_array($data_pelanggan)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['NamaPelanggan']; ?></td>
                    <td><?php echo $d['NamaDepanPel']; ?></td>
                    <td><?php echo $d['NamaBelakangPel']; ?></td>
                    <td><?php echo $d['NoHPPel']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="editpelanggan.php?id=<?php echo $d['IDPelanggan']; ?>">
                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['IDPelanggan']; ?>" 
                        onclick="javascript:return confirm('Hapus Data Pelanggan ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
        </tbody>
        </table>
        </div>
    </div>
</div>
<!-- end table pelanggan -->

</div><!-- end row col-md-9 -->
</div>
  
<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $idPelanggan= $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM pelanggan WHERE IDPelanggan ='$idPelanggan'");
    echo '<script>window.location="addpelanggan.php"</script>';
}
?>
<?php include 'template/footer.php';?>
