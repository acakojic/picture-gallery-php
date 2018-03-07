<?php

$page_title = "Home";

include 'includes/header.html';

include 'includes/navbar.html';

if (isset ($_SESSION ['username'])){
	echo "Logged in with name '" . $_SESSION['username'] . "'. You can <a href='logout.php'>logout</a>";
}
else{
	echo "Please " . "<a href='login.php'>login</a>";
}

include 'includes/footer.html';
?>