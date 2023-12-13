<?php

require "url.php";


/**
 * 
 * Získá jednoho žáka z databáze podle ID
 * 
 * @param object $connection - napojení na databázi
 * @param integer $id - id jednoho konkrétního žáka
 * 
 * @return mixed asociativní pole, které obsahuje informace o jednom konkrétním žákovi nebo vrátí null, pokud žák nebyl nalezen
 * 
 * 
 */


function getStudent($connection, $id) {
    $sql = "SELECT * FROM student
            WHERE id = ?";


    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt === false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        } 
    }
}



/**
 * 
 * Updatuje informace o žákovi
 * 
 * @param object $connection - napojení na databázi
 * @param string $first_name - Křestní jméno žáka
 * @param string $second_name - příjmení žáka
 * @param integer $age - věk žáka
 * @param string $live - informace o žákovi
 * @param string $collage - kolej žáka
 * @param integer $id - id žáka
 *  * 
 * @return void (navrací žádnou hodnotu)
 * 
 */

function updateStudent($connection, $first_name, $second_name, $age, $live, $collage, $id) {
    $sql =" UPDATE student 
            SET first_name = ?,
                second_name = ?,
                age = ?,
                live = ?,
                collage = ?
            WHERE id = ?     
            "; 

    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt === false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "ssissi", $first_name, $second_name, $age, $live, $collage, $id);

        if(mysqli_stmt_execute($stmt)) {
           
            redirectUrl("/databaze/admin/one-student.php?id=$id");
           
        
        }  
    }
}


/**
 * Vymaže studenta posle ID
 * 
 * @param object $connection - propojení s databází
 * @param integer $id - ID žáka
 * 
 * @return void
*/


function deleteStudent($connection, $id) {
    $sql = "DELETE 
            FROM student
            WHERE id = ? ";

    $stmt = mysqli_prepare($connection, $sql);
    
    if (!$stmt) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if(mysqli_stmt_execute($stmt)) {
            redirectUrl("/databaze/admin/zaci.php");
        }
    }
}

/**
 * Vrátí všechny žáky z databáze
 * 
 * @param object $connection - připojení do databáze
 * 
 * @return array pole objektů, kde každý objekt je jeden žák
 */


function getAllStudents($connection){
    $sql = "SELECT * FROM student ";

	$result = mysqli_query($connection, $sql);

	if( $result === false ) {
		echo mysqli_error($connection);
	} else {
		$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $students;
	}
}


/**
 * Přidá žáka do databáze a přesměrování na profil žáka
 * 
 * @param object $connection - napojení na databázi
 * @param string $first_name - Křestní jméno žáka
 * @param string $second_name - příjmení žáka
 * @param integer $age - věk žáka
 * @param string $live - informace o žákovi
 * @param string $collage - kolej žáka
 *  
 * @return void (navrací žádnou hodnotu)
*/

function createStudent($connection) {
    $sql = "INSERT INTO student (first_name, second_name, age, live, collage)
    VALUES (?, ?, ?, ?, ?)";

    $statement = mysqli_prepare($connection, $sql);
        
        if($statement === false){
            echo mysqli_error($connection);
        } else {
            mysqli_stmt_bind_param($statement, "ssiss", $_POST["first_name"], $_POST["second_name"], $_POST["age"], $_POST["live"], $_POST["collage"]);

            if(mysqli_stmt_execute($statement)) {
                $id = mysqli_insert_id($connection);
                redirectUrl("/databaze/admin/one-student.php?id=$id");
            } else {
                echo mysqli_stmt_error($statement);
            }
        }       
}