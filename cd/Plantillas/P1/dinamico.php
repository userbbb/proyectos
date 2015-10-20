<!doctype html>
<html>
<head>
<style>
    .respuestas{
        -webkit-appearance: checkbox !important;
        opacity: 1 !important;
        z-index: 10 !important;
        margin: 9px 0px 0px -20px !important;
    }
</style>
<?php
    session_start();
    if(!isset($_SESSION["session_username"])) {
	header("location:../../login.php");
    } else {
 ?>
 <script src="js/dinamico.js"></script>
<link rel="stylesheet" href="css/estilo.css" />
<link href="css/vcss.php" rel="stylesheet" type="text/css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="../../js/jquery-1.11.1.min.js" charset="iso-8859-1"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap.js"></script>
<script src="js/jquery.scrolly.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/init.js"></script>
<link type="text/css" rel="stylesheet" href="css/jquery-te-1.4.0.css">
<script src="js/ediscript.js"></script>
<meta charset="iso-8859-1"/>
<title>Editar Formulario</title>
</head>


<body>
<button id="cont_int" type="button" onclick="interactivo()" >Contenido Interactivo</button>

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



<!--************************************************************************2*****************************************************************************-->

<button id="cont_int" type="button" onclick="interactivo2()" >Contenido Interactivo</button>

<div class="modal fade" id="cinteractivo2" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
<!---------------------------------------------------------  Pregunta contenido ------------------------------------------------------------------------->
                    <div id="preguntadiv2" style="display: none;">
                        Digite la pregunta:<input type="text" id="pregunta2" />
                        <input type="button" id="ocpregunta2" onclick="ocultar_pregunta2()" value="Siguiente" />
                        <input type="button" id="salir2" onclick="cerrar_modal2()" value="Cerrar" />
                    </div>
<!--------------------------------------------------------------  Grupos       ------------------------------------------------------------------------->
                    <div id="nrogruposdiv2" style="display: block;">
                        Cuantos Grupos va crear:<input type="number" id="nrogrupos2" />
                        <input type="button" id="ocnrogrupos2" onclick="ocultar_nrogrupos2()" value="Siguiente" />
                    </div>
<!-----------------------------------------------------retroalimentacion y grupos------------------------------------------------------------------------>
                    <div id="grupos_retrodiv2" style="display: none;">
                        <table id="grupo_retrotable2">
                            <tr>   
                                <td>Grupo</td>
                                <td>Retroalimentación</td>
                            </tr>
                        </table>
                        <input type="button" id="ocgrupos_retro_borrar2" onclick="borrar_grupos_retro2()" value="Borrar campos" />
                        <input type="button" id="ocgrupos_retro2" onclick="ocultar_grupos_retro2()" value="Siguiente" />
                    </div>
<!-----------------------------------------------------  cantidad de opciones   ------------------------------------------------------------------------>
                    <div id="nroopcdiv2" style="display: none;">
                        Cuantas opciones va crear:<input type="number" id="nroopc2" />
                        <input type="button" id="ocnroopc2" onclick="ocultar_nroopc2()" value="Siguiente" />
                    </div>
<!-----------------------------------------------------  Opciones y grupo   ------------------------------------------------------------------------>     
                    <div id="opc_grupodiv2" style="display: none;">
                        <table id="opc_grupotable2">
                            <tr>   
                                <td>Opción</td>
                                <td>Grupo</td>
                            </tr>
                        </table>
                        <input type="button" id="ocgrupos_retro_borrar2" onclick="borrar_opc_grupo2()" value="Borrar campos" />
                        <input type="button" id="ocgrupos_retro2" onclick="Guardarinteractivo2()" value="Guardar" />
                        <input type="button" id="salir2" onclick="cerrar_modal2()" value="Cerrar" />
                    </div>               
                  </div>
                </div>
              </div>
</div>


<!--************************************************************************3*****************************************************************************-->

<button id="cont_int" type="button" onclick="interactivo3()" >Contenido Interactivo</button>

<div class="modal fade" id="cinteractivo3" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
<!---------------------------------------------------------  Pregunta contenido ------------------------------------------------------------------------->
                    <div id="preguntadiv3" style="display: none;">
                        Digite la pregunta:<input type="text" id="pregunta3" />
                        <input type="button" id="ocpregunta3" onclick="ocultar_pregunta3()" value="Siguiente" />
                        <input type="button" id="salir3" onclick="cerrar_modal3()" value="Cerrar" />
                    </div>
<!--------------------------------------------------------------  Grupos       ------------------------------------------------------------------------->
                    <div id="nrogruposdiv3" style="display: block;">
                        Cuantos Grupos va crear:<input type="number" id="nrogrupos3" />
                        <input type="button" id="ocnrogrupos3" onclick="ocultar_nrogrupos3()" value="Siguiente" />
                    </div>
<!-----------------------------------------------------retroalimentacion y grupos------------------------------------------------------------------------>
                    <div id="grupos_retrodiv3" style="display: none;">
                        <table id="grupo_retrotable3">
                            <tr>   
                                <td>Grupo</td>
                                <td>Retroalimentación</td>
                            </tr>
                        </table>
                        <input type="button" id="ocgrupos_retro_borrar3" onclick="borrar_grupos_retro3()" value="Borrar campos" />
                        <input type="button" id="ocgrupos_retro3" onclick="ocultar_grupos_retro3()" value="Siguiente" />
                    </div>
<!-----------------------------------------------------  cantidad de opciones   ------------------------------------------------------------------------>
                    <div id="nroopcdiv3" style="display: none;">
                        Cuantas opciones va crear:<input type="number" id="nroopc3" />
                        <input type="button" id="ocnroopc3" onclick="ocultar_nroopc3()" value="Siguiente" />
                    </div>
<!-----------------------------------------------------  Opciones y grupo   ------------------------------------------------------------------------>     
                    <div id="opc_grupodiv3" style="display: none;">
                        <table id="opc_grupotable3">
                            <tr>   
                                <td>Opción</td>
                                <td>Grupo</td>
                            </tr>
                        </table>
                        <input type="button" id="ocgrupos_retro_borrar3" onclick="borrar_opc_grupo3()" value="Borrar campos" />
                        <input type="button" id="ocgrupos_retro3" onclick="Guardarinteractivo3()" value="Guardar" />
                        <input type="button" id="salir3" onclick="cerrar_modal3()" value="Cerrar" />
                    </div>               
                  </div>
                </div>
              </div>
</div>


<div id="cdinamicoprevia">
    <button id="opciones" type="button" onclick="interactivovp()" >Contestar</button>
    <div class="modal fade" id="cinteractivoprevio" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="cdinamic">
                    </div>
                    <div class="checkbox">
                    </div>
                    <input type="button" id="salir" onclick="cerrar_modal()" value="Cerrar" />
                </div>
            </div>
        </div>   
    </div>
</div>




</body>
<?php } ?>
</html>