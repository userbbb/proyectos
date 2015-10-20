<!doctype html>
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
<?php
echo $_FILES['arc']['tmp_name'];
echo $_FILES['arc']['name'];

if(is_uploaded_file($_FILES['arc']['tmp_name'])) 
					{ 
						$nombreDirectorio = "./files/";  
						$nombreFichero = $_FILES['arc']['name'];
						if(move_uploaded_file($_FILES['arc']['tmp_name'], $nombreDirectorio.$nombreFichero)) 
						{ 
							echo "Archivo subido correctamente"; 
						} 
						else 
						{ 
							echo "No puede mover el archivo a su ubicación final"; 
						} 
					} 
					else 
					{ 
						echo "No se ha podido subir el fichero"; 
					}
?>
</body>
</html>