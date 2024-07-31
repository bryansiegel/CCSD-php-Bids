<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
    } else {
        echo "Invalid username or password";
    }
}
?>

<?php include('includes/head.php'); ?>

<div class="container">
  <div class="row justify-content-center align-items-center">
  <div class="col-md-6 my-auto">

      <h1 class="text-center pt-5 mt-5">Login</h1>
    <form method="POST" action="login.php">
      <div class="form-group pt-4">
        <label for="username">Username:</label>
        <input class="form-control" type="text" name="username" required>
        </div>

        <div class="form-group pt-4">
        <label for="password">Password:</label>
        <input class="form-control" type="password" name="password" required>
        </div>


        <div class="form-group pt-4">
        <button class="btn btn-primary"type="submit">Login</button>
        </div>
      </form>
    </div>
    </div>
    </div>

<?php include('includes/footer.php'); ?>