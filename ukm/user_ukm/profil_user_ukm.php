<!DOCTYPE html>
<html>

<?php
session_start();
if ($_SESSION['username']=='') {
  header('location:../../user_ukm/login.php');

  
}else{

  $user = $_SESSION["username"];
  $id_user_ukm = $_SESSION["id_user_ukm"]; 
  // $nama_ukm = $_SESSION["nama_ukm"];  
  // $level = $_SESSION["level"];

  include '../home/header.php'; 
?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include '../home/sidebar.php'; ?>
    <div class="contents">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="panel panel-default">
                <div class="panel-heading">Profil Pemilik UKM</div>
                <div class="panel-body">
                <!-- <a class="btn btn-success" href="../ukm/v_add_ukm.php"><i class="fa fa-pencil-square-o"></i>Tambah</a><br/><br/> -->
                    
                    <table class="table table-bordered">
                        <tbody>
                        <?php
                        include '../../config/koneksi.php';
                        $id_user_ukm = isset($_GET['id']) ? $_GET['id'] : "";
                        $query = mysqli_query($koneksi,"SELECT * FROM user_ukm WHERE id_user_ukm='$id_user_ukm'");
                        while($data = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <th width="30%">ID</th>
                                <td><?php echo $data["id_user_ukm"]; ?></td>
                            </tr>
                            <tr>
                                <th width="30%">Nama Pemilik UKM</th>
                                <td><?php echo $data["username"]; ?></td>
                            </tr>
                            <tr>
                                <th width="30%">Email</th>
                                <td><?php echo $data["email"]; ?></td>
                            </tr>
                            <tr>
                                <th width="30%">Alamat</th>
                                <td><?php echo $data["alamat"]; ?></td>
                            </tr>
                            <tr>
                                <th width="30%">No. Telepon</th>
                                <td><?php echo $data["no_telp"]; ?></td>
                            </tr>
                            <tr>
                                <th width="30%">Foto</th>
                                <td><img src="../<?= $data['fhoto']; ?>" width="300" height="200"/></td> 
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <!-- <a class="btn btn-primary" href="../user_ukm/profil_user_ukm.php">Kembali</a> -->
                    <!-- <a class="btn btn-danger" href="../user_ukm/v_edit_profil_ukm.php">Ubah</a> -->
                    <a class="btn btn-danger" href="../user_ukm/v_edit_profil_ukm.php?id=<?php echo $_SESSION["id_user_ukm"]; ?>">Ubah</a>
                </div>
            </div>
        </section><br>
      </div>
    </div>
  </div>
</body>
<?php include '../home/footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dtUser').DataTable();
    });
</script>
</html>
<?php
}
?>