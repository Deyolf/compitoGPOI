<?php

$conn = new mysqli("localhost", "root", "root", "evento_musicale");

if ($conn->connect_error)
    die("Connection error " . $connect_error);
?>