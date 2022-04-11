<?php

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    // define('DB_NAME', 'database_name');

    // $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // $query = "INSERT INTO table_name (column1, column2) VALUES ('value1', 'value2')";

    $conn=new mysqli(DB_HOST,DB_USER,DB_PASS);
    if($conn->connect_error){
        die("连接失败".$conn->connect_error);
    }
    echo "连接成功";
    echo "<br/>";
?>