<!doctype html>
<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>
<html>
<head>
<script src="js/nicEdit.js"></script>
<script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	</script>
<meta charset="utf-8">
<title>prueba formulario</title>
</head>


<body>
<form name="valores"  action="index.php" method="post" enctype="multipart/form-data">
	Selecciona un color1: <input name="color1" type="color" value="#f3f3f3"/>
    </br>
    Selecciona un color2: <input name="color2" type="color" value="#f3f3f3"/>
    </br>
    Selecciona un color3: <input name="color3" type="color" value="#f3f3f3"/>
    </br>
    Titulo: <input name="titulo" rows="10" cols="50" ></input>
    </br>
    Introduccion: <textarea name="introduccion" rows="10" cols="50" ></textarea>
    </br>
    Contenido1: <textarea name="contenido1" rows="10" cols="50" ></textarea>
    </br>
    Contenido2: <textarea name="contenido2" rows="10" cols="50" ></textarea>
    </br>
    Contenido3: <textarea name="contenido3" rows="10" cols="50" ></textarea>
    </br>
    Titulo2: <textarea name="titulo2" rows="10" cols="50" ></textarea>
    </br>
    Introduccion2: <textarea name="introduccion2" rows="10" cols="50" ></textarea>
    </br>
    subir archivo: <input type="file" required="required" size="10" name="arc">
    
<input type="submit" name="enviar" value="enviar">    
</form>
</body>
</html>
<?php
}
?>
