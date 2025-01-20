<?php 
session_start();

if ( !$_SESSION['is_logged_in'] ){
    header("Location: logout.php");
    exit;
}

    require 'classes/Database.php';
    require 'classes/Program.php';

$message = '';
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

    $conn = Database::getDB();

    $title = $_POST['title'];
    $details = $_POST['details'];


    $language = Program::insert( $conn , $title, $details );

    if ( $language ){
        $message = "Language Inserted Successfully";
    }
    
    
}



?>

<?php include 'includes/header.php'   ?>

<div class="container">
    <div class="row my-5">
        <h3>Add New Programming Langauge</h3>
        <?php if ( $message != '' ): ?>
            <div class="border border-success text-center text-success py-2"> <?= $message; ?> </div>
        <?php endif ; ?>    
        <div class="col">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="my-2">
                    <input type="text" name="title" class="form-control" id="" placeholder="Enter title of proramming langauge">
                </div>
                <div class="my-2">
                    <input type="text" name="details" class="form-control" id="" placeholder="Enter details">
                </div>    
                <button type="submit" class="form-control btn btn-dark">Add New</button>
            </form>
        </div>
    </div>
</div>
