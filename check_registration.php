<?php

$page_title = "Check registration";

include 'mysqli_connect.php';

include 'includes/header.html';

include 'includes/navbar.html';

if (isset ($_SESSION['username'])){
	header('location: index.php');
}
else{
	
    $username = $_POST['username'];
    $password = $_POST['pass'];


    $sql1 = "SELECT users_username, users_password FROM users WHERE users_username = '{$username}' AND users_password = '{$password}'";
    $sql2 = "INSERT INTO users (users_username, users_password) VALUES ('$username', '$password')";

    $result1 = mysqli_query ($connection, $sql1) or die (mysqli_error ($connection));

    if (mysqli_num_rows ($result1) == 0){
        if (mysqli_query ($connection, $sql2)){
            echo "New registration: '" . $username . "'<br>";
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }
    else{
        echo "You are not register! Please try again " . "<a href='registration.php'>registration</a>";
    }
}

mysqli_close ($connection);

include 'includes/footer.html';

?>