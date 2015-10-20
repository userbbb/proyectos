<!doctype html>
<html>
<head>
    <?php
    //------------------------------------------------------------Valida que el usuario este logueado----------------------------------------------
        session_start();
        if(!isset($_SESSION["session_username"])) {
    	header("location:../../login.php");
        } else {
        $url=$_SERVER["REQUEST_URI"];
     ?>
    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link href="css/vcss.php" rel="stylesheet" type="text/css">
    
    <script src="../../js/jquery-1.11.1.min.js" charset="iso-8859-1"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="js/jquery.scrolly.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/init.js"></script>
    <link type="text/css" rel="stylesheet" href="css/jquery-te-1.4.0.css">
    <script type="text/javascript" src="js/jquery-te-1.4.0.min.js" charset="iso-8859-1"></script>
    <script src="js/ediscript.js"></script>
    <script src="js/dinamico.js"></script>
    
    <meta charset="iso-8859-1">
    <title>Editar Formulario</title>
</head>


<body>
<!------------------------------------------------------------div Principal de la pagina---------------------------------------------------->
    <div id="contenedor">
<!------------------------------------------------------------div del editor de la platilla------------------------------------------------->
        <div id="editor">
            <form name="valores"  action="generar.php" method="post" enctype="multipart/form-data">
                <div class="accordion">
                    <div class="accordion-section">
                        <a class="accordion-section-title" href="#seccion1">Colores banner - Titulo</a>
                        <div id="seccion1" class="accordion-section-content">
                            <input type="hidden" id="plantilla" name="plantilla" value="plantilla1"/>
                            <input type="hidden" id="url" name="url" value="<?php echo $url; ?>"/>
                        	Selecciona un color1: <input id="color1" name="color1" type="color" value="#f3f3f3"/>
                            </br>
                            Selecciona un color2: <input id="color2" name="color2" type="color" value="#f3f3f3"/>
                            </br>
                            Selecciona un color3: <input id="color3" name="color3" type="color" value="#f3f3f3"/>
                            </br>
                            Titulo: <input id="titulo" name="titulo" rows="10" cols="50" />
                            </br>
                        </div>
                    </div>
                </div>
                <div class="accordion">
                    <div class="accordion-section">
                        <a class="accordion-section-title" href="#seccion2">Introducción - Contenido</a>
                        <div id="seccion2" class="accordion-section-content">
                            <input class="cd1" type="button" value="Prueba" onclick="interactivo('htmlintroduccion',1)" data-btn=1/>
                            <div id="htmlintroduccion">Introducción: <textarea id="introduccion" name="introduccion" class="jqte-test" rows="10" cols="50" ></textarea></div>
                            </br>
                            <input class="cd1" type="button" value="Prueba" onclick="interactivo('htmlcontenido1',2)" data-btn=2/>
                            <div id="htmlcontenido1">Contenido1: <textarea id="contenido1" name="contenido1" class="jqte-test" rows="10" cols="50" ></textarea></div>
                            </br>
                        </div>
                    </div>
                </div>
                <div class="accordion">
                    <div class="accordion-section">
                        <a class="accordion-section-title" href="#seccion3">Contenidos</a>
                        <div id="seccion3" class="accordion-section-content">
                            <input class="cd1" type="button" value="Prueba" onclick="prueba('htmlcontenido2')" />
                            <div id="htmlcontenido2">Contenido2: <textarea id="contenido2" name="contenido2" class="jqte-test" rows="10" cols="50" ></textarea></div>
                            </br>
                            <input class="cd1" type="button" value="Prueba" onclick="prueba('htmlcontenido3')" />
                            <div id="htmlcontenido3">Contenido3: <textarea id="contenido3" name="contenido3" class="jqte-test" rows="10" cols="50" ></textarea></div>
                            </br>
                        </div>
                    </div>
                </div>
                <div class="accordion">
                    <div class="accordion-section">
                        <a class="accordion-section-title" href="#seccion4">Subtitulo - Introducción 2</a>
                        <div id="seccion4" class="accordion-section-content">
                            Titulo2: <textarea name="titulo2" class="jqte-test" rows="10" cols="50" ></textarea>
                            </br>
                            <input class="cd1" type="button" value="Prueba" onclick="prueba('htmlintroduccion2')" />
                            <div id="htmlintroduccion2">Introduccion2: <textarea name="introduccion2" class="jqte-test" rows="10" cols="50" ></textarea></div>
                            </br>
                        </div>
                    </div>
                </div>
                <div class="accordion">
                    <div class="accordion-section">
                        <a class="accordion-section-title" href="#seccion5">Imagenes</a>
                        <div id="seccion5" class="accordion-section-content">
                            Titulo1: <input id="titleimg1" name="titleimg1" rows="10" cols="50" />
                            </br>
                            imagen1: <input id="img1" name="img1" rows="10" cols="50" />
                            </br>
                            Titulo2: <input id="titleimg2" name="titleimg2" rows="10" cols="50" />
                            </br>
                            imagen2: <input id="img2" name="img2" rows="10" cols="50" />
                            </br>
                            Titulo3: <input id="titleimg3" name="titleimg3" rows="10" cols="50" />
                            </br>
                            imagen3: <input id="img3" name="img3" rows="10" cols="50" />
                            </br>
                        </div>
                    </div>
                </div>
                <input type="submit" name="enviar" value="enviar">    
            </form>
        </div>
        <div id="vg">
            <input id="btn_vprevia" type="button" name="vprevia" value="Vista Previa" onclick="vista_previa()">
        </div>
        <div id="vista_previa">
            <div id="imgprevia">
                <img class="imgvp" src="images/plantilla1.png"/>
                <img class="imgvp" src="images/plantilla2.png"/>
                <img class="imgvp" src="images/plantilla3.png"/>
            </div>
            <div id="vistapre" style="display: none; margin-top: 40px;">
                <link href="css/vcss.php" rel="stylesheet" type="text/css">
                <noscript>
        			<link rel="stylesheet" href="css/skel.css" />
        			<link rel="stylesheet" href="css/style.css" />
        			<link rel="stylesheet" href="css/style-xlarge.css" />
        		</noscript>
                <section id="header">
        				<div class="inner">
        					<span class="icon major fa-cloud"></span>
        					<h1 id="titulov">prueba</h1>
        					<ul class="actions">
        						<li><a href="#one" class="button scrolly">Continuar</a></li>
        					</ul>
        				</div>
        			</section>
                <section id="one" class="main style1">
        				<div class="container">
        					<div class="row 150%">
        						<div class="6u 12u$(medium)">
        							<header class="major">
        								<h2>Introducción</h2>
        							</header>
                                    <div id="introduccionv" class="divtext"></div>
        						</div>
        						<div class="6u$ 12u$(medium) important(medium)">
        							<!--<span class="image fit"><img src="images/pic01.jpg" alt="" /></span> -->
                                    <span id="contenido1v" class="divtext"></span>
        						</div>
        					</div>
        				</div>
        		</section>
                <section id="two" class="main style2">
    				<div class="container">
    					<div class="row 150%">
    						<div class="6u 12u$(medium)">
    							<div id="contenido2v" class="divtext">contenido2</div>
    						</div>
    						<div class="6u$ 12u$(medium)">
    							<div id="contenido3v" class="divtext">contenido3</div>							
    						</div>
                        </div>
    				</div>
    			</section>
                <section id="three" class="main style1 special">
    				<div class="container">
    					<header class="major">
    						<h2>subtitulo</h2>
    					</header>
    					<p>introduccion2</p>
    					<div class="row 150%">
    					
                        <div class="row 150%">
    						<div class="4u 12u$(medium)">
    							<span class="image fit"><img id="img1v" src="" alt="" /></span>
    							<h3 id="titleimg1v"></h3>
    							<p>Adipiscing a commodo ante nunc magna lorem et interdum mi ante nunc lobortis non amet vis sed volutpat et nascetur.</p>
    						</div>
    						<div class="4u 12u$(medium)">
    							<span class="image fit"><img id="img2v" src="" alt="" /></span>
    							<h3 id="titleimg2v"></h3>
    							<p>Adipiscing a commodo ante nunc magna lorem et interdum mi ante nunc lobortis non amet vis sed volutpat et nascetur.</p>
    						</div>
    						<div class="4u$ 12u$(medium)">
    							<span class="image fit"><img id="img3v" src="" alt="" /></span>
    							<h3 id="titleimg3v"></h3>
    							<p>Adipiscing a commodo ante nunc magna lorem et interdum mi ante nunc lobortis non amet vis sed volutpat et nascetur.</p>
    						</div>
    					</div>
    				</div>
                    </div>
    			</section>
            </div>
        </div>
    </div>
    
<!--------------------------------------------------------------Contenido dinamico---------------------------------------------------------------------->    
    <div class="modal fade" id="cinteractivo" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
<!---------------------------------------------------------  Pregunta contenido ------------------------------------------------------------------------->
                    <div id="preguntadiv" style="display: none;">
                        Digite la pregunta:<input type="text" id="pregunta" />
                        <input type="button" id="ocpregunta" onclick="ocultar_pregunta()" value="Siguiente" />
                        <input type="button" id="salir" onclick="cerrar_modal()" value="Cerrar" />
                    </div>
<!--------------------------------------------------------------  Grupos       ------------------------------------------------------------------------->
                    <div id="nrogruposdiv" style="display: block;">
                        Cuantos Grupos va crear:<input type="number" id="nrogrupos" />
                        <input type="button" id="ocnrogrupos" onclick="ocultar_nrogrupos()" value="Siguiente" />
                    </div>
<!-----------------------------------------------------retroalimentacion y grupos------------------------------------------------------------------------>
                    <div id="grupos_retrodiv" style="display: none;">
                        <table id="grupo_retrotable">
                            <tr>   
                                <td>Grupo</td>
                                <td>Retroalimentación</td>
                            </tr>
                        </table>
                        <input type="button" id="ocgrupos_retro_borrar" onclick="borrar_grupos_retro()" value="Borrar campos" />
                        <input type="button" id="ocgrupos_retro" onclick="ocultar_grupos_retro()" value="Siguiente" />
                    </div>
<!-----------------------------------------------------  cantidad de opciones   ------------------------------------------------------------------------>
                    <div id="nroopcdiv" style="display: none;">
                        Cuantas opciones va crear:<input type="number" id="nroopc" />
                        <input type="button" id="ocnroopc" onclick="ocultar_nroopc()" value="Siguiente" />
                    </div>
<!-----------------------------------------------------  Opciones y grupo   ------------------------------------------------------------------------>     
                    <div id="opc_grupodiv" style="display: none;">
                        <table id="opc_grupotable">
                            <tr>   
                                <td>Opción</td>
                                <td>Grupo</td>
                            </tr>
                        </table>
                        <input type="button" id="ocgrupos_retro_borrar" onclick="borrar_opc_grupo()" value="Borrar campos" />
                        <input type="button" id="ocgrupos_retro" onclick="Guardarinteractivo()" value="Guardar" />
                        <input type="button" id="salir" onclick="cerrar_modal()" value="Cerrar" />
                    </div>               
                  </div>
                </div>
              </div>
</div>
<script>
    function vista_previa(){
        if($("#btn_vprevia").val() == "Vista Previa"){
            $("#editor").css({ display: "none"});
            $("#vistapre").css({ display: "block"});
            $("#imgprevia").css({ display: "none"});
            $("#contenedor").css({width: "100%", margin: "55px auto"});           
            $("#vista_previa").css({"margin-left": "0px", width:"100%", "margin-top": "-39px"});
            $("#header").css({"background-image": 'url("css/images/overlay2.png"), url("css/images/overlay3.svg"), linear-gradient(45deg,'+$("#color1").val()+','+$("#color2").val()+','+$("#color3").val()+')' });
            $("#btn_vprevia").val("Continuar la edición");
        }else{
            $("#contenedor").css({width: "90%", margin: "70px auto"});
            $("#vista_previa").css({"margin-left": "10%", width:"40%", "margin-top":"0px"});
            $("#vistapre").css({ display: "none"});
            $("#imgprevia").css({ display: "block"});
            $("#editor").css({ display: "block"});
            $("#btn_vprevia").val("Vista Previa");
        }
        var titulo = $("#titulo").val();
        var introduccion= document.getElementById("introduccion");
        var contenido1= document.getElementById("contenido1");
        var contenido2= document.getElementById("contenido2");
        var contenido3= document.getElementById("contenido3");
        var img1= document.getElementById("img1");
        var img2= document.getElementById("img2");
        var img3= document.getElementById("img3");
        var titleimg1= document.getElementById("titleimg1");
        var titleimg2= document.getElementById("titleimg2");
        var titleimg3= document.getElementById("titleimg3");
        $("#titulov").html(titulo);
        $("#introduccionv").html(introduccion.value);
        $("#contenido1v").html(contenido1.value);
        $("#contenido2v").html(contenido2.value);
        $("#contenido3v").html(contenido3.value);
        $("#titleimg1v").html(titleimg1.value);
        $("#titleimg2v").html(titleimg2.value);
        $("#titleimg3v").html(titleimg3.value);
        document.getElementById("img1v").src=img1.value;
        document.getElementById("img2v").src=img2.value;
        document.getElementById("img3v").src=img3.value;
    }
    
     function prueba(iddiv){
        alert (iddiv);
        $('#'+iddiv+'').hide();
    }
    
     
	$('.jqte-test').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
</script>
</body>
<?php } ?>
</html>
