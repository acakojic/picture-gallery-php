<?php

$page_title = "Registration";

include 'includes/header.html';

include 'includes/navbar.html';

if (isset ($_SESSION['username'])){
	echo "Logged in with name '" . $_SESSION['username'] . "'. You can <a href='logout.php'>logout</a>";
}
else{

?>
<div class="container-left">
<form action="check_registration.php" method="POST">
    Registration username:<br>
    <input type="text" name="username"><br>
    Registration password:<br>
    <input type="password" name="pass"><br><br>
    <input type="submit" value="Submit">
</form>
</div>

<?php

include 'includes/footer.html';

}

?>