<?php
	include 'includes/koneksi.php';

	$email = $_POST['email'];
	$pass = sha1($_POST['pass']);

	$sql = "SELECT * FROM akun WHERE email = '{$email}' and pass = '{$pass}'";
	$query = mysqli_query($koneksi, $sql);
	$count = mysqli_num_rows($query);

	if(!$query){
		die("Query gagal". mysqli_error($koneksi));
	}
	if(!empty($email) && (!empty($pass))){
		if($count==0){
			echo "<script>alert('Email atau kata sandi salah');</script>";
			echo "<script>location = 'index.php';</script>";
		}
		else{
			while ($row = mysqli_fetch_array($query)){	
				$jenis_user = $row['jenis_user'];
                $jenis_no = $row['jenis_no'];
                $no = $row['no'];
                $nama = $row['nama'];
                $jenis_kelamin = $row['jenis_kelamin'];
                $jenis_anggota = $row['jenis_anggota'];
                $email = $row['email'];
                $pass = $row['pass'];
			}
			
			if($jenis_user == 1 && $email == $email && $pass == $pass){
				header("Location: home-admin.php");
				$_SESSION['email'] = $email;
				$_SESSION['nama'] = $nama;	
			}
			elseif($jenis_user == 2 && $email == $email && $pass == $pass){
				header("Location: home-anggota.php");
				$_SESSION['email'] = $email;
				$_SESSION['nama'] = $nama;	
			}
	    	else{
	    		echo "<script>alert('Pengguna tidak ditemukan');</script>";
	    		echo "<script>location = 'index.php';</script>";
			}
		}
	}
	elseif(empty($email)){
		echo "<script>alert('Email tidak boleh kosong');</script>";
		echo "<script>location = 'index.php';</script>";
	}
	else{
		echo "<script>alert('Kata sandi tidak boleh kosong');</script>";
		echo "<script>location = 'index.php';</script>";
	}
?>