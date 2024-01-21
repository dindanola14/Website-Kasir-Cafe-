<?php include 'template/headerpengguna.php';?>
<?php 
if(!empty($_POST['add_pembelian'])){
    $JumlahPembelian = $_POST['JumlahPembelian'];
    $HargaBeli = $_POST['HargaBeli'];
    $idPengguna = $_POST['IDPengguna'];
    $idSupplier = $_POST['IDSupplier'];
    $idBarang = $_POST['IDBarang'];
    
    mysqli_query($conn,"insert into pembelian(JumlahPembelian, HargaBeli, IDPengguna, IDSupplier, IDBarang) values('$JumlahPembelian','$HargaBeli','$idPengguna','$idSupplier','$idBarang')")
    or die(mysqli_error($conn));
    echo '<script>window.location="addpembelian.php"</script>';
}
?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- pembelian -->
<div class="col-md-12 mb-3">
    <div class="card">
    <div class="card-header bg-purple">
            <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Tambah Pembelian</b></div>
    </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label><b>Jumlah Pembelian</b></label>
                    <input type="text" name="JumlahPembelian" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Harga Beli</b></label>
                    <input type="text" name="HargaBeli" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>ID Pengguna</b></label>
                    <input type="text" name="IDPengguna" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>ID Supplier</b></label>
                    <input type="text" name="IDSupplier" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>ID Barang</b></label>
                    <div class="input-group">
                    <input type="text" name="IDBarang" class="form-control" required>
                    <div class="input-group-append">
                        <button name="add_pembelian" value="simpan" class="btn btn-purple" type="submit">
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
<!-- end pembelian -->


<!-- table pembelian -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Pembelian</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_pembelian" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Jumlah Pembelian</th>
                    <th>Harga Beli</th>
                    <th>ID Pengguna</th>
                    <th>ID Supplier</th>
                    <th>ID Barang</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_pembelian = mysqli_query($conn,"select * from pembelian");
                while($d = mysqli_fetch_array($data_pembelian)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['JumlahPembelian']; ?></td>
                    <td><?php echo $d['HargaBeli']; ?></td>
                    <td><?php echo $d['IDPengguna']; ?></td>
                    <td><?php echo $d['IDSupplier']; ?></td>
                    <td><?php echo $d['IDBarang']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="editpembelian.php?id=<?php echo $d['IDPembelian']; ?>">
                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['IDPembelian']; ?>" 
                        onclick="javascript:return confirm('Hapus Data Pembelian ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
        </tbody>
        </table>
        </div>
    </div>
</div>
<!-- end table pembelian -->

</div><!-- end row col-md-9 -->
</div>
  
<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $idPembelian = $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM pembelian WHERE IDPembelian ='$idPembelian'");
    echo '<script>window.location="addpembelian.php"</script>';
}
?>
<?php include 'template/footer.php';?>
