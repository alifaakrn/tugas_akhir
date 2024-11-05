<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./artikel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body> 
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
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
                        <a class="nav-link mx-lg-2 active" aria-current="page" href="../home/home.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="../data_hamster/daftar_hamster.php">Daftar Hamster</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="./artikel/artikel.php">Artikel</a>
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
        <div class="bg-img"></div>
        <div class="container py-3">
            <div class="card mb-5">
                <div class="row col-12">
                    <!-- setting cage -->
                    <div class="col-12 mt-4 mb-3" align="center">
                        <h4 class="text-bold mb-4">Menyiapkan Kandang Hamster</h4>
                        <hr/>
                        <p class="deskripsi-komunitas">Menyiapkan kandang hamster jauh lebih rumit dari yang Anda bayangkan. Anda harus memasukkan semua perlengkapan, memastikan semuanya stabil, aman, mudah diakses, merangsang, dan terlihat menarik! Ini seperti teka-teki yang saya sangat nikmati untuk dipecahkan, tapi pekerjaan saya tidak pernah selesai! Saya selalu berusaha mencari cara untuk membuat kandang hamster saya lebih baik. Dalam panduan ini, saya menggunakan kandang hamster Prolee seluas 800 inci persegi - dimensinya sangat mirip dengan kotak 200 qt atau penampung 50 galon. Meskipun dimensi mungkin berbeda dari yang Anda miliki, metode keseluruhannya tetap sama!</p>
                        <div class="video-cage">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/GffwijHG07c?si=J07zsK41_IDfhSoV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                        
                        </div>
                    </div>
                    <!-- end setting cage -->
                </div>
            </div>
                <!-- hasmter cleaning -->
                <h4 class="mb-3" align="center">Cara Membersihkan Kandang Hamster Anda</h4>
                <p class="deskripsi-cleaning">Hamster adalah hewan kecil dan rapuh yang membutuhkan lingkungan yang bersih untuk tetap sehat dan bahagia. Kandang mereka harus dibersihkan secara teratur untuk mencegah penumpukan kotoran, bakteri, dan bau yang tidak sedap. Kandang yang kotor dapat menyebabkan masalah kesehatan seperti infeksi saluran pernapasan atau masalah kulit. Penting untuk sering mengganti alas kandang mereka, menyediakan air segar setiap hari, dan membersihkan sisa makanan. Lingkungan yang bersih tidak hanya meningkatkan kesejahteraan fisik hamster, tetapi juga mengurangi stres, membantu mereka tetap aktif dan ceria. Menjaga habitat mereka tetap bersih memastikan hidup yang lebih lama dan sehat bagi hamster peliharaan Anda.</p>
                <div class="about-adopt">
                    <div class="row">
                        <div class="col-9">
                            <ul>
                                <li>Membersihkan roda putae</li>
                                    <p>Jika hamster Anda seperti milik saya, mereka suka makan, tidur, ngemil, lalu buang air kecil di roda mainannya! Ini bisa berarti banyak mencuci roda untuk Anda! Untuk hamster yang menghabiskan banyak waktu di roda mereka dan sering buang air di sana, saya mencoba mencuci roda sekitar setiap dua hari sekali atau segera setelah roda mulai terlihat kotor. Saya tahu, dengan kehidupan yang sibuk, ini bisa sulit dilakukan secara rutin – oleh karena itu, saya sarankan untuk berinvestasi dalam beberapa roda berbeda sehingga Anda bisa memasang yang bersih jika tidak punya waktu untuk mencucinya saat itu. Dengan jadwal kerja yang padat, saya merasa lebih mudah membersihkan roda pada akhir pekan dan menyiapkannya untuk digunakan selama seminggu.</p>
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/pZYmo13J__4?si=ZmT1cdc61vRufN5B" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                <li>Membersihkan pasir</li>
                                    <p>Jika Anda memiliki hamster kerdil (Roborovski, Campbell, winter white, atau hibrida), Anda akan menemukan bahwa mereka menghabiskan banyak waktu di dalam bak pasir mereka! Hamster kerdil menggunakan bak pasir untuk membersihkan bulu mereka dan menyerap minyak. Mereka mungkin menggunakan sudut atau bersembunyi di dalam bak pasir sebagai tempat buang air, dan mereka juga bisa hanya bersantai, makan camilan, dan merenungkan kehidupan di bak pasir mereka! Untuk alasan ini, disarankan agar Anda membersihkan tempat persembunyian di bak pasir mereka secara teratur (saya menggunakan toples kaca dan tempat persembunyian keramik untuk memudahkan pembersihan) dan menyaring pasir mereka untuk menghilangkan gumpalan pasir yang terkena urin.</p>
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/4pYYtNPoWVw?si=lb7HXVx7sC8NXxC_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </ul>
                        </div>
                        <div class="col-3">
                            <ul>
                                <li>Rapikan permukaan datar</li>
                                <li>Bersihkan area buang air</li>
                                <li>Bersihkan botol air</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end hamster cleaning -->
            <div class="card mb-5">
                <div class="row">
                    <!-- tamming -->
                    <div class="col-12 mt-4 mb-3" align="center">
                        <h4 class="text-bold mb-4">Cara Mendekati Hamster</h4>
                        <hr/>
                        <p>Mendekati hamster memerlukan kesabaran, konsistensi, dan pendekatan yang lembut. Ketika Anda pertama kali membawa hamster Anda pulang, beri mereka beberapa hari untuk menyesuaikan diri dengan lingkungan barunya sebelum mencoba untuk mengangkatnya. Mulailah dengan berbicara pelan di sekitar hamster dan menawarkan camilan melalui jeruji kandang untuk membangun kepercayaan. Secara bertahap, coba letakkan tangan Anda di dalam kandang, memungkinkan hamster untuk mencium dan menjelajahi sesuai kecepatan mereka sendiri. Setelah hamster merasa nyaman, Anda dapat mulai mengangkatnya dengan lembut menggunakan kedua tangan. Penanganan secara rutin akan membantu hamster Anda lebih akrab dengan aroma dan keberadaan Anda, sehingga memudahkan proses penjinakan. Ingat, setiap hamster itu unik, jadi proses penjinakan mungkin memerlukan waktu, tetapi dengan ketekunan dan kebaikan, hamster Anda akan menjadi teman yang ramah dan percaya.</p>
                        <div class="video-tamming">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/RiIkUA4J3uA?si=mYeQE2S1zQ_ERziI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                        
                        </div>
                    </div>
                    <!-- end tamming -->
                </div>
            </div>    
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