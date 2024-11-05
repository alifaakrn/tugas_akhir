<?php
require '../login/connection.php';
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login/login.php");
    exit();
}

$data = myquery("SELECT hamster.id_hamster, hamster.nama_hamster, hamster.jenis_hamster, hamster.jenis_kelamin_hamster, foster.domisili_foster, foster.no_telp_foster, hamster.deskripsi_hamster, hamster.status_adopsi
FROM tb_hamster as hamster
JOIN tb_foster as foster 
ON hamster.id_owner = foster.id_foster
WHERE status_adopsi = 0");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Hamster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./data_hamster.css">
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
                        <a class="nav-link mxfile_tmp-lg-2 active" aria-current="page" href="../home/home.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="./daftar_hamster.php">Data Hamster</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../artikel/artikel.php">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../form/form_hibah.php">Formulir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="./data_hamster.php">Data</a>
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
<div class="content-section">
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <h3>Data Hamster</h3>

                    <!-- <?php if(isset($_GET['messages'])): ?>
                        <p color="red">
                            <?= $_GET['messages']; ?>
                        </p>
                    <?php endif; ?> -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Nama hamster</th>
                                <th>Domisili</th>
                                <th>No Telp</th>
                                <th>Jenis hamster</th>
                                <th>Jenis kelamin Hamster</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                            <tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row): ?>
                            <tr>
                                <td>
                                    <a href="../form/form_edit.php?id=<?= $row['id_hamster']?>&action=update" class="btn btn-primary" class="button-edit">Edit</a>
                                    <a href="../login/function.php?action=delete&id=<?= $row['id_hamster']?>" class="btn btn-outline-danger" onClick="return confirm('Yakin akan menghapus?')">Delete</a>
                                </td>
                                <td><?= $row['nama_hamster'] ?></td>
                                <td><?= $row['domisili_foster'] ?></td>
                                <td><?= $row['no_telp_foster']?></td>
                                <td><?= $row['jenis_hamster'] ?></td>
                                <td><?= $row['jenis_kelamin_hamster'] ?></td>
                                <td><?= $row['deskripsi_hamster'] ?></td>
                                <td>
                                    <?php echo $row['status_adopsi'] == 0 ? "Available" : "Not Available"; ?>                                        
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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