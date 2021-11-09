<?php

define('DBNAME', 'php_form');
define('DBHOST', 'localhost');
define('DBPASSWORD', '');
define('DBUSER', 'root');

$dbconnect = mysqli_connect(DBHOST,DBUSER,DBPASSWORD,DBNAME);

if(!$dbconnect){
    die("Connect failed" . mysqli_connect_error());
}

