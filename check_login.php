<?php

$page_title = 'Check login';

include 'includes/header.html';

include 'mysqli_connect.php';

if (isset ($_SESSION['username'])){
	header ('location: index.php');
}
else{
    $username = $_POST['username'];
    $password = $_POST['pass'];

    $sql1 = "SELECT users_username, users_password FROM users WHERE users_username = '{$username}' AND users_password = '{$password}'";

    $result = mysqli_query ($connection, $sql1) or die (mysqli_error ($connection));

    if (mysqli_num_rows ($result) > 0){
        while ($row = mysqli_fetch_assoc ($result)){
            $_SESSION['username'] = $row['users_username'];
            include 'includes/navbar.html';
            echo "You are logged in with name '" . $row['users_username'] . "', please move on " . '<a href="pictures.php">pictures</a>';
	 
        }
    }
    else{
        include 'includes/navbar.html';
        echo "You are not logged in. Please login " . "<a href='login.php'>here.</a>";
    }
}

mysqli_close($connection);

include 'includes/footer.html';
?>