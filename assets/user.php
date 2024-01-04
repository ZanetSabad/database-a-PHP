<?php

/**
 * Přidá uživatele do databáze
 * 
 * @param object $connection - napojení na databázi
 * @param string $first_name - Křestní jméno uživatele
 * @param string $second_name - příjmení uživatele
 * @param string $email - email uživatele
 * @param string $password - heslo uživatele
 *  
 * @return integer $id - id uživatele
*/

function createUser($connection, $first_name, $second_name, $email, $password) {
    $sql = "INSERT INTO user (first_name, second_name, email, password)
    VALUES (?, ?, ?, ?)";

    $statement = mysqli_prepare($connection, $sql);
        
        if($statement === false){
            echo mysqli_error($connection);
        } else {
            mysqli_stmt_bind_param($statement, "ssss", $_POST["first_name"], $_POST["second_name"], $_POST["email"], $_POST["password"]);

            mysqli_stmt_execute($statement);
            $id = mysqli_insert_id($connection);
                return $id;               
      
        }       
    }

          // if(!empty($id)){           
            //     return $id;
            //  } else {
            //      echo mysqli_stmt_error($statement);
            // }