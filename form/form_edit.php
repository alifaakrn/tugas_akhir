<?php
require '../login/function.php';
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login/login.php");
    exit();
}

$id_hamster = $_GET['id'];

$data = myquery("SELECT * FROM tb_hamster AS hamster
                JOIN tb_foster as foster
                ON hamster.id_owner = foster.id_foster
                WHERE id_hamster = $id_hamster");

    if(isset($_POST['submit_update'])){
        $check = update($_POST);
        // var_dump($check);
        // die();
        if($check){
            echo "<script>
            alert('Data berhasil diubah');
            document.location.href = '../data_hamster/data_hamster.php';
            </script>";
        }else{
            echo "<script>
            alert('Data gagal diubah');
            </script>";
        }
    }

    // var_dump($id_hamster);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Edit</title>
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
                        <a class="nav-link mxfile_tmp-lg-2 active" aria-current="page" href="../home/home.php">Home</a>
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
        <!-- <div class="bg-img"></div> -->
        <div class="container py-3">
            <div class="card">
                <h3>Formulir Edit Data Hamster</h3>
                <p>Silahkan lengkapi data-data berikut ini dengan benar dan lengkap.</p>
                <hr/>
                <!-- alert -->
                <?php if(isset($err)): ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                            Data gagal diubah.
                    </div>
                    </div>
                <?php endif; ?>
                <!-- end alert -->
                <!-- form -->
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_hamster" value="<?= $id_hamster ?>">
                    <input type="hidden" name="id_owner" value="<?= $data[0]['id_foster'] ?>">
                    <input type="hidden" name="foto_lama" value="<?= $data[0]['foto_hamster'] ?>"> 
                    <!-- nama hamster -->
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Hamster</label>
                        <input type="text" name="txt_namehamster" class="form-control" id="exampleFormControlInput1" placeholder="Nama Hamster" value="<?= $data[0]['nama_hamster'] ?>">
                    </div>
                    <!-- domisili hamster -->
                    <div class="mb-3">
                        <label>Domisili</label><br/>
                        <select name="select_domisili" class="form-select" aria-label="Default select example">
                            <option value="Bandung"<?php echo ($data[0]['domisili_foster'] == "Bandung" ? 'selected' : ''); ?>>Bandung</option>
                            <option value="Jakarta"<?php echo ($data[0]['domisili_foster'] == "Jakarta" ? 'selected' : ''); ?>>Jakarta</option>
                            <option value="Tangerang"<?php echo ($data[0]['domisili_foster'] == "Tangerang" ? 'selected' : ''); ?>>Tangerang</option>
                            <option value="Yogyakarta"<?php echo ($data[0]['domisili_foster'] == "Yogyakarta" ? 'selected' : ''); ?>>Yogyakarta</option>
                        </select>
                    </div>
                    <!-- no Handphone -->
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Handphone</label>
                        <input type="text" name="txt_nohp" class="form-control" id="exampleFormControlInput1" placeholder="123-45-678" value="<?= $data[0]['no_telp_foster'] ?>">
                    </div>
                    <!-- jenis hamster -->
                    <div class="mb-3">
                        <label>Jenis Hamster</label><br/>
                        <select name="select_jenis" class="form-select" aria-label="Default select example">
                            <option value="Syrian"<?php echo ($data[0]['jenis_hamster'] == "Syrian" ? 'selected' : ''); ?>>Syrian</option>
                            <option value="Campbell"<?php echo ($data[0]['jenis_hamster'] == "Champbell" ? 'selected' : ''); ?>>Campell</option>
                            <option value="Winter White"<?php echo ($data[0]['jenis_hamster'] == "Winter White" ? 'selected' : ''); ?>>Winter White</option>
                            <option value="Roborovski"<?php echo ($data[0]['jenis_hamster'] == "Roborovski" ? 'selected' : ''); ?>>Roborovski</option>
                        </select>
                    </div>
                    <!-- jenis kelamin hamster -->
                    <div class="mb-3">
                        <label>Jenis Kelamin Hamster</label><br/>
                        <select name="select_jenis_kelamin" class="form-select" aria-label="Default select example">
                            <option value="Jantan"<?php echo ($data[0]['jenis_kelamin_hamster'] == "Jantan" ? 'selected' : ''); ?>>Jantan</option>
                            <option value="Betina"<?php echo ($data[0]['jenis_kelamin_hamster'] == "Betina" ? 'selected' : ''); ?>>Betina</option>
                        </select>
                    </div>
                    <!-- deskripsi hamster -->
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Hamster</label>
                        <textarea name="txt_deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $data[0]['deskripsi_hamster'] ?></textarea>
                    </div>
                    <!-- foto hamster -->
                    <div class="mb-3">
                        <div class="row">
                            <!-- foto lama -->
                            <div class="col-5">
                                <label>Foto Lama</label><br>
                                <img src="../file/<?= $data[0]['foto_hamster'] ?>" class="foto-lama" alt="Gambar hamster lama" width="300px">
                            </div>
                            <!-- foto baru -->
                            <div class="col-7">
                                <label for="formFileMultiple" class="form-label">Unggah Foto Hamster Baru</label>
                                <input name="foto_baru" class="form-control" type="file" id="formFileMultiple">
                            </div>
                        </div>
                    </div>
                    <!-- button -->
                    <div class="mb-3">
                        <button type="submit" name="submit_update" class="btn btn-primary col-12 mb-4">Save</button>
                    </div>
                </form>
                <!-- end form -->
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