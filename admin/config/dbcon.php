<?php
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "HiMEl");
define("DB_DATABASE", "pos_system_php");

$conn = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if(!$conn){
    die("Connection failed: " . mysql_connect_error());
}