<?php
    
    // databázové spojení
    $db_host = "localhost";
    $db_user = "zany1";
    $db_password = "heslo123";
    $db_name = "skola";

    $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if(mysqli_connect_error()){
        echo mysqli_connect_error();
        exit;
    }

?>