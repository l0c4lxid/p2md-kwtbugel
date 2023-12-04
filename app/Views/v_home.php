<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>KWTBugel |
    <?= $judul ?>
  </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="keywords" />
  <meta content="" name="description" />

  <!-- Favicon -->
  <link href="img/icon.png" rel="icon" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap"
    rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet" />
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->

  <!-- Navbar Start -->
  <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
      <div class="col-lg-6 px-5 text-start">
        <small><i class="fa fa-map-marker-alt me-2"></i>ꦔ꧀ꦭꦶꦥꦂ , Gunung
          Kidul.</small>
        <small class="ms-4"><i class="fa fa-envelope me-2"></i>klayar@kwtbugel.my.id</small>
      </div>
      <div class="col-lg-6 px-5 text-end">
        <small>Follow us:</small>
        <a class="text-body ms-3" href="https://www.instagram.com/hidroponik.klayar/">
          <span>@Hidroponik.Klayar </span><i class="fab fa-instagram"></i></a>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
      <a href="<?= base_url('') ?>" class="navbar-brand ms-4 ms-lg-0">
        <h1 class="fw-bold text-primary m-0">
          P<span class="text-secondary">2</span>MD
        </h1>
      </a>
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
          <a href="<?= base_url('') ?>#home" class="nav-item nav-link active"><i class="fas fa-home"></i>
            Home</a>
          <a href="<?= base_url('') ?>#about" class="nav-item nav-link">
            <i class="fas fa-users"></i> Tentang Kami</a>
          <a href="<?= base_url('') ?>#produk" class="nav-item nav-link"><i class="fas fa-seedling"></i>
            Produk</a>

          <a href="<?= base_url('') ?>#review" class="nav-item nav-link"><i class="fas fa-search"></i>
            Review</a>
          <a href="<?= base_url('') ?>blog" class="nav-item nav-link"><i class="fas fa-calendar-week"></i>
            Berita
            Acara</a>
        </div>
      </div>
    </nav>
  </div>
  <!-- Navbar End -->

  <!-- Carousel Start -->
  <div id="home" class="container-fluid p-0 mb-5 wow fadeIn section" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="w-100" src="img/carousel-1.jpg" alt="Image" />
          <div class="carousel-caption">
            <div class="container">
              <div class="row justify-content-start">
                <div class="col-lg-7">
                  <h1 class="display-2 mb-5 animated slideInDown">
                    Makanan Organik Baik untuk Kesehatan
                  </h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="w-100" src="img/carousel-2.jpg" alt="Image" />
          <div class="carousel-caption">
            <div class="container">
              <div class="row justify-content-start">
                <div class="col-lg-7">
                  <h1 class="display-2 mb-5 animated slideInDown">
                    Makanan Alami Selalu Sehat
                  </h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- Carousel End -->

  <!-- About Start -->
  <div id="about" class="container-xxl py-5 section">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
          <div class="about-img position-relative overflow-hidden p-5 pe-0">
            <!-- <img class="img-fluid w-100" src="img/p2md/ketua_p2md.jpg" /> -->
            <?php if (!empty($profile) && isset($profile[0])): ?>
              <!-- Menampilkan Foto Profile -->
              <?php if (isset($profile[0]['profile_foto'])): ?>
                <img src="<?= base_url('img/profile/' . $profile[0]['profile_foto']) ?>" alt="Profile Foto" width="500"
                  height="500">
              <?php else: ?>
                <p>Foto profile tidak ditemukan.</p>
              <?php endif; ?>
              <!-- Tambahkan data lain sesuai kebutuhan -->

            <?php else: ?>
              <p>Tidak ada data profile.</p>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
          <h1 class="display-5 mb-4">Buah dan Sayuran Organik Terbaik</h1>
          <p class="mb-4">
            Kami KWTBUGEL di Klayar, Gunung Kidul, bangga menjadi pionir dalam
            pengembangan pertanian hidroponik. Dengan menggunakan teknologi
            inovatif ini, kami mampu menghasilkan hasil pertanian yang
            berkualitas tanpa mengorbankan lahan yang luas. Sistem hidroponik
            kami memungkinkan pertumbuhan tanaman yang optimal, menghadirkan
            produk segar dan sehat. Kami berkomitmen untuk mempertahankan
            praktik pertanian ramah lingkungan dengan mengurangi penggunaan
            air dan bahan kimia secara signifikan. Bergabunglah dengan kami di
            perjalanan kami menuju masa depan pertanian yang berkelanjutan.
          </p>
          <p><i class="fa fa-check text-primary me-3"></i>Kualitas Terbaik</p>
          <p>
            <i class="fa fa-check text-primary me-3"></i>Keberlanjutan
            Lingkungan
          </p>
          <p>
            <i class="fa fa-check text-primary me-3"></i>Kepuasan Pelanggan
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->

  <!-- Feature Start -->
  <div class="container-fluid bg-light bg-icon my-5 py-6">
    <div class="container">
      <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
        <h1 class="display-5 mb-3">Keunggulan Kami</h1>
        <p>
          Hasil berkualitas tanpa tanah. Ramah lingkungan, hemat air.
          Bergabunglah dengan revolusi pertanian kami!
        </p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="bg-white text-center h-100 p-4 p-xl-5">
            <img class="img-fluid mb-4" src="img/icon-1.png" alt="" />
            <h4 class="mb-3">Proses Alami</h4>
            <p class="mb-4">
              Tanaman tumbuh secara alami tanpa pestisida atau pupuk kimia,
              menghasilkan produk alami dan segar
            </p>
            <!-- <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a> -->
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="bg-white text-center h-100 p-4 p-xl-5">
            <img class="img-fluid mb-4" src="img/icon-2.png" alt="" />
            <h4 class="mb-3">Produk Organik</h4>
            <p class="mb-4">
              Tanpa bahan kimia beracun. Hanya hasil alam segar dan sehat dari
              ladang kami
            </p>
            <!-- <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a> -->
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="bg-white text-center h-100 p-4 p-xl-5">
            <img class="img-fluid mb-4" src="img/icon-3.png" alt="" />
            <h4 class="mb-3">Aman Secara Biologis</h4>
            <p class="mb-4">
              Tanaman kami bebas dari kontaminan dan bahan berbahaya, menjaga
              keamanan konsumsi Anda.
            </p>
            <!-- <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Feature End -->

  <!-- Product Start -->
  <div id="produk" class="container-xxl py-5 section">
    <div class="container">
      <div class="row g-0 gx-5 align-items-end">
        <div class="col-lg-6">
          <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
            <h1 class="display-5 mb-3">Produk Kami</h1>
            <p>
              Kelezatan organik langsung dari ladang kami ke tangan Anda.
              Tanpa bahan kimia, segar, alami, dan aman untuk dinikmati.
            </p>
          </div>
        </div>

      </div>
      <div class="tab-content">
        <div id="tab-1" class="tab-pane fade show p-0 active">
          <div class="row g-4">
            <?php foreach ($produk as $key => $value) { ?>

              <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-item">
                  <div class="position-relative bg-light overflow-hidden">

                    <img class="img-fluid w-100" src="<?= base_url('img/produk/' . $value['foto_produk']) ?>" alt="" />
                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                      New
                    </div>
                  </div>
                  <div class="text-center p-4">
                    <a class="d-block h5 mb-2" href="">
                      <?= $value['nama_produk'] ?>
                    </a>
                    <span class="text-primary me-1">Rp.
                      <?= $value['harga_diskon'] ?> / Kg
                    </span>
                    <span class="text-body text-decoration-line-through">Rp.
                      <?= $value['harga_normal'] ?> / Kg
                    </span>
                  </div>
                  <div class="d-flex border-top">
                    <small class="w-50 text-center border-end py-2">
                      <p class="text-body" href="">
                        <i class="fa fa-eye text-primary me-2"></i>Promo
                      </p>
                    </small>
                    <?php
                    // Ambil nomor WhatsApp dari data profil
                    $nomorWhatsApp = isset($profile[0]['profile_wa']) ? $profile[0]['profile_wa'] : '';

                    // Hapus karakter-karakter yang tidak diperlukan dari nomor WhatsApp
                    $nomorWhatsAppClean = preg_replace('/[^0-9]/', '', $nomorWhatsApp);

                    // Pesan awal untuk ditambahkan ke tautan WhatsApp
                    $pesanAwal = "Assalamualaikum, ";

                    // Bentuk tautan WhatsApp dengan pesan awal
                    $tautanWhatsApp = "https://wa.me/62{$nomorWhatsAppClean}?text=" . rawurlencode($pesanAwal);
                    ?>

                    <small class="w-50 text-center py-2">
                      <?php if (!empty($nomorWhatsAppClean)): ?>
                        <a class="text-body" href="<?= $tautanWhatsApp ?>">
                          <i class="fa fa-shopping-bag text-primary me-2"></i>Kontak Kami
                        </a>
                      <?php else: ?>
                        <p>Nomor WhatsApp tidak ditemukan.</p>
                      <?php endif; ?>
                    </small>

                  </div>
                </div>
              </div>

            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Product End -->

  <!-- Firm Visit Start -->
  <div class="container-fluid bg-primary bg-icon mt-5 py-6">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
          <h1 class="display-5 text-white mb-3">Visit Our Team</h1>
          <p class="text-white mb-0">
            BEM UBSI Yogyakarta merupakan pionir dalam pengembangan hidroponik
            di kawasan ini. Dengan komitmen tinggi terhadap pertanian
            berkelanjutan, kami memimpin dengan inovasi dalam praktik
            hidroponik. Melalui pengetahuan mendalam dan dedikasi tim kami,
            kami berhasil menciptakan lingkungan pertanian hidroponik yang
            produktif dan ramah lingkungan. Produk-produk hidroponik kami
            adalah contoh nyata dari kualitas terbaik, ditanam tanpa
            menggunakan pestisida atau pupuk kimia. Dengan menggabungkan
            keahlian kami dalam hidroponik dan semangat berkelanjutan, kami
            menyediakan makanan organik yang segar dan berkualitas tinggi bagi
            masyarakat. Temukan kelezatan dan manfaat kesehatan dari produk
            hidroponik kami yang bebas bahan kimia, sambil mendukung pertanian
            berbasis teknologi di Yogyakarta.
          </p>
        </div>
        <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
          <a class="btn btn-lg btn-secondary rounded-pill py-3 px-5" href="<?= base_url('blog') ?>">Visit Now</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Firm Visit End -->

  <!-- Testimonial Start -->
  <div id="review" class="container-fluid bg-light bg-icon py-6 mb-5 section">
    <div class="container">
      <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
        <h1 class="display-5 mb-3">Customer Review</h1>
        <p>
          Temukan pengalaman positif pelanggan kami. Produk berkualitas tinggi
          dan layanan terbaik. Bergabunglah dengan komunitas pelanggan puas
          kami!
        </p>
      </div>
      <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
        <?php foreach ($review as $item): ?>
          <div class="testimonial-item position-relative bg-white p-5 mt-4">
            <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
            <p class="mb-4">
              <?= $item['isi_review'] ?>
            </p>
            <div class="d-flex align-items-center">
              <img class="flex-shrink-0 rounded-circle" src="img/review/<?= $item['foto_review'] ?> ?>" alt="" />
              <div class="ms-3">
                <h5 class="mb-1">
                  <?= $item['nama_review'] ?>
                </h5>
                <span>
                  <?= $item['pekerjaan_review'] ?>
                </span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
  <!-- Testimonial End -->


  <!-- Footer Start -->
  <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-lg-4 col-md-6">
          <h1 class="fw-bold text-primary mb-4">
            P<span class="text-secondary">2</span>MD
          </h1>
          <p>
            Kami KWTBUGEL di Klayar, Gunung Kidul, bangga menjadi pionir dalam
            pengembangan pertanian hidroponik. Dengan menggunakan teknologi
            inovatif ini, kami mampu menghasilkan hasil pertanian yang
            berkualitas tanpa mengorbankan lahan yang luas.
          </p>
          <div class="d-flex pt-2">
            <a class="btn btn-square btn-outline-light rounded-circle me-1"
              href="https://www.instagram.com/hidroponik.klayar"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <h4 class="text-light mb-4">Address</h4>
          <p>
            <i class="fa fa-map-marker-alt me-3"></i>ꦔ꧀ꦭꦶꦥꦂ , Gunung Kidul.
          </p>
          <p><i class="fa fa-phone-alt me-3"></i>+62 89607765169</p>
          <p><i class="fa fa-envelope me-3"></i>klayar@kwtbugel.my.id</p>
        </div>
        <div class="col-lg-4 col-md-6">
          <h4 class="text-light mb-4">Quick Links</h4>
          <a class="btn btn-link" href="/index.html#home">Home</a>
          <a class="btn btn-link" href="/index.html#about">Tentang Kami</a>
          <a class="btn btn-link" href="/index.html#produk">Produk</a>
          <a class="btn btn-link" href="/blog">Berita Acara</a>
          <?php
          // Ambil nomor WhatsApp dari data profil
          $nomorWhatsApp = isset($profile[0]['profile_wa']) ? $profile[0]['profile_wa'] : '';

          // Hapus karakter-karakter yang tidak diperlukan dari nomor WhatsApp
          $nomorWhatsAppClean = preg_replace('/[^0-9]/', '', $nomorWhatsApp);

          // Pesan awal untuk ditambahkan ke tautan WhatsApp
          $pesanAwal = "Assalamualaikum, ";

          // Bentuk tautan WhatsApp dengan pesan awal
          $tautanWhatsApp = "https://wa.me/62{$nomorWhatsAppClean}?text=" . rawurlencode($pesanAwal);
          ?>

          <small class="w-50 text-center py-2">
            <?php if (!empty($nomorWhatsAppClean)): ?>
              <a class="btn btn-link" href="<?= $tautanWhatsApp ?>">Kontak Kami
              </a>
            <?php else: ?>
            <?php endif; ?>
          </small>
        </div>
      </div>
    </div>
    <div class="container-fluid copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            &copy; 2023 <a href="#home">P2MD</a>, All Right Reserved.
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>