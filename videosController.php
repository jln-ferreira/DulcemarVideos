<?php
//-------------------------CANNECTIONS DB----------------------------
	//to allow use mySQL DATABASE
    require_once 'connection.php';

    // GET ALL CATEGORIES
    $sql = $conn->query("SELECT * FROM categories");
    $categories = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo var_dump($categories);



 ?>