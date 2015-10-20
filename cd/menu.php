<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>


<?php include("includes/header.php"); ?>
<div>
    <h1 align=center>CONTENIDO DINAMICOS</h1>
    <h2 align=center>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
</div>
<div style="padding: 0 auto; margin-top: 100px;">
    <table align=center style="height: 100px; width: 100px;">
        <tr>
            <td><a href="Plantillas/P1/formp.php"><img src="img/reporte1.png"/></a ></td>
            <td><img src="img/reporte1.png"/></td>
            <td><img src="img/reporte1.png"/></td>
        </tr>
        <tr>
            <td><img src="img/reporte1.png"/></td>
            <td><img src="img/reporte1.png"/></td>
            <td><img src="img/reporte1.png"/></td>
        </tr>
    </table>
</div>
<li><input type="button" src="logout.php" name="login" value="Finalizar Sesión" class="btn"></li>
<p align=center><a href="logout.php">Finalice</a> sesión aquí!</p>

<?php include("includes/footer.php"); ?>
	

<?php
}
?>
