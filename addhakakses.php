<?php include 'template/headerpengguna.php';?>
<?php 
if(!empty($_POST['add_hakakses'])){
    $NamaAkses = $_POST['NamaAkses'];
    $Keterangan = $_POST['Keterangan'];
    
    mysqli_query($conn,"insert into hakakses(NamaAkses, Keterangan) values('$NamaAkses','$Keterangan')")
    or die(mysqli_error($conn));
    echo '<script>window.location="addhakakses.php"</script>';
}
?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- hakakses -->
<div class="col-md-12 mb-3">
    <div class="card">
    <div class="card-header bg-purple">
            <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Tambah Hak Akses</b></div>
    </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label><b>Nama Akses</b></label>
                    <input type="text" name="NamaAkses" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Keterangan</b></label>
                    <div class="input-group">
                    <input type="text" name="Keterangan" class="form-control" required>
                    <div class="input-group-append">
                        <button name="add_hakakses" value="simpan" class="btn btn-purple" type="submit">
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
<!-- end hakakses -->


<!-- table hakakses -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Hak Akses</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_hakakses" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Nama Akses</th>
                    <th>Keterangan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_hakakses = mysqli_query($conn,"select * from hakakses");
                while($d = mysqli_fetch_array($data_hakakses)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['NamaAkses']; ?></td>
                    <td><?php echo $d['Keterangan']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="edithakakses.php?id=<?php echo $d['IDAkses']; ?>">
                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['IDAkses']; ?>" 
                        onclick="javascript:return confirm('Hapus Data Hak Akses ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
        </tbody>
        </table>
        </div>
    </div>
</div>
<!-- end table hakakses -->

</div><!-- end row col-md-9 -->
</div>
  
<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $idAkses= $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM hakakses WHERE IDAkses ='$idAkses'");
    echo '<script>window.location="addhakakses.php"</script>';
}
?>
<?php include 'template/footer.php';?>
