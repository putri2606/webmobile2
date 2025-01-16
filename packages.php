<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PT. NOVAVIL MUTIARA UTAMA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/LOGO.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>novavilkotasorong02@gmail.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+62 22-1812-4895</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a target="_blank" class="text-primary px-3" href="https://www.facebook.com/novavil.official?mibextid=ZbWKwL">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a target="_blank" class="text-primary px-3" href="https://www.instagram.com/novavil.official/profilecard/?igsh=ODYwb3JxbGJva3h5">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a target="_blank" class="text-primary pl-3" href="https://youtube.com/@novavilofficial333?si=aPhFB8xUl4TbHqZG">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <img src="img/LOGO.jpg" alt="Logo Perusahaan" style="width: 80px; border-radius: 0; margin-bottom: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.5);"> 
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.html" class="nav-item nav-link">Home</a>
                        <a href="index.html" class="nav-item nav-link">About</a>
                        <a href="index.html" class="nav-item nav-link">Services</a>
                        <a href="packages.php" class="nav-item nav-link">Tour Packages</a>
                        <a href="index.html" class="nav-item nav-link">Contact</a>
                        <a href="index.html" class="nav-item nav-link">Testimonial</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


<?php
include 'db.php';

// Fetch data from database
$sql = "SELECT * FROM packages WHERE status = 'Active'";
$result = $conn->query($sql);
?>
    <style>
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            object-fit: cover;
            height: 200px;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            font-size: 0.9rem;
            color: #555;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            transition: background-color 0.3s ease;
        }

        .btn-info:hover {
            background-color: #7AB730;
            border-color: #7AB730;
        }

        .container {
            margin-top: 50px;
        }

        .header {
            background-color: #7AB730;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .display-4 {
            font-weight: bold;
        }
    </style>

    <div class="container">
        <div class="header text-center mb-5">
            <h1 class="display-4">Daftar Paket</h1>
            <p class="lead">Temukan paket terbaik untuk perjalanan Anda</p>
        </div>

        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['name'] ?></h5>
                            <p class="card-text">
                                <strong>Hotel 1</strong> <?= $row['location_from'] ?><br>
                                <strong>Hotel 2</strong> <?= $row['location_to'] ?><br>
                                <strong>Tanggal:</strong> <?= $row['date'] ?><br>
                                <strong>Harga:</strong> <?= number_format($row['price'], 2) ?> IDR<br>
                                <strong>Status:</strong> <?= ucfirst($row['status']) ?><br>
                                <strong>Tipe:</strong> <?= ucfirst($row['type']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <img src="img/LOGO.jpg" alt="Logo Perusahaan" style="width: 130px; border-radius: 0; margin-bottom: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.5);"> 
                <p>Pengalaman Tour & Travel yang Tak Terlupakan</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a target="_blank" class="btn btn-outline-primary btn-square mr-2" href="tel:+6282218124895 "><i class="fa fa-phone-alt mr-2"></i></a>
                    <a target="_blank" class="btn btn-outline-primary btn-square mr-2" href="https://www.facebook.com/novavil.official?mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a>
                    <a target="_blank" class="btn btn-outline-primary btn-square mr-2" href="https://youtube.com/@novavilofficial333?si=aPhFB8xUl4TbHqZG"><i class="fab fa-youtube"></i></a>
                    <a target="_blank" class="btn btn-outline-primary btn-square" href="https://www.instagram.com/novavil.official/profilecard/?igsh=ODYwb3JxbGJva3h5"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Our Services</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#about"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="#service"><i class="fa fa-angle-right mr-2"></i>Services</a>
                    <a class="text-white-50 mb-2" href="#packages"><i class="fa fa-angle-right mr-2"></i> Tour Packages</a>
                    <a class="text-white-50 mb-2" href="#contact"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                    <a class="text-white-50 mb-2" href="#testimonial"><i class="fa fa-angle-right mr-2"></i>Testimonial</a>
                    <a class="text-white-50" href="#blog"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Jl. Jendral Sudirman Ruko Pasar Bersama - Kel. Malabutor Kec. Sorong Manoi Kota Sorong Prov. Papua Barat Daya</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+62 822-1812-4895</p>
                <p><i class="fa fa-envelope mr-2"></i>novavilkotasorong02@gmail.com</p>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="https://novaviltravel.com/">Novavil</a>. All Rights Reserved.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white-50">Designed by <a href="https://novaviltravel.com/">PT. NOVAVIL MUTIARA UTAMA SORONG</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>