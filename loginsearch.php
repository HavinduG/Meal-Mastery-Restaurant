<?php
// Database connection parameters
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

// Assuming you have a form with POST data for username and password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = $_POST["userName"];
    $password = $_POST["password"];

    // SQL query to check if the username and password match
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, user found in the database
        echo '<script>
        alert("login Successfully.!");
        window.location.href = "index.html";
    </script>';
        
       
       
    } else {
        // Login failed, user not found or credentials don't match
        echo '<script>
        alert("Login failed. Please check your username and password.");
        window.location.href = "login.php";
    </script>';
        
        
    }
}

// Close the connection
$conn->close();
?>
