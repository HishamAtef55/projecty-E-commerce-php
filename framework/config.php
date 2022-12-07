<?php
function DB_connect()
{
    $host_name = "localhost";
    $DB_username = "root";
    $DB_password = NULL;
    $DB_name = "furinture";
    $connection_link = mysqli_connect($host_name, $DB_username, $DB_password, $DB_name)
        or die("Data Base connection error");
    return $connection_link;
}
$con = DB_connect();
