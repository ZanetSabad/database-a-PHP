<?php
    
    /**
     * Připojení se k databázi
     * 
     * @return object - pro připojení do databáze
     */

function connectionDB(){     // databázové spojení
    $db_host = "localhost";
    $db_user = "zany1";
    $db_password = "heslo1234";
    $db_name = "skola";

    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if(mysqli_connect_error()){
        echo mysqli_connect_error();
        exit;
    }
    return $conn;
}
?>

<!-- conn = connection -->