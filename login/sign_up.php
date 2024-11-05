<?php
    require 'connection.php';

    if(isset($_POST['submit_insert_user'])){
        $username = $connection->real_escape_string($_POST['txt_username']);
        $email = $_POST['txt_email'];
        $password = $_POST['txt_password'];
        $confirm_pass = $_POST['txt_confirm_password'];

        // insert data ke tb_user
        $query_insert = "INSERT INTO tb_user (id_user, username, email, password)
        VALUES (null, '$username', '$email', '$password')";

        $res = mysqli_query($connection, $query_insert);
        if($res){
            echo '<script type="text/javascript">
                window.location.href="login.php";
                </script>'; // diarakan ke halaman login
        }else{
            $err = true;
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
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
            <a href="./login.php" class="login-button">Login</a>
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
                        <h2 class="text-bold mb-3">Sign Up</h2>
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
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="txt_username" class="form-control" id="exampleInputName">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="txt_email" class="form-control" id="exampleInputEmail">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="txt_password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="txt_confirm_password" class="form-control" id="exampleInputPassword2">
                            </div>
                            <button type="submit" name="submit_insert_user" class="btn btn-primary col-12 mb-4">Sign Up</button>
                            <br/>
                            <p align="center">Already have an account? <a href="./login.php" class="link">Click Here</a></p>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- end body -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>