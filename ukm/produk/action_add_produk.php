<?php
	session_start();
	include "../../config/koneksi.php";
	$user = $_POST["id_user_ukm"];
 	$kategori = $_POST["kategori_id"];	
	$nama_produk = $_POST["nama_produk"];
	$deskripsi = $_POST["deskripsi"];
	$harga = $_POST["harga"];
	$qty = $_POST["qty"];
	$gambar = "img/";
	$gambar_file = $gambar . basename($_FILES["foto"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($gambar_file,PATHINFO_EXTENSION));
 
	// query sql
	// $sql = "INSERT INTO produk values('$kategori',$id,'$nama_produk','$deskripsi','$harga','$qty','$gambar_file')";
	$sql = "INSERT INTO produk (id_user_ukm,kategori_id,nama_produk,deskripsi,harga,qty,foto) VALUES ('$user','$kategori','$nama_produk','$deskripsi','$harga','$qty','$gambar_file')";
	$query = mysqli_query($koneksi, $sql);

	move_uploaded_file($_FILES["foto"]["tmp_name"],$gambar_file);
	// var_dump($sql);
	// var_dump($_FILES);
	// die;

	if($query){
		echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_add_produk.php';
		</script>";
	} else {
		echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_add_produk.php';
		</script>";
	}
 
	mysqli_close($koneksi);
 
?>