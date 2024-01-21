<?php include 'template/headerpengguna.php';?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- hakakses -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $idAkses = $_POST['IDAkses'];
    $NamaAkses = $_POST['NamaAkses'];
    $Keterangan = $_POST['Keterangan'];

    $result = mysqli_query($conn, "UPDATE hakakses SET NamaAkses='$NamaAkses', Keterangan='$Keterangan' WHERE IDAkses = '$idAkses' ");
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
$idAkses = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM hakakses WHERE IDAkses=$idAkses");
while($data = mysqli_fetch_array($result))
{
    $idAkses = $data['IDAkses'];
    $NamaAkses = $data['NamaAkses'];
    $Keterangan = $data['Keterangan'];
}
?>
<div class="card">
<div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Update Hak Akses</b></div>
    </div>
    <div class="card-body">
    
        <form method="POST">
            <div class="form-row">
            <div class="form-group col-md-6">
                <input type="hidden" name="IDAkses" value="<?php echo $_GET['id'] ?>">
                <label><b>ID Hak Akses</b></label>
                <input type="text" class="form-control" value="<?php echo $idAkses ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Akses</b></label>
                <input type="text" name="NamaAkses" class="form-control"  value="<?php echo $NamaAkses;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Keterangan</b></label>
                <div class="input-group">
                <input type="text" name="Keterangan" class="form-control" value="<?php echo $Keterangan;?>" required>
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
<!-- end hakakses -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
