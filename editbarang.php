<?php include 'template/headerpengguna.php';?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- barang -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $idBarang = $_POST['IDBarang'];
    $NamaBarang = $_POST['NamaBarang'];
    $Keterangan = $_POST['Keterangan'];
    $Satuan = $_POST['Satuan'];
    $idPengguna = $_POST['IDPengguna'];

    $result = mysqli_query($conn, "UPDATE barang SET NamaBarang='$NamaBarang', Keterangan='$Keterangan', Satuan='$Satuan', IDPengguna='$idPengguna' WHERE IDBarang = '$idBarang' ");
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
        // echo '<script>window.location="addbarang.php"</script>';
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>YESSS!</strong> Data berhasil di update.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        <script>
            setTimeout(function(){
                window.location='addbarang.php';
            }, 2000); // Delay 2 detik (2000 milidetik)
        </script>
    ";
    
        
        }
}
?>
<?php
$idBarang = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM barang WHERE IDBarang=$idBarang");
while($data = mysqli_fetch_array($result))
{
    $idBarang = $data['IDBarang'];
    $NamaBarang = $data['NamaBarang'];
    $Keterangan = $data['Keterangan'];
    $Satuan = $data['Satuan'];
    $idPengguna = $data['IDPengguna'];
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
                <input type="hidden" name="IDBarang" value="<?php echo $_GET['id'] ?>">
                <label><b>ID Barang</b></label>
                <input type="text" class="form-control" value="<?php echo $idBarang ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Barang</b></label>
                <input type="text" name="NamaBarang" class="form-control"  value="<?php echo $NamaBarang;?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Keterangan</b></label>
                <input type="text" name="Keterangan" class="form-control"  value="<?php echo $Keterangan;?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Satuan</b></label>
                <input type="text" name="Satuan" class="form-control"  value="<?php echo $Satuan;?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>ID Pengguna</b></label>
                <div class="input-group">
                <input type="text" name="IDPengguna" class="form-control" value="<?php echo $idPengguna;?>" readonly>
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
<!-- end barang -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
