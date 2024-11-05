<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#">Adopt Hammy</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Adopt Hammy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                        <a class="nav-link mx-lg-2 active" aria-current="page" href="./home.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="../data_hamster/daftar_hamster.php">Daftar Hamster</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../artikel/artikel.php">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../form/form_hibah.php">Formulir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../data_hamster/data_hamster.php">Data</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php if(isset($_SESSION['username'])): ?>
                    <a href="../login/logout.php" class="login-button">Logout</a>
                <?php else: ?>
                    <a href="../login/login.php" class="login-button">Login</a>
            <?php endif; ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- end navbar -->
    
    <!-- body -->
    <div class="content_section">
        <div class="bg-img">
        </div>
        <div class="container py-3">
            <div class="card mb-5">
                    <!-- perkenalan komunitas -->
                    <div class="col-12 mt-4 mb-3" align="center">
                        <h4 class="text-bold mb-4">Tentang Komunitas Kita</h4>
                        <hr/>
                        <p class="deskripsi-komunitas">Komunitas "Adopt Hammy" adalah kelompok yang hangat dan mendukung yang didedikasikan untuk menghubungkan orang-orang dengan hamster yang membutuhkan rumah baru. Komunitas ini sering terdiri dari pecinta hamster yang penuh semangat, penyelamat, dan individu yang ingin mengadopsi atau mencari rumah baru untuk hewan kecil yang menggemaskan ini. Komunitas ini berfungsi sebagai platform edukasi tentang perawatan hamster yang tepat, memberikan tips tentang nutrisi, penataan habitat, dan pemahaman perilaku. Anggota sering berbagi pengalaman, memberikan panduan tentang adopsi yang bertanggung jawab, dan menekankan pentingnya menyediakan lingkungan yang aman dan penuh kasih untuk hamster. Tujuannya adalah untuk memastikan setiap hamster menemukan rumah yang cocok dan penuh perhatian, dan para anggota sering bekerja sama untuk menyebarkan kesadaran tentang kebahagiaan mengadopsi daripada membeli dari peternak atau toko hewan peliharaan.</p>
                    </div>
                    <!-- end perkenalan komunitas -->
            </div>
                <!-- adopting,fostering,surrendering -->
                <h4 class="mb-3" align="center">Mengadopsi, Merawat Sementara, atau Menyerahkan Hamster</h4>
                <div class="about-adopt">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <h6>Mengadopsi</h6>
                            <p>Hamster adalah hewan yang sering dibeli dari toko hewan peliharaan dan kemudian ditelantarkan ketika pemiliknya memutuskan bahwa mereka tidak ingin merawat hewan ini. Jika Anda ingin membantu hewan yang membutuhkan, saya sangat menyarankan untuk memeriksa tempat penampungan hewan lokal Anda atau mencari penyelamatan hewan kecil di daerah Anda (daftar penyelamatan disediakan di bagian bawah halaman ini). Anda juga bisa menggunakan Adopt a Pet atau PetFinder untuk menemukan hamster yang sedang mencari rumah.</p>
                            </div>
                        <div class="col-lg-4 col-md-12">
                            <h6>Merawat Sementara</h6>
                            <p>Menjadi perawat sementara (foster) tidak hanya membuka ruang di tempat penyelamatan hewan kecil sehingga mereka bisa menerima hamster lain yang tidak memiliki rumah, tetapi juga memberi hamster kesempatan untuk mendapatkan perhatian lebih secara langsung untuk membantu mempersiapkan mereka menuju rumah tetap di masa depan. Hamster yang telah diserahkan, ditempatkan di kandang kecil di penampungan hewan kota, lalu dibawa ke tempat penyelamatan hewan kecil, telah melalui banyak hal. Dengan merawat mereka dan menyediakan rumah yang tenang serta penuh kasih, Anda dapat membantu mengurangi stres pada hewan kecil ini sehingga kepribadian mereka bisa terlihat!</p>      
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <h6>Menyerahkan Hamster</h6>
                            <p>Terkadang, hidup berjalan tidak sesuai rencana, dan kita tidak bisa terus merawat hewan peliharaan kita. Jika ini adalah situasi Anda, jangan ragu untuk segera menghubungi tempat penyelamatan hewan kecil di dekat Anda dan/atau memposting di salah satu grup Facebook ini untuk menemukan pengadopsi di dekat Anda:
                                *Pastikan untuk memulai postingan Anda dengan menyebutkan lokasi Anda! Dengan cara ini, Anda akan langsung menarik perhatian seseorang yang berada di dekat Anda!</p>
                        </div>
                    </div>
                </div>
                <!-- end adopting,fostering,surrendering -->
        </div>
    </div>
    <!-- end body -->

<!-- footer -->
<footer class="footer">
    <div class="container-footer text">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="container-card-footer">
                        <h6>Subscribe to our newsletter</h6>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" placeholder="Your email address">
                        </div>
                        <button type="submit" class="btn btn-primary">Sent</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <h6>Contacts</h6>
                <p>adopthammy@gmail.com</p>
                <p>+62 8221 8211 852</p>
                <b>We are located in Bandung, ID</b>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <h6>Social</h6>
                <div class="sosmed-container">
                    <ul class="social-list">
                        <li class="social-item">
                            <a href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li class="social-item">
                            <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li class="social-item">
                            <a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                        </li>
                        <li class="social-item">
                            <a href="#" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                        </li>
                    </ul>
                </div>                
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>