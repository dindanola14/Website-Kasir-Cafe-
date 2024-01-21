<?php include 'template/headerpengguna.php'; ?>
<?php
if (!empty($_POST['add_barang'])) {
    $NamaBarang = $_POST['NamaBarang'];
    $Keterangan = $_POST['Keterangan'];
    $Satuan = $_POST['Satuan'];
    $idPengguna = $_POST['IDPengguna'];

    mysqli_query($conn, "insert into barang(NamaBarang, Keterangan, Satuan, IDPengguna) values('$NamaBarang','$Keterangan','$Satuan','$IDPengguna')")
        or die(mysqli_error($conn));
    echo '<script>window.location="addbarang.php"</script>';
}
?>

<div class="col-md-9 mb-2">
    <div class="row">

        <!-- barang -->
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header bg-purple">
                    <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Tambah Barang</b></div>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><b>Nama Barang</b></label>
                                <input type="text" name="NamaBarang" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Keterangan</b></label>
                                <input type="text" name="Keterangan" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Satuan</b></label>
                                <input type="text" name="Satuan" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>ID Pengguna</b></label>
                                <div class="input-group">
                                    <input type="text" name="IDPengguna" class="form-control" required>
                                    <div class="input-group-append">
                                        <button name="add_barang" value="simpan" class="btn btn-purple" type="submit">
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
    <!-- end barang -->


    <!-- table barang -->
    <div class="col-md-12 mb-2">
        <div class="card">
            <div class="card-header bg-purple">
                <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Barang</b></div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_barang" width="100%">
                    <thead class="thead-purple">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>ID Pegguna</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data_barang = mysqli_query($conn, "select * from barang");
                        while ($d = mysqli_fetch_array($data_barang)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['NamaBarang']; ?></td>
                                <td><?php echo $d['Keterangan']; ?></td>
                                <td><?php echo $d['Satuan']; ?></td>
                                <td><?php echo $d['IDPengguna']; ?></td>
                                <td>
                                    <a class="btn btn-primary btn-xs" href="editbarang.php?id=<?php echo $d['IDBarang']; ?>">
                                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                                    <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['IDBarang']; ?>" onclick="javascript:return confirm('Hapus Data Barang ?');">
                                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end table barang -->

</div><!-- end row col-md-9 -->
</div>

<?php
include 'config.php';

if (!empty($_GET['id'])) {
    $idBarang = $_GET['id'];

    try {
        $hapus_data = mysqli_query($conn, "DELETE FROM barang WHERE IDBarang ='$idBarang'");
        echo '<script>window.location="addbarang.php"</script>';
    } catch (\Throwable $th) {

        echo '<script>alert("Tidak dapat menghapus data barang karena terintegtasi dengan data lain.");</script>';
        echo '<script>window.location="addbarang.php"</script>';
    }
}
?>

<?php include 'template/footer.php'; ?>