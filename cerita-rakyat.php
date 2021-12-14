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
        <h1 class="text-light"><a href="index.html"><span>Dbaca</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="home-anggota.php">Home</a></li>
          <li><a class="nav-link scrollto" href="semua.php">Buku</a></li>
          <li class="dropdown"><a href="#"><span>Kategori</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="komputer.php">Komputer</a></li>
              <li><a href="hukum.php">Hukum</a></li>
              <li><a href="novel.php">Novel</a></li>
              <li><a href="komik.php">Komik</a></li>
			  <li><a href="cerita-rakyat.php">Cerita Rakyat</a></li>
              <li><a href="lainnya.php">Lainnya</a></li>
            </ul>
          </li>
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
          <h2>Koleksi Buku</h2>
          <ol>
            <li><a href="home-anggota.php">Home</a></li>
            <li>Cerita Rakyat</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Cerita Rakyat</h2>
          <p>Koleksi buku terbaik dari DBaca</p>
        </div>

        <div class="container">
		<div class="row">
			<?php
				if(isset($_GET['halaman']) && $_GET['halaman']!=""){
					$halaman = $_GET['halaman'];
				}
				else
					$halaman = 1;

				$limit = 9;

				if($halaman > 1){
					$offset = ($halaman * $limit) - $limit;
				}
				else
					$offset = 0;

				$sebelumnya = $halaman - 1;
				$selanjutnya = $halaman + 1;

				$query = mysqli_query($koneksi, "SELECT * FROM buku where jenis_buku = 'Cerita Rakyat'");
				$jlh_data = mysqli_num_rows($query);

				$jlh_halaman = ceil($jlh_data/$limit);
				$hal_akhir = $jlh_halaman;

				$query2 = "SELECT * FROM buku where jenis_buku = 'Cerita Rakyat' LIMIT $offset, $limit";
				$hasil2 = mysqli_query($koneksi, $query2);

				foreach($hasil2 as $data){
			?>

				<div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <image src="assets/img/images/<?php echo $data['foto_buku']; ?> " class="img-fluid" alt="">
              <div class="portfolio-links">
				<a href="assets/img/images/<?php echo $data['foto_buku']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $data['judul']; ?><br><?php echo $data['penulis']; ?><br><?php echo $data['tahun_terbit']; ?><br><?php echo $data['tebal_halaman']; ?> halaman"><i class="bi bi-plus"></i></a>
			  </div>
              <div class="portfolio-info">
                <h4><?php echo $data['judul']; ?></h4>
                <p><?php echo $data['jenis_buku']; ?></p>
              </div>
            </div>
          </div>

    		<?php } ?>

	    	<div class="col-sm-4"></div>
			
			<div class="col-sm-4">
				<ul class="pagination justify-content-center" style="margin-top: 30px">
			
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
			</div>
		</div>
	</div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>DBaca</span></strong>. Lab SDBL5 IKLC
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
        Designed by <a href="https://bootstrapmade.com/">Kelompok4</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
	</body>

</html>