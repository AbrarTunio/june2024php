<?php 

class Database
{
    public static function getDB(){

        $hostname = 'localhost';
        $dbuser = 'root';
        $dbuserpass = '';
        $dbname = 'june2024';
    
        return mysqli_connect( $hostname , $dbuser , $dbuserpass , $dbname  );
    
    }
}