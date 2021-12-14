<html>
	<head>
		<title>Daftar</title>
		
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
			height: 650px;
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

			<form method="POST" action="proses_daftar.php">
			<table class="form-group">
					<h3>Form Pendafataran</h3>
				<tr>
					<td colspan="2" style="height: 60px">
						<select name="jenis_no" required style="width: 330px" class="form-control">
							<option value="Choose" disabled>---Pilih Salah Satu---</option>
							<option value="KTP" name="KTP">KTP/NIK</option>
							<option value="KTM" name="KTM">KTM/NIM</option>
						</select>
					</td>
				</tr>

				<tr>
					<td colspan="2" style="height: 60px"><input type="text" name="no" placeholder="Masukkan Nomor Identitas" required style="width: 330px" class="form-control" maxlength="16" minlength="9"></td>
				</tr>

				<tr>
					<td colspan="2" style="height: 60px"><input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required style="width: 330px" class="form-control"></td>
				</tr>

				<tr>
					<td colspan="2" style="height: 60px">
						<select name="jenis_kelamin" required style="width: 330px" class="form-control">
							<option value="Choose" disabled>---Pilih Salah Satu---</option>
							<option value="L" name="L">Laki-laki</option>
							<option value="P" name="P">Perempuan</option>
						</select>
					</td>
				</tr>

				<tr>
					<td colspan="2" style="height: 60px">
						<select name="jenis_anggota" required style="width: 330px" class="form-control">
							<option value="Choose" disabled>---Pilih Salah Satu---</option>
							<option value="Pelajar" name="Pelajar">Pelajar</option>
							<option value="Mahasiswa" name="Mahasiswa">Mahasiswa</option>
							<option value="Umum" name="Umum">Umum</option>
						</select>
					</td>
				</tr>

				<tr>
					<td colspan="2" style="height: 60px"><input type="email" name="email" placeholder="Masukkan Email" required style="width: 330px" class="form-control"></td>
				</tr>

				<tr>
					<td colspan="2" style="height: 60px"><input type="password" name="pass" placeholder="Masukkan Kata Sandi" required style="width: 330px" class="form-control"></td>
				</tr>

				<tr>
					<td colspan="2" style="height: 60px"><input type="password" name="konfirmasi_pass" placeholder="Konfirmasi Kata Sandi" required style="width: 330px" class="form-control"></td>
				</tr>

				<tr style="height: 60px">
					<td align="center">
						<input type="submit" name="btnDaftar" value="Daftar" class="btn btn-warning" style="width: 150px; border-color: orange">
					</td>

					<td align="center">
						<input type="reset" name="btnReset" value="Reset" class="btn btn-secondary" style="width: 150px">
					</td>
				</tr>
			</table>
		</form>
	</body>
	
</html>