<?php
require '../login/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hamster_id = $_POST['hamster_id'];
    $adopter_name = $_POST['adopter_name'];
    $contact = $_POST['contact'];

    // Update status hamster di database
    $query = "UPDATE tb_hamster SET status_adopsi = 'Not Available' WHERE id_hamster = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $hamster_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Redirect kembali ke halaman daftar hamster setelah sukses
        header("Location: ../daftar_hamster.php");
    } else {
        echo "Gagal memperbarui status hamster.";
    }

    $stmt->close();
}
?>
