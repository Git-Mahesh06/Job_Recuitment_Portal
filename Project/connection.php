<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "job_portal";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
