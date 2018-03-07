<?php

$page_title = 'Login';

include 'includes/header.html';

include 'includes/navbar.html';

if (isset ($_SESSION['username'])){
	echo "You are logged! You can " . "<a href='logout.php'>" . "logout" . "</a>";
}
else{
?>

<div class="container-left">
<form action="check_login.php" method="POST">
    Username:<br>
    <input type="text" name="username"><br>
    Password:<br>
    <input type="password" name="pass"><br><br>
    <input type="submit" value="Submit">
</form>
</div> <!-- end of <div class="container-left"> -->

<?php
}

include 'includes/footer.html';



?>

