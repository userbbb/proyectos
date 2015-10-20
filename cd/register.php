<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<?php include("includes/encriptar.php"); ?>


<?php

if(isset($_POST["register"])){


if( !empty($_POST['firstname']) && 
    !empty($_POST['lastname']) &&
    !empty($_POST['email']) && 
    !empty($_POST['username']) && 
    !empty($_POST['password'])) 
    {
	   $firstname=$_POST['firstname'];
       $lastname=$_POST['lastname'];
	   $email=$_POST['email'];
	   $username=$_POST['username'];
	   $password=Encrypter::encrypt($_POST['password']);
       
       
	

		
	$query=mysql_query("SELECT * FROM cont_user WHERE username='".$username."'");
	$numrows=mysql_num_rows($query);
	
	if($numrows==0)
	{
	$sql="INSERT INTO cont_user
			(username, firstname, lastname, email, password) 
			VALUES('".$username."','".$firstname."','".$lastname."','".$email."','".$password."')";

	$result=mysql_query($sql);


	if($result){
	 $message = "Usuario Creado";
	} else {
	 $message = "El usuario no fue creado";
	}

	} else {
	 $message = "El usuario ya existe";
	}

} else {
	 $message = "Es necesario rellenar todos los campos";
}
}
?>


<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
	
<div class="container mregister">
			<div id="login">
	<h1>Registrar</h1>
<form name="registerform" id="registerform" action="register.php" method="post">
	<p>
		<label>Nombres<br />
		<input type="text" name="firstname" id="firstname" class="input" size="32" value=""  /></label>
	</p>
    
    <p>
		<label>Apellidos<br />
		<input type="text" name="lastname" id="lastname" class="input" size="32" value=""  /></label>
	</p>
	
	<p>
		<label>E-mail<br />
		<input type="email" name="email" id="email" class="input" value="" size="32" /></label>
	</p>
	
	<p>
		<label>Nombre De Usuario<br />
		<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
	</p>
	
	<p>
		<label>Contraseña<br />
		<input type="password" name="password" id="password" class="input" value="" size="32" /></label>
	</p>	
	

		<p class="submit">
		<input type="submit" name="register" id="register" class="button" value="Registrar" />
	</p>
	
	<p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a>!</p>
</form>
	
	</div>
	</div>
	
	
	
	<?php include("includes/footer.php"); ?>