<?php include 'template/headerpengguna.php';?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- pembelian -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $idPembelian = $_POST['IDPembelian'];
    $JumlahPembelian = $_POST['JumlahPembelian'];
    $HargaBeli = $_POST['HargaBeli'];
    $idPengguna = $_POST['IDPengguna'];
    $idSupplier = $_POST['IDSupplier'];
    $idBarang = $_POST['IDBarang'];

    $result = mysqli_query($conn, "UPDATE pembelian SET JumlahPembelian='$JumlahPembelian', HargaBeli='$HargaBeli', IDPengguna='$idPengguna', IDSupplier='$idSupplier', IDBarang='$idBarang' WHERE IDPembelian = '$idPembelian' ");
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
$idPembelian = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM pembelian WHERE IDPembelian=$idPembelian");
while($data = mysqli_fetch_array($result))
{
    $idPembelian = $data['IDPembelian'];
    $JumlahPembelian = $data['JumlahPembelian'];
    $HargaBeli = $data['HargaBeli'];
    $idPengguna = $data['IDPengguna'];
    $idSupplier = $data['IDSupplier'];
    $idBarang = $data['IDBarang'];
}
?>
<div class="card">
<div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Update Pembelian</b></div>
    </div>
    <div class="card-body">
    
        <form method="POST">
            <div class="form-row">
            <div class="form-group col-md-6">
                <input type="hidden" name="IDPembelian" value="<?php echo $_GET['id'] ?>">
                <label><b>ID Pembelian</b></label>
                <input type="text" class="form-control" value="<?php echo $idPembelian ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Jumlah Pembelian</b></label>
                <input type="text" name="JumlahPembelian" class="form-control"  value="<?php echo $JumlahPembelian;?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Harga Beli</b></label>
                <input type="text" name="HargaBeli" class="form-control"  value="<?php echo $HargaBeli;?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>ID Pengguna</b></label>
                <input type="text" name="IDPengguna" class="form-control"  value="<?php echo $idPengguna;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>ID Supplier</b></label>
                <input type="text" name="IDSupplier" class="form-control"  value="<?php echo $idSupplier;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>ID Barang</b></label>
                <div class="input-group">
                <input type="text" name="IDBarang" class="form-control" value="<?php echo $idBarang;?>" readonly>
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
<!-- end pembelian -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
