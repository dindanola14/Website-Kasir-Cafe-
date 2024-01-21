<?php include 'template/headerpengguna.php';?>
<?php 
if(!empty($_POST['add_penjualan'])){
    $JumlahPenjualan = $_POST['JumlahPenjualan'];
    $HargaJual = $_POST['HargaJual'];
    $idPengguna = $_POST['IDPengguna'];
    $idPelanggan = $_POST['IDPelanggan'];
    $idBarang = $_POST['IDBarang'];
    
    mysqli_query($conn,"insert into penjualan(JumlahPenjualan, HargaJual, IDPengguna, IDPelanggan, IDBarang) values('$JumlahPenjualan','$HargaJual','$idPengguna','$idPelanggan','$idBarang')")
    or die(mysqli_error($conn));
    echo '<script>window.location="addpenjualan.php"</script>';
}
?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- penjualan -->
<div class="col-md-12 mb-3">
    <div class="card">
    <div class="card-header bg-purple">
            <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Tambah Penjualan</b></div>
    </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label><b>Jumlah Penjualan</b></label>
                    <input type="text" name="JumlahPenjualan" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Harga Jual</b></label>
                    <input type="text" name="HargaJual" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>ID Pengguna</b></label>
                    <input type="text" name="IDPengguna" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>ID Pelanggan</b></label>
                    <input type="text" name="IDPelanggan" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>ID Barang</b></label>
                    <div class="input-group">
                    <input type="text" name="IDBarang" class="form-control" required>
                    <div class="input-group-append">
                        <button name="add_penjualan" value="simpan" class="btn btn-purple" type="submit">
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
<!-- end penjualan -->


<!-- table penjualan -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Penjualan</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_penjualan" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Jumlah Penjualan</th>
                    <th>Harga Jual</th>
                    <th>ID Pengguna</th>
                    <th>ID Pelanggan</th>
                    <th>ID Barang</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_penjualan = mysqli_query($conn,"select * from penjualan");
                while($d = mysqli_fetch_array($data_penjualan)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['JumlahPenjualan']; ?></td>
                    <td><?php echo $d['HargaJual']; ?></td>
                    <td><?php echo $d['IDPengguna']; ?></td>
                    <td><?php echo $d['IDPelanggan']; ?></td>
                    <td><?php echo $d['IDBarang']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="editpenjualan.php?id=<?php echo $d['IDPenjualan']; ?>">
                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['IDPenjualan']; ?>" 
                        onclick="javascript:return confirm('Hapus Data penjualan ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
        </tbody>
        </table>
        </div>
    </div>
</div>
<!-- end table penjualan -->

</div><!-- end row col-md-9 -->
</div>
  
<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $idPenjualan = $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM penjualan WHERE IDPenjualan ='$idPenjualan'");
    echo '<script>window.location="addpenjualan.php"</script>';
}
?>
<?php include 'template/footer.php';?>
