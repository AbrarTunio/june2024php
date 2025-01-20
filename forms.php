<?php 

include 'includes/header.php';  

$message = '';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

    // if ( isset( $_POST['submit'] ) ){
    
    $uname = 'abrar';
    $code = 'secret';
    
    if ( $_POST['username'] ==  $uname &&  $_POST['password'] ==  $code){
        $message = "<div class='border rounded text-center text-success border-success'>Login Successfull</div>";
    }else{
        $message = "<div class='border rounded text-center text-danger border-danger'>Login Failed</div>";
    }
    // }

}

?>

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <h3>Login Form</h3>
            <p class="border rounded"> <?php echo $message; ?> </p>
            <form action="" method="POST">
                <div class="my-2">
                    <input type="text" name="username" class="form-control" placeholder="Enter Username">
                </div>
                <div class="my-2">
                    <input type="password" name="password" class="form-control" placeholder="Enter Username">
                </div>            
                <div class="my-2">
                    <input type="submit" name="submit" value="Display" class="btn btn-danger">
                </div>
            </form>
        </div>
        
    </div>
</div>

<?php include 'includes/footer.php';  ?>