<?php
require '../login/connection.php';

// Ambil parameter dari URL
$status = isset($_GET['status_hamster']) ? $_GET['status_hamster'] : 'all';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Buat kondisi status available atau not avalable
$statusQuery = '';
if ($status == 'available') {
    $statusQuery = 0;
} elseif ($status == 'not_available') {
    $statusQuery = 1;
}

// Buat kondisi pencarian berdasarkan keyword
$searchQuery = '';
if (!empty($keyword)) {
    $searchQuery = "(hamster.nama_hamster LIKE '%$keyword%'
                    OR foster.domisili_foster LIKE '%$keyword%')";
}
// $searchQuery = '';
// if (!empty($keyword)) {
//     $searchQuery = "(hamster.nama_hamster LIKE '%$keyword%' 
//                     OR foster.domisili_foster LIKE '%$keyword%' 
//                     OR hamster.jenis_hamster LIKE '%$keyword%' 
//                     OR hamster.jenis_kelamin_hamster LIKE '%$keyword%')";
// }

// Query dasar untuk join tb_hamster dan tb_foster
$combinedQuery = "SELECT * FROM tb_hamster AS hamster 
                JOIN tb_foster AS foster ON hamster.id_owner = foster.id_foster
                WHERE hamster.status_adopsi = '$statusQuery'";

$data = mysqli_query($connection, $combinedQuery);
$result = mysqli_fetch_assoc($data);
                var_dump($result);

// Tambahkan kondisi WHERE jika status atau search query ada
// $conditions = [];
// if (!empty($statusQuery)) {
//     $conditions[] = $statusQuery;
// }
// if (!empty($searchQuery)) {
//     $conditions[] = $searchQuery;
// }

// Eksekusi query
$result = myquery($combinedQuery);


?>

<!-- /**
 * Buat file baru bernama filter.php yang menerima $_GET dari filter
 * $_GET (status=all/available/not_available&keyword=lucu)
 * dibuat satu query untuk mengambil data hamster yang sudah di join seperti $combinedQuery
 */ -->

 <?php echo $row['status_adopsi'] == 0 ? "Available" : "Not Available"; ?>                                        
