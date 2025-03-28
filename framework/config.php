<?php

function db_connect()
{
    $hostName = "localhost";
    $databaseUsername = "root" ;
    $databasePassword =  NULL ; 
    $databaseName = "gym" ;

    $connection_link = @mysqli_connect($hostName , $databaseUsername, $databasePassword ,$databaseName) or die("database connection error !") ;

    return $connection_link ;

}

//  when call this config we call the function 
$con = db_connect();

?>