<?php
// variabel penting
$hostname = "localhost"; 
$user = "root";
$password = "";
$db_name = "db_adopt_hammy";

// global variabel connection
$connection = mysqli_connect($hostname, $user, $password, $db_name);

function myquery($query){
    global $connection;
    $res = mysqli_query($connection, $query);
    $returns = [];

    while($data = mysqli_fetch_assoc($res)){
        $returns[] = $data;
    }

    return $returns;
}



// $data = myquery("SELECT * FROM tb_hamster");
// var_dump($data);
// die();
?>