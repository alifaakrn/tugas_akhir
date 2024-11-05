<?php
require '../login/connection.php';
session_start();

// sesi login/logout
if(!isset($_SESSION['username'])){
    header("Location: ../login/login.php");
    exit();
}
// end sesi

    if(isset($_POST['submit_form'])){
        // mengammbil data dari form 
        $nama_foster = $_POST['txt_name'];
        $domisili_foster = $_POST['select_domisili'];
        $no_telp_foster = $_POST['txt_nohp'];
        $nama_hamster = $_POST['txt_namehamster'];
        $jenis_hamster = $_POST['select_jenis'];
        $jenis_kelamin_hamster = $_POST['select_jenis_kelamin'];
        $deskripsi_hamster = $_POST['txt_deskripsi'];
        $alasan = $_POST['txt_alasan'];
        // proses upload foto kode unik
        $foto_hamster = $_FILES['insert_foto']['name'];
        $foto_tmp = $_FILES['insert_foto']['tmp_name'];
        // menambahkan kode unik
        $kode_unik = time();
        $nama_foto_unik = $kode_unik . "_" . $foto_hamster;
        // memindahkan foto dengan nama baru
        move_uploaded_file($foto_tmp, '../file/' . $nama_foto_unik);

        // insert data ke mysql tb_foster
        $query_insert_foster = "INSERT INTO tb_foster (nama_foster, domisili_foster, no_telp_foster, alasan)
        VALUE ('$nama_foster', '$domisili_foster', '$no_telp_foster', '$alasan')";
        $res = mysqli_query($connection, $query_insert_foster);

            // Menambahkan id_foster sebagai id_owner
            $query_id = "SELECT MAX(id_foster) AS max_id FROM tb_foster";
            $res3 = mysqli_query($connection, $query_id);
            $row = mysqli_fetch_assoc($res3);
            $id_owner = (int)$row['max_id'];

        // insert data ke mysql tb_hamster
        $query_insert_hamster = "INSERT INTO tb_hamster (id_owner, nama_hamster, jenis_hamster, jenis_kelamin_hamster, deskripsi_hamster, foto_hamster)
        VALUE ($id_owner, '$nama_hamster', '$jenis_hamster', '$jenis_kelamin_hamster', '$deskripsi_hamster', '$nama_foto_unik')";
        $res2 = mysqli_query($connection, $query_insert_hamster);
        
        if($res){
            header("Location: ../data_hamster/daftar_hamster.php");
            exit();
        }else{
            $err = "";
        }
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Hibah</title>
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
                <h3>Formulir Menyerahkan Hamster</h3>
                <p>Silahkan lengkapi data-data berikut ini dengan benar dan lengkap.</p>
                <hr/>
                <!-- alert -->
                <?php if(isset($err)): ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                            Akun gagal didaftarkan.
                    </div>
                    </div>
                <?php endif; ?>
                <!-- end alert -->
                <!-- form -->
                <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                    <input type="text" name="txt_name" class="form-control" id="exampleFormControlInput1" placeholder="Nama">
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
                    <label for="exampleFormControlInput1" class="form-label">Nama Hamster</label>
                    <input type="text" name="txt_namehamster" class="form-control" id="exampleFormControlInput1" placeholder="Nama Hamster">
                </div>
                <div class="mb-3">
                    <label>Jenis Hamster</label><br/>
                    <select name="select_jenis" class="form-select" aria-label="Default select example">
                        <option selected>Pilih Jenis</option>
                        <option value="Syrian">Syrian</option>
                        <option value="Campbell">Campell</option>
                        <option value="Winter White">Winter White</option>
                        <option value="Roborovski">Roborovski</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jenis Kelamin Hamster</label><br/>
                    <select name="select_jenis_kelamin" class="form-select" aria-label="Default select example">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Jantan">Jantan</option>
                        <option value="Betina">Betina</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Hamster</label>
                    <textarea name="txt_deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alasan</label>
                    <textarea name="txt_alasan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Foto Hamster</label>
                    <input name="insert_foto" class="form-control" type="file" id="formFileMultiple">
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