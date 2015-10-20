
<?php
session_start();
header("Content-type: text/css; charset: UTF-8");
$color1= $_SESSION['color1s'];
$color2= $_SESSION['color2s'];
$color3= $_SESSION['color3s'];
?>
#header{
	background-image: url("images/overlay2.png"), url("images/overlay3.svg"), linear-gradient(45deg,<?php echo $color1; ?>, <?php echo $color2; ?>,<?php echo $color3; ?>);
}


