<?php

$conn = mysqli_connect("localhost", "root", "", "joto_dealers");

if(!$conn){
    die("Could not connect to the database: " + mysqli_connect_error());
}