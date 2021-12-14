<?php
	include("includes/koneksi.php");
	if(empty($_SESSION['nama'])){
		header("Location: error.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
		<!--Stylesheet-->
		<style media="screen">
		      *,
		*:before,
		*:after{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		body{
			background-color: #f2d346;
		}
		.background{
			width: 430px;
			height: 520px;
			position: absolute;
			transform: translate(-50%,-50%);
			left: 50%;
			top: 50%;
		}
		.background .shape{
			height: 200px;
			width: 200px;
			position: absolute;
			border-radius: 50%;
		}
		.shape:first-child{
			background: linear-gradient(
				#1845ad,
				#23a2f6
			);
			left: -80px;
			top: -80px;
		}
		.shape:last-child{
			background: linear-gradient(
				to right,
				#ff512f,
				#f09819
			);
			right: -30px;
			bottom: -80px;
		}
		
		form{
			height: 700px;
			width: 400px;
			background-color: rgba(255,255,255,0.13);
			position: absolute;
			transform: translate(-50%,-50%);
			top: 50%;
			left: 50%;
			border-radius: 10px;
			backdrop-filter: blur(10px);
			border: 2px solid rgba(255,255,255,0.1);
			box-shadow: 0 0 40px rgba(8,7,16,0.6);
			padding: 50px 35px;
		}
			
			
    </style>	
	</head>
	<body>
	<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
		<form method="POST" action="proses_buku.php" enctype="multipart/form-data">
			<table class="form-group">
			<h3>Form Tambah Buku</h3>			
				<tr>
					<td colspan="2" style="height: 70px"><input type="text" name="judul" placeholder="Masukkan Judul Buku" required style="width: 330px" class="form-control"></td>
				</tr>

				<tr>
					<td colspan="2" style="height: 70px"><input type="text" name="penulis" placeholder="Masukkan Penulis Buku" required style="width: 330px" class="form-control"></td>
				</tr>

				<tr>
					<td colspan="2" style="height: 70px">
						<select name="jenis_buku" required style="width: 330px" class="form-control">
							<option value="Choose" disabled>---Pilih Salah Satu---</option>
							<option value="Komputer" name="Komputer">Komputer</option>
							<option value="Hukum" name="Hukum">Hukum</option>
							<option value="Novel" name="Novel">Novel</option>
							<option value="Komik" name="Komik">Komik</option>
							<option value="Cerita Rakyat" name="Cerita Rakyat">Cerita Rakyat</option>
							<option value="Lainnya" name="Lainnya">Lainnya</option>
						</select>
					</td>
				</tr>

				<tr>
					<td colspan="2" style="height: 70px"><input type="text" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" required style="width: 330px" class="form-control" maxlength="4"></td>
				</tr>

				<tr>
					<td colspan="2" style="height: 70px"><input type="text" name="penerbit" placeholder="Masukkan Penerbit Buku" required style="width: 330px" class="form-control"></td>
				</tr>

				<tr>
					<td colspan="2" style="height: 70px"><input type="number" name="tebal_halaman" placeholder="Masukkan Tebal Halaman" required style="width: 330px" class="form-control"></td>
				</tr>
				
				<tr>
				<td colspan="2" style="height: 70px"><input type="file" name="foto_buku"></td>
				</tr>
				

				<tr style="height: 70px">
					<td align="center">
						<input type="submit" name="btnTambah" value="Tambah" class="btn btn-warning" style="width: 150px; border-color: orange">
					</td>

					<td align="center">
						<input type="reset" name="btnReset" value="Reset" class="btn btn-secondary" style="width: 150px">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>