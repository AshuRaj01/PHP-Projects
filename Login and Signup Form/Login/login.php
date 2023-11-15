<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $serverName = 'localhost';
    $userName = 'root';
    $userPassword = '';
    $userDatabase = 'demoDatabase'; // Replace with your actual database name

    $conn = new mysqli($serverName, $userName, $userPassword, $userDatabase);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['uemail'];
    $password = $_POST['upass'];

    // Perform user authentication (use prepared statements and secure password hashing in a production environment)
    $query = "SELECT * FROM userinfo WHERE email_ID = '$email' AND passWord = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) 
    {
        echo "Welcome Home Page \n You have successfully logged in";
        // You can redirect the user to the home page or perform other actions as needed
    } else {
        // Authentication failed
        echo "You have entered the wrong Email ID or Password"."<br>"." Go back to the Login Page and try again "."<a href='login.html'>Login Page</a>";
    }

    $conn->close();
}
?>
