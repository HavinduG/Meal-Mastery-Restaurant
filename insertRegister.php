<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $email = $_POST["email"];
    $username =$_POST["userName"];
    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM user WHERE email = '$email' OR username = '$username'";
    $result = $conn->query($checkEmailQuery);

    }   if ($result->num_rows > 0) {
        // Email already exists, show an error message
          echo '<script>
    alert("Register failed. Username or Email already exist.");
    window.location.href = "signUp.php";
</script>';
    } else {
        // Email is not in use, proceed with registration logic

//die();
$name=$_POST['userName'];
$email =$_POST['email'];
$password=$_POST['password'];

$sql = "INSERT INTO user (`username`, `email` , `password`) VALUES ('$name','$email','$password')";

if ($conn->query($sql) === TRUE) {
    echo '<script>
    alert("Register Successfully.");
    window.location.href = "login.php";
    </script>';
} else {
    echo '<script>
    alert("Register failed. Username or Email already exist.");
    window.location.href = "signUp.php";
</script>';
}
    }
$conn->close();



?>