<?php 

$hostname = 'localhost';
$dbuser = 'root';
$dbname = 'ruragrihub';
$dbpassword = 'Kulundeng.Jamach.1';


$conn = mysqli_connect($hostname, $dbuser, $dbpassword, $dbname);

if(!$conn){
    die("Something went wrong with the database connection");
}




?>