<?php 

class User
{
    // Create User (Registration)
    public static function register($conn, $username,  $password)
    {
        // Hash password using BCRYPT
        // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert new user into the database
        $qry = "INSERT INTO users (name, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $qry);
        mysqli_stmt_bind_param($stmt, 'ss', $username,  $password);

        if (mysqli_stmt_execute($stmt)) {
            return true; // Registration successful
        } else {
            return false; // Registration failed
        }
    }


    public static function getUser($conn, $username,  $password)
    {
        
        // Insert new user into the database
        $qry = "SELECT * FROM users WHERE name = ? and password = ?";
        $stmt = mysqli_prepare($conn, $qry);
        mysqli_stmt_bind_param($stmt, 'ss', $username,  $password);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result( $stmt );
            return mysqli_fetch_assoc( $result );
        } 
    }



}