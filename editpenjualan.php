<?php include 'template/headerpengguna.php';?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- penjualan -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $idPenjualan = $_POST['IDPenjualan'];
    $JumlahPenjualan = $_POST['JumlahPenjualan'];
    $HargaJual = $_POST['HargaJual'];
    $idPengguna = $_POST['IDPengguna'];
    $idPelanggan = $_POST['IDPelanggan'];
    $idBarang = $_POST['IDBarang'];

    $result = mysqli_query($conn, "UPDATE penjualan SET JumlahPenjualan='$JumlahPenjualan', HargaJual='$HargaJual', IDPengguna='$idPengguna', IDPelanggan='$idPelanggan', IDBarang='$idBarang' WHERE IDPenjualan = '$idPenjualan' ");
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
$idPenjualan = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM penjualan WHERE IDPenjualan=$idPenjualan");
while($data = mysqli_fetch_array($result))
{
    $idPenjualan = $data['IDPenjualan'];
    $JumlahPenjualan = $data['JumlahPenjualan'];
    $HargaJual = $data['HargaJual'];
    $idPengguna = $data['IDPengguna'];
    $idPelanggan = $data['IDPelanggan'];
    $idBarang = $data['IDBarang'];
}
?>
<div class="card">
<div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Update Penjualan</b></div>
    </div>
    <div class="card-body">
    
        <form method="POST">
            <div class="form-row">
            <div class="form-group col-md-6">
                <input type="hidden" name="IDPenjualan" value="<?php echo $_GET['id'] ?>">
                <label><b>ID Penjualan</b></label>
                <input type="text" class="form-control" value="<?php echo $idPenjualan ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Jumlah Penjualan</b></label>
                <input type="text" name="JumlahPenjualan" class="form-control"  value="<?php echo $JumlahPenjualan;?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Harga Jual</b></label>
                <input type="text" name="HargaJual" class="form-control"  value="<?php echo $HargaJual;?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>ID Pengguna</b></label>
                <input type="text" name="IDPengguna" class="form-control"  value="<?php echo $idPengguna;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>ID Pelanggan</b></label>
                <input type="text" name="IDPelanggan" class="form-control"  value="<?php echo $idPelanggan;?>" readonly>
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
<!-- end penjualan -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
