<?php
if (empty($_GET["ID"]) || empty($_GET["USUARIO"])){
    echo "Hace falta el id de la plantilla o el usuario";
}else if(!isset($_GET["ID"]) || !isset($_GET["USUARIO"])) {
	echo "Hace falta el id de la plantilla o el usuario";
} else {
    require_once("../../includes/connection.php");
    $idunico= $_GET["ID"];
    $usuarioplat= $_GET["USUARIO"];
    $fechaIngreso= time();
    $queryplantilla =mysql_query("select id from cont_plantillas where idunico like '".$idunico."'");
    if($row=mysql_fetch_assoc($queryplantilla))
        {
            $idplantilla2=$row['id'];
        }
    $item = array();
    $value = array();
    $query =mysql_query("select item,value from cont_itemvalue where idplantilla like '".$idplantilla2."'");
    while($row=mysql_fetch_assoc($query)){
        $item[]=$row['item'];
        $value[]=$row['value'];
    }
    $query2 =mysql_query("select id,pregunta from cont_preguntas where idplantilla like '".$idplantilla2."'");
    while($row=mysql_fetch_assoc($query2)){
        $idpregunta=$row['id'];
        $pregunta=utf8_decode($row['pregunta']);
    }
    $idgrupo = array();
    $retro = array();
    $query3 =mysql_query("select id,retroalimentacion from cont_grupos where idplantilla like '".$idplantilla2."' and idpregunta like '".$idpregunta."'");
    while($row=mysql_fetch_assoc($query3)){
        $idgrupo[]=$row['id'];
    }
    $idopcion = array();
    $opcion = array();
    $cangr="";
        for($i=0;$i<count($idgrupo);$i++)
        {
            if((count($idgrupo)-1)== $i){
                $cangr.=$idgrupo[$i];
            }else{
                $cangr.=$idgrupo[$i].',';
            }
        }
    $query4 =mysql_query("select id,opcion from cont_opciones where idgrupo in (".$cangr.")");
    while($row=mysql_fetch_assoc($query4)){
        $idopcion[]=$row['id'];
        $opcion[]=utf8_decode($row['opcion']);
    }
    $combine=array_combine($item,$value);
    $l=0;
    $formulario="<form method='post' id='form_resp'> <table>";
    if(count($idopcion)>20){
        for($l; $l<((count($idopcion))); $l+=2){
        $formulario.="
        <tr>
        <td><label><input class='respuestas' name='respuestas[]' type='checkbox' value='".$idopcion[$l]."'/>".$opcion[$l]."</label></td>
        <td><label><input class='respuestas' name='respuestas[]' type='checkbox' value='".$idopcion[$l+1]."'/>".$opcion[$l+1]."</label></td>
        <tr>";
        }
        $formulario.="</table></form>";
    }else{
        for($l; $l<((count($idopcion)/2)); $l++){
        $formulario.="<label><input class='respuestas' name='respuestas' type='checkbox' value='".$idopcion[$l]."'/>".$opcion[$l]."</label></br>";
        }
    }
    
        $_SESSION['color1s']=$combine['color1'];
		$_SESSION['color2s']=$combine['color2'];
		$_SESSION['color3s']=$combine['color3'];
		$titulo=$combine['titulo'];
		$introduccion=$combine['introduccion'];
		$contenido1=$combine['contenido1'];
		$contenido2=$combine['contenido2'];
		$contenido3=$combine['contenido3'];
		$titulo2=$combine['titulo2'];
		$introduccion2=$combine['introduccion2'];
        $titleimg1=$combine['titleimg1'];
        $titleimg2=$combine['titleimg2'];
        $titleimg3=$combine['titleimg3'];
        $img1=$combine['img1'];
        $img2=$combine['img2'];
        $img3=$combine['img3'];   
        $registrousuario="INSERT INTO cont_ingresos (idplantilla, usuario_plataforma, fecha_ingreso) 
        VALUES ('".$idplantilla2."','".$usuarioplat."','".$fechaIngreso."')";  
        mysql_query($registrousuario);   
    ?>
<html>
	<head>
        <style>
            #agregarcontenido{
                display: none;
            }
            .respuestas{
                -webkit-appearance: checkbox !important;
                opacity: 1 !important;
                z-index: 10 !important;
                margin: 9px 0px 0px -20px !important;
            }
        </style>
    
		<title>Plantilla Nro 1</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/jquery-te-1.4.0.css">
        <script src="../../js/jquery-1.11.1.min.js" charset="iso-8859-1"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/bootstrap.js"></script>
        
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
        <link href="css/vcss.php" rel="stylesheet" type="text/css">
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>
		<!-- Header -->
			<section id="header">
				<div class="inner">
					<span class="icon major fa-cloud"></span>
					<h1><?php echo $titulo; ?></h1>
					<ul class="actions">
						<li><a href="#one" class="button scrolly">Continuar</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="main style1">
				<div class="container">
					<div class="row 150%">
						<div class="6u 12u$(medium)">
							<header class="major">
								<h2>Introducción</h2>
							</header>
							<div class="divtext"  ><?php echo $introduccion; ?></div>
						</div>
						<div class="6u$ 12u$(medium) important(medium)">
							<!--<span class="image fit"><img src="images/pic01.jpg" alt="" /></span> -->
                            <span style="overflow: auto;"><?php echo $contenido1; ?></span>
						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="main style2">
				<div class="container">
					<div class="row 150%">
						<div class="6u 12u$(medium)">
							<?php echo $contenido2; ?>
						</div>
						<div class="6u$ 12u$(medium)">
							<?php echo $contenido3; ?>								
						</div>
					</div>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="main style1 special">
				<div class="container">
					<header class="major">
						<h2><?php echo $titulo2; ?></h2>
					</header>
					<p><?php echo $introduccion2;?></p>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<span class="image fit"><img src="<?php echo $img1; ?>" alt="" /></span>
							<h3><?php echo $titleimg1; ?></h3>
							<p>Adipiscing a commodo ante nunc magna lorem et interdum mi ante nunc lobortis non amet vis sed volutpat et nascetur.</p>
					
						</div>
						<div class="4u 12u$(medium)">
							<span class="image fit"><img src="<?php echo $img2; ?>" alt="" /></span>
							<h3><?php echo $titleimg2; ?></h3>
							<p>Adipiscing a commodo ante nunc magna lorem et interdum mi ante nunc lobortis non amet vis sed volutpat et nascetur.</p>
						
						</div>
						<div class="4u$ 12u$(medium)">
							<span class="image fit"><img src="<?php echo $img3; ?>" alt="" /></span>
							<h3><?php echo $titleimg3; ?></h3>
							<p>Adipiscing a commodo ante nunc magna lorem et interdum mi ante nunc lobortis non amet vis sed volutpat et nascetur.</p>
					
						</div>
					</div>
				</div>
			</section>
            
            
            <div id="cdinamico">
                <div class="modal fade" id="cinteractivo" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="width: 60%;">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div id="cdinamic" name="vacio" align="center">
                                <?php echo $pregunta; ?>
                                </div>
                                <div class="checkbox">
                                <?php echo $formulario; ?>
                                <input type="button" id="salir" onclick="enviar_cdinamic()" value="Enviar" />
                                </div>
                                <div id="retroalimentacion" align="center">
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>

	</body>
</html>

<script>
    function vp_ci (){
        var cant_opc= "<?php echo count($idopcion); ?>";
        var ppp="<?php $opcion; ?>";
    $('#cinteractivo').modal({
              show: true,
              backdrop:'static'
            });
    }
    
    
    function enviar_cdinamic(){
        var prueba2=$('.respuestas');
        var concat='';
        var check=[];
        var value=[];
        var user="<?php echo $usuarioplat; ?>";
        var prueba=$('.respuestas').prop("checked");
        
        for(var i = 0; i<="<?php echo count($idopcion); ?>"; i++){
            check[i] = $(prueba2[i]).prop("checked");
            value[i] = $(prueba2[i]).prop("value");
           if($(prueba2[i]).prop("checked")== true){
            concat += $(prueba2[i]).prop("value")+",";
           }
        }
        concat += "'-'";
        var url='retroalimentacion.php';
        $.ajax({
            type: 'POST',
            url: url,
            data: {r_opciones: concat, check: check, value: value, user: user},
            success: function(data){
                $('#retroalimentacion').html(data);
                $('.checkbox').hide();
            }
        });
        }
    
    
    function cerrar_modal(){
            $('#cinteractivo').modal('hide');
        }
</script>
<?php
}
?>