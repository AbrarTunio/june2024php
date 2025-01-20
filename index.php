<?php
session_start();

if ( !$_SESSION['is_logged_in'] ){
    header("Location: logout.php");
    exit;
}

use Avifinfo\Prop;
require 'classes/Database.php';
require 'classes/Program.php';

$conn = Database::getDB();
$message = "";
if ( $_SERVER['REQUEST_METHOD'] == "POST" ){
    $id = $_POST['id'];
    $result =  Program::deleteOne( $conn , $id );

    if ( $result ){
        $message = 'Record Deleted';
    }
}

$programmings = Program::getAll( $conn );


// $qry = "SELECT * FROM programs";
// $result = mysqli_query( $conn , $qry);

// $programmings = mysqli_fetch_all( $result , MYSQLI_ASSOC );

?>

<?php include 'includes/header.php'   ?>
<?php include 'includes/navbar.php'   ?>

<div class="container">
    <div class="">
        <?php if($message != "" ): ?>
            <p class="border rounded border-danger p-2"> <?= $message ?> </p>
        <?php endif ;?>
    </div>
    <?php foreach ( $programmings as $onebyone ) : ?>
        <div class="row justify-content-around align-items-center">
            <div class="col-md-8">
                <div class="card my-4 border border-danger rounded p-3 shadow">
                    <h3><?= $onebyone['title'] ?></h3>
                    <p><?= $onebyone['details'] ?></p>
                    <a href="single.php?id=<?= $onebyone['id']; ?>">read more...</a>
                </div>
            </div>
            <div class="col-md-4">
                <form action="" method="post">
                    <input type="text" hidden name="id" value="<?= $onebyone['id']?>" >
                    <input class="btn btn-danger" type="submit" value="Delete">
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>



<?php include 'includes/footer.php'   ?>
