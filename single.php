<?php

require 'includes/header.php';
require 'classes/Database.php';
require 'classes/Program.php';

$conn = Database::getDB();

$id = $_GET['id'];

$language = Program::getOne( $conn , $id );

// // $qry = "SELECT * FROM programs WHERE id=".$id;

// // To Avoid SQL Injection we are using prepared statements
// $qry = "SELECT * FROM programs WHERE id=?"; 

// // $result = mysqli_query( $conn , $qry);
// $stmt = mysqli_prepare( $conn , $qry);
// mysqli_stmt_bind_param( $stmt, 'i' , $id );

// if ( mysqli_stmt_execute( $stmt ) ){
//     $result = mysqli_stmt_get_result( $stmt );
//     $language = mysqli_fetch_assoc( $result );
// }

?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card my-4 border rounded p-3 shadow">
                <h3><?= $language['title'] ?></h3>
                <p><?= $language['details'] ?></p>
                <a href="index.php">Go Back</a>
            </div>
        </div>
    </div>
</div>



<?php include 'includes/footer.php'; ?>
