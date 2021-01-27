<?php
$hostname = "localhost";
$dbname    =  "coba";
$username = "postgres";
$pass = "@data12";

// CREATE the connection TO the PostgreSQL
$db_conn = pg_connect(" host = $hostname dbname = $dbname user = $username password = $pass ");
?>