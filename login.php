<?php
session_start();

require 'includes/header.php';
require 'classes/Database.php';
require 'classes/Program.php';
require 'classes/User.php';

$conn = Database::getDB();
$message = '';
// Handling registration form submission
if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = $_POST['name'];
    $password = $_POST['password'];

    $result = User::getUser($conn, $username, $password);

    if ( !empty( $result )  ) {
        $_SESSION['is_logged_in'] = true;
        header( "Location: index.php" );

    } else {
        $message = "Username of Password Mismatch";
    }
}

mysqli_close($conn);
?>

<div class="container">
    <div class="row my-5">
        <div class="col-md-8 m-auto">
            <h3>Login here!</h3>
            <?php if ( $message != '' ): ?>
                <p class="text-danger text-center rounded border border-danger"> <?= $message ?> </p>
            <?php endif ;?>    
            <!-- HTML Form -->
            <form method="POST" action="">
                <!-- Username Input -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your username" required>
                </div>

                
                <!-- Password Input -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </form>
            <hr>
            <div class="">
                New User? <a href="register.php">Register Here / Sign Up</a>
            </div>
        </div>
    </div>
</div>

<?php require 'includes/footer.php';?>
