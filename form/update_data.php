<?php
require '../login/connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Mematikan data diterima
    if(isset($_POST['nama_adopter'], $_POST['domisi_adopter'], $_POST['no_telp_adopter'], $_POST['id_hamster'])){
        $nama_adopter = mysqli_real_escape_string($connection, $_POST['nama_adopter']);
        $domisili_adopter = mysqli_real_escape_string($connection, $_POST['domisili_adopter']);
        $no_telp_adopter = mysqli_real_escape_string($connection, $_POST['no_telp_adopter']);
        $id_hamster = mysqli_real_escape_string($connection, $_POST['id_hamter']);
    }
}

$query = "SET @count = 0;
        UPDATE tb_hamster SET id_hamster = @count:= 1 ORDER BY id_hamster;";

        if(mysqli_query($connection, $query)){
            echo "Data berhasil diupdate";
        }else{
            echo "Gagal diupdate" . mysqli_error($connection);
        }

        mysqli_close($connection);
?>