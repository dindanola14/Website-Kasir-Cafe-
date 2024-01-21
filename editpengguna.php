<?php include 'template/headerpengguna.php';?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- pengguna -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $idPengguna = $_POST['IDPengguna'];
    $NamaPengguna = $_POST['NamaPengguna'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $NamaDepan = $_POST['NamaDepan'];
    $NamaBelakang = $_POST['NamaBelakang'];
    $NoHP = $_POST['NoHP'];
    $Alamat = $_POST['Alamat'];
    $idAkses = $_POST['IDAkses'];

    $result = mysqli_query($conn, "UPDATE pengguna SET NamaPengguna='$NamaPengguna', Password='$Password', NamaDepan='$NamaDepan', NamaBelakang='$NamaBelakang', NoHP='$NoHP', Alamat='$Alamat', IDAkses='$idAkses' WHERE IDPengguna = '$idPengguna' ");
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
$idPengguna = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM pengguna WHERE IDPengguna=$idPengguna");
while($data = mysqli_fetch_array($result))
{
    $idPengguna = $data['IDPengguna'];
    $NamaPengguna = $data['NamaPengguna'];
    $Password = $data['Password'];
    $NamaDepan = $data['NamaDepan'];
    $NamaBelakang = $data['NamaBelakang'];
    $NoHP = $data['NoHP'];
    $Alamat = $data['Alamat'];
    $idAkses = $data['IDAkses'];
}
?>
<div class="card">
<div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Update Pengguna</b></div>
    </div>
    <div class="card-body">
    
        <form method="POST">
            <div class="form-row">
            <div class="form-group col-md-6">
                <input type="hidden" name="IDPengguna" value="<?php echo $_GET['id'] ?>">
                <label><b>ID Pengguna</b></label>
                <input type="text" class="form-control" value="<?php echo $idPengguna ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Password</b></label>
                <input type="password" name="Password" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Pengguna</b></label>
                <input type="text" name="NamaPengguna" class="form-control"  value="<?php echo $NamaPengguna;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Depan</b></label>
                <input type="text" name="NamaDepan" class="form-control"  value="<?php echo $NamaDepan;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Belakang</b></label>
                <input type="text" name="NamaBelakang" class="form-control"  value="<?php echo $NamaBelakang;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>No. HP</b></label>
                <input type="text" name="NoHP" class="form-control" value="<?php echo $NoHP;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Alamat</b></label>
                <input type="text" name="Alamat" class="form-control" value="<?php echo $Alamat;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>ID Akses</b></label>
                <div class="input-group">
                <input type="text" name="IDAkses" class="form-control" value="<?php echo $idAkses;?>" readonly>
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
<!-- end pengguna -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
