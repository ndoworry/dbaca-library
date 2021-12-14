<?php
	include("includes/koneksi.php");
	if(empty($_SESSION['nama'])){
		header("Location: error.php");
	}

	$id_buku = $_POST['id_buku'];
	$judul = $_POST['judul'];
	$penulis = $_POST['penulis'];
	$jenis_buku = $_POST['jenis_buku'];
	$tahun_terbit = $_POST['tahun_terbit'];
	$penerbit = $_POST['penerbit'];
	$tebal_halaman = $_POST['tebal_halaman'];

	$nama_file = $_FILES['foto_buku']['name'];
	$ukuran_file = $_FILES['foto_buku']['size'];
	$tipe_file = $_FILES['foto_buku']['type'];
	$tmp_file = $_FILES['foto_buku']['tmp_name'];
	$path = "assets/img/images/".$nama_file;

	if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ 
		if($ukuran_file <= 5000000){
			if(move_uploaded_file($tmp_file, $path)){
				$sql = "UPDATE buku SET judul = '$judul', foto_buku = '$nama_file', penulis = '$penulis', jenis_buku = '$jenis_buku', tahun_terbit = '$tahun_terbit', penerbit = '$penerbit', tebal_halaman = '$tebal_halaman' WHERE id_buku = $id_buku";

				$hasil = mysqli_query($koneksi, $sql);

				if($hasil){
					echo "<script>alert('Data Buku Berhasil Diperbarui')</script>";
					echo "<script>location = 'admin-buku.php'</script>";
				}
				else{
					echo "<script>alert('Data Buku Gagal Diperbarui')</script>";
					echo "<script>location = 'ubah_buku.php'</script>";
				}
			}
			else{
				echo "<script>alert('Data Buku Gagal Diperbarui')</script>";
				echo "<script>location = 'ubah_buku.php'</script>";	
			}
		}
		else{
			echo "<script>alert('Ukuran Foto Tidak Boleh Lebih dari 5 MB')</script>";
			echo "<script>location = 'ubah_buku.php'</script>";
		}
	}
	else{
		echo "<script>alert('Tipe Foto yang Diupload Harus JPEG/JPG/PNG')</script>";
		echo "<script>location = 'ubah_buku.php'</script>";
	}
?>