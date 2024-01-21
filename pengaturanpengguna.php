<?php include 'template/headerpengguna.php';?>
  <div class="col-md-9 mb-2">
    <div class="row">

<!-- table pengguna -->
<div class="col-md-7 mb-2">
                
<?php
error_reporting(0);
if(isset($_POST['get'])){
  require "config.php";
    $idPengguna = $_POST['IDPengguna'];
    $NamaPengguna = $_POST['NamaPengguna'];
    $Password = $_POST['Password'];
    $NamaDepan = $_POST['NamaDepan'];
    $NamaBelakang = $_POST['NamaBelakang'];
    $NoHP = $_POST['NoHp'];
    $Alamat = $_POST['Alamat'];
    $idAkses = $_POST['IDAkses'];
    $result = mysqli_query($conn, "UPDATE pengguna SET NamaPengguna='$NamaPengguna', Password='$Password', NamaDepan='$NamaDepan', NamaBelakang='$NamaBelakang', NoHP='$Nohp', Alamat='$Alamat', idAkses='$IDAkses' WHERE IDPengguna = '$idPengguna' ") or die(mysqli_connect_error());
    if(!$result){
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>NOOO!</strong> Data gagal di update.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        <meta http-equiv='refresh' content='1; url= pengaturanpengguna.php'/>
        ";
        } else{
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>YESSS!</strong> Data berhasil di update.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        <meta http-equiv='refresh' content='1; url= pengaturanpengguna.php'/>
        ";
        }
}?>
<?php
$result1 = mysqli_query($conn, "SELECT * FROM pengguna");
while($data = mysqli_fetch_array($result1))
{
    $idPengguna = $data['IDPengguna'];
    $NamaPengguna = $data['NamaPengguna'];
    $Password = $data['Password'];
    $NamaDepan = $data['NamaDepan'];
    $NamaBelakang = $data['NamaBelakang'];
    $NoHP = $data['NoHp'];
    $Alamat = $data['Alamat'];
    $idAkses = $data['IDAkses'];
}
?>
      <div class="card">
      <div class="card-header bg-purple">
              <div class="card-tittle text-white"><i class="fa fa-cog"></i> <b>Account Setting</b></div>
          </div>
          <div class="card-body">
              <form method="POST">
              <fieldset>

                <div class="form-group row">
                <input type="hidden" name="IDPengguna" value="<?php echo $idPengguna;?>">
                  <label class="col-sm-4 col-form-label"><b>Nama Pengguna :</b></label>
                  <div class="col-sm-8 mb-2">
                    <input type="text" name="NamaPengguna" class="form-control" value="<?php echo $NamaPengguna;?>" required>
                  </div>
                  <label class="col-sm-4 col-form-label"><b>NamaDepan :</b></label>
                  <div class="col-sm-8 mb-2">
                    <input type="text" name="NamaDepan" class="form-control" value="<?php echo $NamaDepan;?>" required>
                  </div>
                  <label class="col-sm-4 col-form-label"><b>NamaBelakang :</b></label>
                  <div class="col-sm-8 mb-2">
                    <input type="text" name="NamaBelakang" class="form-control" value="<?php echo $NamaBelakang;?>" required>
                  </div>
                  <label class="col-sm-4 col-form-label"><b>No. HP :</b></label>
                  <div class="col-sm-8 mb-2">
                  <input type="text" name="NoHP" class="form-control" value="<?php echo $NoHP;?>" required>
                  </div>
                  <label class="col-sm-4 col-form-label"><b>Alamat :</b></label>
                  <div class="col-sm-8 mb-2">
                  <input type="text" name="Alamat" class="form-control" value="<?php echo $Alamat;?>" required>
                  </div>
                  <label class="col-sm-4 col-form-label"><b>ID Akses :</b></label>
                  <div class="col-sm-8 mb-2">
                  <input type="text" name="IDAkses" class="form-control" value="<?php echo $IDAkses;?>" required>
                  </div>
                  <label class="col-sm-4 col-form-label"><b>New Password:</b></label>
                  <div class="col-sm-8 mb-2">
                  <input type="password" name="Password" class="form-control"  placeholder="****" required>
                  </div>
                </div>
              <div class="text-right">
                  <button class="btn btn-purple" name="get" type="submit">Update</button>
              </div>
              </fieldset>
              </form>
          </div>
      </div>
  </div>
  <!-- end table pengguna -->

  </div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
