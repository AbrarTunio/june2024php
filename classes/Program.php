<?php 

class Program
{
    public static function getAll( $conn  ){
        $qry = "SELECT * FROM programs ";
        $result = mysqli_query( $conn , $qry);

        return mysqli_fetch_all( $result , MYSQLI_ASSOC );
    } 

    public static function getOne( $conn , $id ){
        
        // $qry = "SELECT * FROM programs WHERE id=".$id;

        // To Avoid SQL Injection we are using prepared statements
        $qry = "SELECT * FROM programs WHERE id=?"; 

        // $result = mysqli_query( $conn , $qry);
        $stmt = mysqli_prepare( $conn , $qry);
        mysqli_stmt_bind_param( $stmt, 'i' , $id );

        if ( mysqli_stmt_execute( $stmt ) ){
            $result = mysqli_stmt_get_result( $stmt );
            $language = mysqli_fetch_assoc( $result );
            return $language;
        }
    }

    public static function deleteOne( $conn , $id ){
        $qry = "DELETE FROM programs WHERE id =".$id;
        $result = mysqli_query( $conn , $qry);
        if( $result ){
            return true;
        }
    }

    public static function insert( $conn , $title , $details ){
        $qry = "INSERT INTO `programs` (`title`, `details`) 
                VALUES ( ?, ? )";
        $stmt = mysqli_prepare( $conn , $qry);
        mysqli_stmt_bind_param( $stmt, 'ss' , $title , $details );

        if ( mysqli_stmt_execute( $stmt ) ){
           return true;
        }
    }


}