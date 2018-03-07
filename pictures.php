<?php

$page_title = "Pictures";

include 'mysqli_connect.php';

include 'includes/header.html';

include 'includes/navbar.html';

if (isset ($_SESSION ['username'])){
    include 'includes/navbar_pictures.html';
}

$dirname = "uploads/";
$images = glob ($dirname . "*.jpg");

$sql1 = "SELECT pictures_name FROM pictures";
$result = mysqli_query ($connection, $sql1);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $path = "uploads/" . $row['pictures_name'];
?>
        <div class="gallery">
            <a target="_blank" href="<?php echo $path; ?>">
                <img src="<?php echo $path; ?>" id="<?php $filename = $row['pictures_name']; ?>" />
            </a>
            <div class="desc"><?php echo $row["pictures_name"]; ?></div>
        </div>
<?php
    }
    mysqli_free_result ($result);
}

mysqli_close ($connection);
unset ($connection);

include 'includes/footer.html';

?>

