<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

//echo "Welcome, " . $_SESSION['username'] . "!";
?>


<?php include ('includes/head.php'); ?>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 my-auto">
            <h1 class="text-cente pt-5">Welcome, <?php echo $_SESSION['username']; ?>!  <span style="font-size:12px;"><a href="logout.php">Logout</a></span></h1>
            <hr>



        </div>
    </div>


    <?php include ('includes/footer.php'); ?>