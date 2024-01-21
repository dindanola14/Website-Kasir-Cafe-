<?php include 'template/headerpengguna.php';?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- supplier -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $idSupplier = $_POST['IDSupplier'];
    $NamaSupplier = $_POST['NamaSupplier'];
    $NamaDepanSup = $_POST['NamaDepanSup'];
    $NamaBelakangSup = $_POST['NamaBelakangSup'];
    $NoHPSup = $_POST['NoHPSup'];

    $result = mysqli_query($conn, "UPDATE supplier SET NamaSupplier='$NamaSupplier', NamaDepanSup='$NamaDepanSup', NamaBelakangSup='$NamaBelakangSup', NoHPSup='$NoHPSup' WHERE IDSupplier = '$idSupplier' ");
    if(!$result){
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>NOOO!</strong> Data gagal di update.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        ";
        } else{
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>YESSS!</strong> Data berhasil di update.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        ";
        }
}
?>
<?php
$idSupplier = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM supplier WHERE IDSupplier=$idSupplier");
while($data = mysqli_fetch_array($result))
{
    $idSupplier = $data['IDSupplier'];
    $NamaSupplier = $data['NamaSupplier'];
    $NamaDepanSup = $data['NamaDepanSup'];
    $NamaBelakangSup = $data['NamaBelakangSup'];
    $NoHPSup = $data['NoHPSup'];
}
?>
<div class="card">
<div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Update Supplier</b></div>
    </div>
    <div class="card-body">
    
        <form method="POST">
            <div class="form-row">
            <div class="form-group col-md-6">
                <input type="hidden" name="IDSupplier" value="<?php echo $_GET['id'] ?>">
                <label><b>ID Supplier</b></label>
                <input type="text" class="form-control" value="<?php echo $idSupplier ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Supplier</b></label>
                <input type="text" name="NamaSupplier" class="form-control"  value="<?php echo $NamaSupplier;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Depan Supplier</b></label>
                <input type="text" name="NamaDepanSup" class="form-control"  value="<?php echo $NamaDepanSup;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Belakang Supplier</b></label>
                <input type="text" name="NamaBelakangSup" class="form-control"  value="<?php echo $NamaBelakangSup;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>No. HP Supplier</b></label>
                <div class="input-group">
                <input type="text" name="NoHPSup" class="form-control" value="<?php echo $NoHPSup;?>" required>
                        <div class="input-group-append">
                            <button class="btn btn-purple ml-3" name="update" type="submit">
                            <i class="fa fa-check mr-2"></i>Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<!-- end supplier -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
