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
    <link href="<?= base_url('') ?>img/icon.png" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap"
        rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('') ?>lib/animate/animate.min.css" rel="stylesheet" />
    <link href="<?= base_url('') ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('') ?>css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="<?= base_url('') ?>css/style.css" rel="stylesheet" />
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
                    Kidul</small>
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
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="<?= base_url('') ?>" class="nav-item nav-link active">
                        <i class="fas fa-home"></i> Home</a>
                    <a href="<?= base_url('') ?>#about" class="nav-item nav-link"><i class="fas fa-users"></i> Tentang
                        Kami</a>
                    <a href="<?= base_url('') ?>#produk" class="nav-item nav-link"><i class="fas fa-seedling"></i>
                        Produk</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="feature.html" class="dropdown-item">Our Features</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div> -->
                    <a href="<?= base_url('') ?>#review" class="nav-item nav-link"><i class="fas fa-search"></i>
                        Review</a>
                    <a href="<?= base_url('') ?>blog" class="nav-item nav-link"><i class="fas fa-calendar-week"></i>
                        Berita
                        Acara</a>
                    <!-- <a href="/contact.html" class="nav-item nav-link">Contact Us</a> -->
                </div>
                <!-- <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a>
                </div> -->
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Galery Kegiatan</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-body" href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">
                        Galery Kegiatan
                    </li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">
                        <?= $post['judul_post'] ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Blog Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px">
                <h1 class="display-5 mb-3">
                    <?= $post['judul_post'] ?>
                </h1>
                <br />
                <!-- <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p> -->
            </div>
            <div class="col-md-12">
                <?php
                // Set the locale to Indonesian
                setlocale(LC_TIME, 'id_ID');

                // Convert the date to the desired format with Indonesian month name
                $tanggal_post_formatted = strftime('%d %B %Y', strtotime($post['tanggal_post']));
                ?>
                <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>
                    <?= $tanggal_post_formatted ?> |
                    <i class="fa fa-user text-primary me-2"></i>
                    <?= $post['pembuat_post'] ?>
                </small>
                <div class="row">
                    <div class="mt-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid" src="<?= base_url('img/post/' . $post['foto_post']) ?>" alt="" />
                    </div>
                    <div class="mt-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <?= $post['isi_post'] ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Blog End -->

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
                    <a class="btn btn-link" href="<?= base_url('') ?>#home">Home</a>
                    <a class="btn btn-link" href="<?= base_url('') ?>#about">Tentang Kami</a>
                    <a class="btn btn-link" href="<?= base_url('') ?>#produk">Produk</a>
                    <a class="btn btn-link" href="/blog">Berita Acara</a>
                    <a class="btn btn-link" href="https://wa.me/6289607765169">Kontak Kami</a>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#home">P2MD 2023</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('') ?>lib/wow/wow.min.js"></script>
    <script src="<?= base_url('') ?>lib/easing/easing.min.js"></script>
    <script src="<?= base_url('') ?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('') ?>lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('') ?>js/main.js"></script>
</body>

</html>