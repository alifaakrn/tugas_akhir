<?php
require '../login/connection.php';
session_start();

// Filter status
    $statusCondition = ''; // Menyimpan kondisi filter berdasarkan status adopsi
    $statusQueryParam = ''; // Menyambungkan filter status ke pagination
        // Cek dan atur kondisi status
        if (isset($_GET['status']) && ($_GET['status'] === '0' || $_GET['status'] === '1')) {
            $status = $_GET['status'];
            $statusCondition = "status_adopsi = '$status'";
            $statusQueryParam = "$status = $status"; // Menyimpan status di pagination
        }

// Search
    $keywordCondition = '';
    $keywordQueryParam = '';
    if(isset($_GET['keyword']) && !empty($_GET['keyword'])){
        $keyword = $_GET['keyword'];
        $keywordCondition = "(hamster.nama_hamster LIKE '%$keyword%'
                                OR hamster.jenis_hamster LIKE '%$keyword%'
                                OR hamster.jenis_kelamin_hamster LIKE '%$keyword%'
                                OR foster.domisili_foster LIKE '%$keyword%')";
        $keywordQueryParam = "keyword=" . urlencode($keyword); // Keyword tetap di URL saat melalui paginasi
    }

    // Menggabungkan dua kondisi filter dan search
    $whereClause = '';
    if($statusCondition && $keywordCondition) {
        $whereClause = "WHERE $statusCondition AND $keywordCondition"; // 2 terpenuhi
    } elseif ($statusCondition || $keywordCondition) {
        $whereClause = "WHERE " . ($statusCondition ?: $keywordCondition); // Salah satu
    }
// End search

// Pagination
    // Ambil halaman saat ini dari parameter URL (default ke halaman 1)
    $limit = 12;         
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page > 1) ? ($page * $limit) - $limit : 0;

    // Query untuk menghitung total data
    $totalCardsQuery = myquery("SELECT COUNT(*) as total FROM tb_hamster AS hamster
                                JOIN tb_foster AS foster ON hamster.id_owner = foster.id_foster 
                                $whereClause");
    $totalCards = $totalCardsQuery[0]['total'];
    $totalPages = ceil($totalCards / $limit);
// End pagination

    // Query untuk mengambil data berdasarkan filter dan pagination
    $result = myquery("SELECT * FROM tb_hamster AS hamster 
    JOIN tb_foster AS foster ON hamster.id_owner = foster.id_foster
    $whereClause
    LIMIT $start, $limit");

    // Menggabungkan query string untuk pagination
    $queryString = http_build_query(array_filter(['status' => $_GET['status'] ?? null, 'keyword' => $_GET['keyword'] ?? null]));
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Hamster</title>
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
                        <a class="nav-link mx-lg-2 active" aria-current="page" href="../home/home.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="./daftar_hamster.php">Daftar Hamster</a>
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
    <div class="content_section">
        <div class="container py-2">
            <div class="card mb-5">
                <div class="row">
                    <div class="col-12 mt-4 mb-3" align="center">
                        <h4 class="text-bold mb-4">DAFTAR HAMSTER</h4>
                        <hr/>
                    </div>
                    <form action="" method="GET">
                        <div class="row">
                            <!-- Filter status -->
                            <div class="col-xl-2 col-md-3 col-xs-4">
                                <select name="status" class="form-select">
                                    <option value="">Select Status</option>
                                    <option value="0" <?= isset($_GET['status']) == true ? ($_GET['status'] == '0' ? 'selected':'') :'' ?>>Available</option>
                                    <option value="1" <?= isset($_GET['status']) == true ? ($_GET['status'] == '1' ? 'selected':'') :'' ?>>Not Available</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                            <!-- end filter status -->
                            <div class="col-xl-5 col-md-3 col-xs-1"></div>
                            <!-- Searching -->
                            <div class="col-xl-3 col-md-3 col-xs-5">
                                <input name="keyword" value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
                            </div>
                            <div class="col-1">   
                                <button name="search-button" class="btn btn-outline-success" type="submit">Search</button>
                            </div>
                            <!-- End searching -->
                        </div>
                    </form>
                    <!-- card -->
                    <!-- Menampilkan data dalam bentuk card -->
                    <div class="row justify-content-around">
                    <?php foreach ($result as $row): ?>
                    <div class="card hamster-card col-3">
                        <img src="../file/<?php echo $row["foto_hamster"]; ?>" class="card-img-top" name="foto_hamster">
                        <div class="card-body">
                            <h5 class="card-title" data-nama-hamster="<?php echo $row["nama_hamster"]; ?>"><?php echo $row["nama_hamster"]; ?></h5>
                            <div class="card-text mb-3">
                                <table>
                                    <tr>
                                        <td>Jenis</td>
                                        <td>:</td>
                                        <td data_jenis_hamster><?php echo $row["jenis_hamster"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenkel</td>
                                        <td>:</td>
                                        <td data_jenis_kelamin_hamster><?php echo $row["jenis_kelamin_hamster"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Domisili</td>
                                        <td>:</td>
                                        <td data_domisili><?php echo $row["domisili_foster"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td name="status_hamster">
                                            <?php echo $row['status_adopsi'] == 0 ? "Available" : "Not Available"; ?>                                        
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <?php if($row['status_adopsi'] == 0): ?> 
                                <a href="../form/form_adopt.php?hamster_id=<?php echo $row['id_hamster']; ?>" class="btn btn-primary" name="adopt_form">Click to Adopt</a>
                            <?php else: ?>
                                <button class="btn btn-secondary" disabled>Not Available</button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                    <!-- pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>&<?php echo $queryString; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>&<?php echo $queryString; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?>$<?php echo $queryString; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <!-- end pagination -->
                <!-- end card -->
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