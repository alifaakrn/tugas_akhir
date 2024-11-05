<?php
require 'connection.php';
session_start(); // untuk memulai sesi

if(isset($_SESSION['username'])){
    header("Location: ../home/home.php");
    exit();
}
        if(isset($_POST['submit_login'])){
            // Ambil data dari form
            $username = $_POST['txt_username'];
            $password = $_POST['txt_password'];

            $query_select = "SELECT * FROM tb_user
                            WHERE username = '$username' AND password = '$password'";

            $res = mysqli_query($connection, $query_select);

            if(mysqli_num_rows($res) > 0){
                // kondisi true
                $_SESSION['username'] = $username;
                header("Location: ../home/home.php");
                exit();
            }else{
                // kondisi false
                $err = true;
            }
        }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./login.css">
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
    <div class="container">
        <div class="card-login">
            <div class="row">
                <div class="col-6 p-0">
                    <img src="../asset/gambar/hammy_login.jpg" class="img-login">
                </div>
                <div class="col-6 p-0">
                <div class="login-form">
                    <h2 class="text-bold mb-3">Login</h2>
                    <hr/>
                    <!-- alert -->
                    <?php if(isset($err)): ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                Username atau Password salah.
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- end alert -->
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="txt_username" class="form-control" id="exampleInputName">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="txt_password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" name="submit_login" class="btn btn-primary col-12 mb-4">Login</button>
                        <br/>
                        <p align="center">Dont have an account? <a href="./sign_up.php" class="link">Click Here</a></p>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end body -->

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>