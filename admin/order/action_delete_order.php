<?php
	include "../../config/koneksi.php";
 
	$id = $_GET["id"];
 
	// query sql
	$sql = "DELETE FROM orders WHERE id='$id'";
	$query = mysqli_query($koneksi, $sql);
 
	if($query){
		echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_order.php';
		</script>";
	} else {
		echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_order.php';
		</script>";
	}
 
	mysqli_close($koneksi);
?>