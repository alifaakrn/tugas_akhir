<?php
require '../login/connection.php';
session_start();
$hamster_id = 0;

if(!isset($_SESSION['username'])){
    header("Location: ../login/login.php");
    exit();
}

    // fungsi untuk mengambil id hamster
    if(isset($_GET['hamster_id'])){
        $hamster_id = $_GET['hamster_id'];

        // ambil data hamster berdasarkan ID
        $query = "SELECT * FROM tb_hamster WHERE id_hamster = ?";
        $stmt = $connection->prepare($query);
        $stmt ->bind_param("i", $hamster_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $hamster = $result->fetch_assoc();
    }

    // fungsi untuk submit data yang diisi
    if(isset($_POST['submit_form'])){
        // ini ambil data dari superglobal variabel $_POST
        $nama_adopter = $_POST['txt_nama'];
        $domisili_adopter = $_POST['select_domisili'];
        $no_telp_adopter = $_POST['txt_nohp'];

        $query_insert = "INSERT INTO tb_adopter (nama_adopter, domisili_adopter, no_telp_adopter, id_hamster) VALUES ('$nama_adopter', '$domisili_adopter', '$no_telp_adopter', $hamster_id)";
        $res = mysqli_query($connection, $query_insert);

            // Mengambil id_adopter baru 
            $query_id = "SELECT MAX(id_adopter) AS max_id FROM tb_adopter";
            $res3 = mysqli_query($connection, $query_id);
            $row = mysqli_fetch_assoc($res3);
            $id_adopter = (int)$row['max_id'];
            // Memperbaharui status dan id_owner
            $query_update = "UPDATE tb_hamster SET status_adopsi = 1, id_owner = $id_adopter WHERE id_hamster = $hamster_id";
            $res2 = mysqli_query($connection, $query_update);

        if($res){
            header("Location: ../data_hamster/daftar_hamster.php");
            exit();
        }else{
            $err = "Form gagal diisi";
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Adopt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./form.css">
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
                        <a class="nav-link mx-lg-2" href="../data_hamster/daftar_hamster.php">Data Hamster</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../artikel/artikel.php">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="./form_hibah.php">Formulir</a>
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
        <div class="container py-3">
                <?php if($hamster): ?>
                    <div class="card">
                        <h4>Data Hamster</h4>
                        <p>Nama Hamster: <?php echo $hamster["nama_hamster"]; ?></p>
                        <p>Jenis Hamster: <?php echo $hamster["jenis_hamster"]; ?></p>
                        <p>Jenis Kelamin Hamster: <?php echo $hamster["jenis_kelamin_hamster"]; ?></p>
                    </div>
                    <div class="card">
                        <h3>Formulir Adopsi</h3>
                        <p>Silahkan lengkapi data-data berikut ini dengan benar dan lengkap.</p>
                        <hr/>
                        <!-- form -->
                        <form method="POST">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="txt_nama" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label>Domisili</label><br/>
                            <select name="select_domisili" class="form-select" aria-label="Default select example">
                                <option selected>Pilih Domisili</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Tangerang">Tangerang</option>
                                <option value="Yogyakarta">Yogyakarta</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">No Handphone</label>
                            <input type="text" name="txt_nohp" class="form-control" id="exampleFormControlInput1" placeholder="123-45-678">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Saya setuju dengan <a href="#">Syarat & Ketentuan</a>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit_form" class="btn btn-primary col-12 mb-4">Submit</button>
                        </div>
                        </form>
                        <!-- end form -->
                    </div>
                    <?php else: ?>
                        <p>Hamster tidak ditemukan.</p>
                    <?php endif; ?>
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