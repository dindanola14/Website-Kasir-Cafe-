<?php include 'template/headerpengguna.php';?>
<?php 
if(!empty($_POST['add_supplier'])){
    $NamaSupplier = $_POST['NamaSupplier'];
    $NamaDepanSup = $_POST['NamaDepanSup'];
    $NamaBelakangSup = $_POST['NamaBelakangSup'];
    $NoHPSup = $_POST['NoHPSup'];
    
    mysqli_query($conn,"insert into supplier(NamaSupplier, NamaDepanSup, NamaBelakangSup, NoHPSup) values('$NamaSupplier','$NamaDepanSup','$NamaBelakangSup','$NoHPSup')")
    or die(mysqli_error($conn));
    echo '<script>window.location="addsupplier.php"</script>';
}
?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- supplier -->
<div class="col-md-12 mb-3">
    <div class="card">
    <div class="card-header bg-purple">
            <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Tambah Supplier</b></div>
    </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label><b>Nama Supplier</b></label>
                    <input type="text" name="NamaSupplier" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Nama Depan Supplier</b></label>
                    <input type="text" name="NamaDepanSup" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Nama Belakang Supplier</b></label>
                    <input type="text" name="NamaBelakangSup" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>No. HP Supplier</b></label>
                    <div class="input-group">
                    <input type="text" name="NoHPSup" class="form-control" required>
                    <div class="input-group-append">
                        <button name="add_supplier" value="simpan" class="btn btn-purple" type="submit">
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
<!-- end supplier -->


<!-- table supplier -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Supplier</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_supplier" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Nama Depan Supplier</th>
                    <th>Nama Belakang Supplier</th>
                    <th>No. HP Supplier</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_supplier = mysqli_query($conn,"select * from supplier");
                while($d = mysqli_fetch_array($data_supplier)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['NamaSupplier']; ?></td>
                    <td><?php echo $d['NamaDepanSup']; ?></td>
                    <td><?php echo $d['NamaBelakangSup']; ?></td>
                    <td><?php echo $d['NoHPSup']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="editsupplier.php?id=<?php echo $d['IDSupplier']; ?>">
                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['IDSupplier']; ?>" 
                        onclick="javascript:return confirm('Hapus Data Supplier ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
        </tbody>
        </table>
        </div>
    </div>
</div>
<!-- end table supplier -->

</div><!-- end row col-md-9 -->
</div>
  
<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $idSupplier = $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM supplier WHERE IDSupplier ='$idSupplier'");
    echo '<script>window.location="addsupplier.php"</script>';
}
?>
<?php include 'template/footer.php';?>
