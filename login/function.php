<?php 
    require 'connection.php';

    // Jika terdapat 'action' dan 'id' maka melakukan sesuatu
    if(isset($_GET['action']) && isset($_GET['id'])){
        $action = $_GET['action'];
        $id = $_GET['id'];

        switch($action){
        case 'delete':
            delete_data($id);
            break;
        default:
            echo "";
        }
    }else{
        echo "Aksi dan ID tidak di definisikan!";
    }

    function delete_data($id){
        global $connection;
        $res = mysqli_query($connection, "DELETE FROM tb_hamster WHERE id_hamster = " . $id);
        
        if($res){
        // Jika true
        header("Location: ../data_hamster/data_hamster.php?messages=Berhasil dihapus");
        exit();
        }else{
        // Jika false
        header("Location: ../data_hamster/data_hamster.php?messages=Gagal dihapus");
        exit();
        }
    }

    function update($data){
        global $connection;

        $id = $data['id_hamster'];
        $id_owner = $data['id_owner'];
        $nama_hamster = $connection->real_escape_string($data['txt_namehamster']);
        $domisili = $data['select_domisili'];
        $jenis_hamster =  $data['select_jenis'];
        $jenis_kelamin_hamster = $data['select_jenis_kelamin'];
        $deskripsi_hamster = $data['txt_deskripsi'];

        // Fungsi untuk gambar baru
        $foto_lama = $data['foto_lama'];
        $foto_baru = $_FILES['foto_baru']['name'];
        $foto_baru_tmp = $_FILES['foto_baru']['tmp_name'];
        $nama_foto_unik = $foto_lama; //ini default ke foto lama

        // Jika ada gambar baru
        if($foto_baru){
            // Generate nama file untuk gambar baru
            $nama_foto_unik = time() . '_' . $foto_baru;
            move_uploaded_file($foto_baru_tmp, "../file/" . $nama_foto_unik);

            // Hapus foto lama jika ada foto baru
            if(file_exists("../file/" . $foto_lama)){
                unlink("../file/" . $foto_lama);
            }
        }
        
        // Query untuk update data hamster
        $query = "UPDATE tb_hamster SET
                nama_hamster = '$nama_hamster',
                jenis_hamster = '$jenis_hamster',
                jenis_kelamin_hamster = '$jenis_kelamin_hamster',
                deskripsi_hamster = '$deskripsi_hamster',
                foto_hamster = '$nama_foto_unik'
                WHERE id_hamster = $id";

        $query_hamster = mysqli_query($connection, $query);

        // Update domisili hamster
        if($query_hamster){
            $query_update = "UPDATE tb_foster SET domisili_foster = '$domisili' WHERE id_foster = $id_owner";
            $query_domisili = mysqli_query($connection, $query_update);
            if($query_domisili){
                return true;
            }else{
                echo false;
            }
        }else{
            echo false;
        }

    }

?>