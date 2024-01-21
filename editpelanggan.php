<?php include 'template/headerpengguna.php';?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- pelanggan -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $idPelanggan = $_POST['IDPelanggan'];
    $NamaPelanggan = $_POST['NamaPelanggan'];
    $NamaDepanPel = $_POST['NamaDepanPel'];
    $NamaBelakangPel = $_POST['NamaBelakangPel'];
    $NoHPPel = $_POST['NoHPPel'];

    $result = mysqli_query($conn, "UPDATE pelanggan SET NamaPelanggan='$NamaPelanggan', NamaDepanPel='$NamaDepanPel', NamaBelakangPel='$NamaBelakangPel', NoHPPel='$NoHPPel' WHERE IDPelanggan = '$idPelanggan' ");
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
$idPelanggan = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE IDPelanggan=$idPelanggan");
while($data = mysqli_fetch_array($result))
{
    $idPelanggan = $data['IDPelanggan'];
    $NamaPelanggan = $data['NamaPelanggan'];
    $NamaDepanPel = $data['NamaDepanPel'];
    $NamaBelakangPel = $data['NamaBelakangPel'];
    $NoHPPel = $data['NoHPPel'];
}
?>
<div class="card">
<div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Update Pelanggan</b></div>
    </div>
    <div class="card-body">
    
        <form method="POST">
            <div class="form-row">
            <div class="form-group col-md-6">
                <input type="hidden" name="IDPelanggan" value="<?php echo $_GET['id'] ?>">
                <label><b>ID Pelanggan</b></label>
                <input type="text" class="form-control" value="<?php echo $idPelanggan ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Pelanggan</b></label>
                <input type="text" name="NamaPelanggan" class="form-control"  value="<?php echo $NamaPelanggan;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Depan Pelanggan</b></label>
                <input type="text" name="NamaDepanPel" class="form-control"  value="<?php echo $NamaDepanPel;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Belakang Pelanggan</b></label>
                <input type="text" name="NamaBelakangPel" class="form-control"  value="<?php echo $NamaBelakangPel;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>No. HP Pelanggan</b></label>
                <div class="input-group">
                <input type="text" name="NoHPPel" class="form-control" value="<?php echo $NoHPPel;?>" required>
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
<!-- end pelanggan -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
