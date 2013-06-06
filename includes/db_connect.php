<?php
    $un = "gfry";
    $pw = "knights123!";
    $db = "gfry"; // this won't always be true out in the world, but in Sulley-land, you only get one database, and it's the same name as your MySQL username

    $mysqli = new mysqli("sulley.cah.ucf.edu",$un,$pw); // with Sulley, this will always be sulley.cah.ucf.edu

    if ($mysqli->connect_error) {
        die('Connect Error ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
    }
?>