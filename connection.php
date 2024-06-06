<?php

$servername = "localhost";

$username = "root";

$password = "";

$database = "blog_db"; 

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error) die("Connection to database failed") . $conn->connect_error;
