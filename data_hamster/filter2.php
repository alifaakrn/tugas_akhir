<?php 
require '../login/connection.php';

    function search($keyword){
        $query = "SELECT * FROM tb_hamster AS hamster 
                JOIN tb_foster AS foster ON hamster.id_owner = foster.id_foster
                WHERE 
                nama_hamster = '$keyword'
                ";
    
        return query($query);
    }
?>

                    <!-- dropdown -->
                    <div class="col-3">
                        <form action="filter.php" method="GET">
                        <select class="form-select mb-2" name="status" aria-label="Default select example">
                            <option value="available">Available</option>
                            <option value="not_available">Not Available</option>
                        </select>
                        <button class="btn btn-primary">Execute</button>
                        </form>
                    </div>
                    <!-- end dropdown -->
                    <div class="col-5"></div>
                    <!-- search -->
                    <div class="col-4 mb-3" align="right">
                        <form class="d-flex" role="search" method="GET" action="" name="keyword">
                            <input id="search-input" class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" autocomplete="off">
                            <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- end search -->