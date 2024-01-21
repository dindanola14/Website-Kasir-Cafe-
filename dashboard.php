<?php include 'template/headerpengguna.php'; ?>
<?php

?>

<div class="col-md-9 mb-2">

    <!-- end penjualan -->


    <!-- table penjualan -->
    <div class="col-md-12 mb-2">
        <div class="card">
            <div class="card-header bg-purple">
                <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Keuntungan</b></div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_penjualan" width="100%">
                    <thead class="thead-purple">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Keuntungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data_penjualan = mysqli_query($conn, "SELECT IDBarang, NamaBarang, FORMAT((SELECT SUM(JumlahPenjualan) FROM penjualan WHERE IDBarang = barang.IDBarang) *
                        ((SELECT SUM(jumlahpenjualan * HargaJual) FROM penjualan WHERE idbarang = barang.IDBarang) /
                        (SELECT SUM(jumlahpenjualan) FROM penjualan WHERE IDBarang = barang.IDBarang) -
                        (SELECT SUM(jumlahpembelian * HargaBeli) FROM pembelian WHERE IDBarang = barang.IDBarang) /
                        (SELECT SUM(jumlahpembelian) FROM pembelian WHERE IDBarang = barang.IDBarang)),2,'id_ID')
                         AS keuntungan
                        FROM barang;
                        ");

                        while ($d = mysqli_fetch_array($data_penjualan)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['NamaBarang']; ?></td>
                                <td><?php echo $d['keuntungan']; ?></td>
                                <!-- <td>
                                    <a class="btn btn-primary btn-xs" href="editpenjualan.php?id=<?php echo $d['IDPenjualan']; ?>">
                                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                                    <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['IDPenjualan']; ?>" onclick="javascript:return confirm('Hapus Data penjualan ?');">
                                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                                </td> -->
                            </tr>
                        <?php } ?>
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
if (!empty($_GET['id'])) {
    $idPenjualan = $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM penjualan WHERE IDPenjualan ='$idPenjualan'");
    echo '<script>window.location="addpenjualan.php"</script>';
}
?>
<?php include 'template/footer.php'; ?>