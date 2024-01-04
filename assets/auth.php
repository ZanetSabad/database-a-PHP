<?php

/**
 * Ověřuje zda je uživatel přihlášený
 * 
 * @return boolean true pokud je uživatel přihlášený, jinak false 
 * 
 */

function isLoggedIn(){
    return isset($_SESSION["is_logges_in"]) and $_SESSION["is_logges_in"];
}