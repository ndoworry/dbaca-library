<?php
	include("includes/koneksi.php");
	if(empty($_SESSION['nama'])){
		header("Location: error.php");
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perpustakaan DBaca</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="home-admin.php"><span>Dbaca</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="home-admin.php">Home</a></li>
          <li><a class="nav-link scrollto" href="admin-buku.php">Buku</a></li>
		  <li><a class="nav-link scrollto" href="admin-akun.php">Akun</a></li>
          <li><a class="getstarted scrollto" href="logout.php">Keluar</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Admin</h2>
          <ol>
            <li><a href="home-admin.php">Home</a></li>
            <li>Akun</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->
	
		<div class="wrap">
		<center>
	    	<table border="4 solic grey" style="margin-top: 30px; margin-bottom: 15px; width: 1300px">
	    		<tr height="40px" style="font-size: 17px; color: white" bgcolor="black">
	    			<?php
	    				if(isset($_GET['halaman']) && $_GET['halaman']!=""){
							$halaman = $_GET['halaman'];
						}
						else
							$halaman = 1;

						$limit = 10;

						if($halaman > 1){
							$offset = ($halaman * $limit) - $limit;
						}
						else
							$offset = 0;

						$sebelumnya = $halaman - 1;
						$selanjutnya = $halaman + 1;

						$query = mysqli_query($koneksi, "SELECT * FROM akun");
						$jlh_data = mysqli_num_rows($query);

						$jlh_halaman = ceil($jlh_data/$limit);
						$hal_akhir = $jlh_halaman;
						$no = 0;

			    		echo "<th>"."<center>"."No."."</center>"."</th>";
			    		echo "<th>"."<center>"."Jenis Identitas"."</center>"."</th>";
			    		echo "<th>"."<center>"."No. Identitas"."</center>"."</th>";
			    		echo "<th>"."<center>"."Nama Lengkap"."</center>"."</th>";
			    		echo "<th>"."<center>"."L/P"."</center>"."</th>";
			     		echo "<th>"."<center>"."Jenis Kenggotaan"."</center>"."</th>";
			     		echo "<th>"."<center>"."Email"."</center>"."</th>";
			     		echo "<th>"."<center>"."Password"."</center>"."</th>";
			    		echo "<th>"."<center>"."Hapus"."</center>"."</th>";
			    		echo "</tr>";

			    		$query2 = "SELECT * FROM akun LIMIT $offset, $limit";
						$hasil2 = mysqli_query($koneksi, $query2);

			    		foreach ($hasil2 as $data){
			    			$no++;

				   			echo "<tr align='center' style='height: 60px;' bgcolor='lightgrey'>";
				   			echo "<td align='center' style='width: 100px'>".$no."</td>";
				   			echo "<td align='center' style='width: 130px'>".$data['jenis_no']."</td>";
				   			echo "<td style='width: 230px'>".$data['no']."</td>";
				   			echo "<td style='width: 350px'>".$data['nama']."</td>";
				   			echo "<td style='width: 110px'>".$data['jenis_kelamin']."</td>";
				   			echo "<td align='center' style='width: 200px'>".$data['jenis_anggota']."</td>";
				   			echo "<td align='center' style='width: 280px'>".$data['email']."</td>";
				   			echo "<td align='center' style='width: 500px'>".$data['pass']."</td>";
				   			echo "<form onsubmit=\"return confirm('Anda yakin mau menghapus data?');\" method='POST'><td width='130px'><input hidden name='id_user' type='text' value=$data[id_user]><button type='submit' name='btnHapus' class='btn btn-danger'>Hapus</button></td></form>";
				   			echo "</center>"."</tr>";
			    		}
			    	echo "</table>";
			?>

			<ul class="pagination justify-content-center">
		
			<?php
				if($halaman == 1){
			        echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
			        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
	     		}
	     		else{
			        echo '<li class="page-item"><a class="page-link" href="?halaman=1">First</a></li>';
			        echo '<li class="page-item"><a class="page-link" href="?halaman='.$sebelumnya.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
			    }
	 
			    for($i = 1; $i <= $hal_akhir; $i++){
			        $link_active = ($halaman == $i)? ' active' : '';
			        echo '<li class="page-item '.$link_active.'"><a class="page-link" href="?halaman='.$i.'">'.$i.'</a></li>';
			    }
	 
	      		if($halaman == $jlh_halaman){
			        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
			        echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
			    }
			    else{
			        echo '<li class="page-item"><a class="page-link" href="?halaman='.$selanjutnya.'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
			        echo '<li class="page-item"><a class="page-link" href="?halaman='.$jlh_halaman.'">Last</a></li>';
			    }
			?>

			</ul>

		    <?php
				if(isset($_POST['btnHapus']))
		    	{
		    		include "includes/koneksi.php";

	    			$id_user = $_POST['id_user'];

		    		if($koneksi)
		    		{
		    			$sql="DELETE FROM akun WHERE id_user = $id_user";
						mysqli_query($koneksi,$sql);
						echo "<script>alert('Data Akun Berhasil Dihapus');</script>";
						echo "<script>location = 'admin-akun.php';</script>";
					}
					elseif($koneksi->connect_error){
						echo "<script>alert('Data Akun Gagal Dihapus');</script>";
						echo "<script>location = 'admin-akun.php';</script>";
					}
				}
			?>
    </div>
</body>
</html>