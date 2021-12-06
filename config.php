<?php

$con = new mysqli('localhost', 'root', '', 'parcial');

    if(!$con){
        die (mysqli_error($con));
    } 
?>