<?php
	require_once 'includes/koneksi.php';

	$jenis_no = $_POST['jenis_no'];
	$no = $_POST['no'];
	$nama = ucwords($_POST['nama']);
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$jenis_anggota = $_POST['jenis_anggota'];
	$email = $_POST['email'];
	$pass = sha1($_POST['pass']);
	$konfirmasi_pass = sha1($_POST['konfirmasi_pass']);

	$sql = "INSERT INTO akun(jenis_user, jenis_no, no, nama, jenis_kelamin, jenis_anggota, email, pass) VALUES (2, '$jenis_no', '$no', '$nama', '$jenis_kelamin', '$jenis_anggota', '$email', '$pass')";
	$sql2 = "SELECT email FROM akun where email = '$email'";
	$cek_email = mysqli_num_rows(mysqli_query($koneksi, $sql2));

	if($cek_email > 0){
		echo "<script>alert('Email Sudah Terdaftar');</script>";
		echo "<script>location = 'daftar.php';</script>";
	}
	else{
		if($pass == $konfirmasi_pass){
			if($koneksi->query($sql)===TRUE){
				echo "<script>alert('Registrasi Berhasil');</script>";
				echo "<script>location = 'index.php';</script>";
			}
			else{
				echo "<script>alert('Gagal Registrasi');</script>";
				echo "<script>location = 'daftar.php';</script>";
			}
		}
		else{
			echo "<script>alert('Konfirmasi Password Tidak Sesuai');</script>";
			echo "<script>location = 'daftar.php';</script>";
		}
	}

	$koneksi->close();
?>