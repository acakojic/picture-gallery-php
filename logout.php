<?php

include 'includes/header.html';

include 'mysqli_connect.php';

if (session_status() == PHP_SESSION_ACTIVE){
	session_unset();
	session_destroy();
}

include 'includes/navbar.html';

if (!isset ($_SESSION['username'])){
	header ('location: index.php');
}
else{
	echo "Something is wrong.." ;
}

mysqli_close ($connection);

include 'includes/footer.html';
?>

