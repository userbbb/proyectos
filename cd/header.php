<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<?php
 session_start();
 require_once("includes/connection.php");
    if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
    } else {
        $userid= $_SESSION["session_userid"];
        $query =mysql_query("select id,userid,plantilla,url,titulo,idunico from cont_plantillas where userid like '".$userid."'");?>
        <form id="mis_plantillas" name="mis_plantillas"  action="" method="post" enctype="multipart/form-data">        
        <?php
        while($row=mysql_fetch_assoc($query))
        {
            $idplantilla=$row['id'];
            echo $idplantilla;
            echo '<br>';
            $iduser=$row['userid'];
            echo $iduser;
            echo '<br>';
            $plantilla=$row['plantilla'];
            echo $plantilla;
            echo '<br>';
            $url=str_replace("/cdimanico/cd/","",$row['url']);?>
            <input type="hidden" value="edit" name="edicion" id="edicion" />
            <input type="button" name="enviar" value="Editar" onclick="editar()" />
            <?php
            echo $url;
            echo '<br>';
            $titulo=$row['titulo'];
            echo $titulo;
            echo '<br>';
            $idunico=$row['idunico'];
            echo $idunico;
            echo '<br>';
        }
        ?>
        </form>
<!-- Large modal -->
<button type="button" onclick="mis_plantillas2()">Launch modal</button>

<div class="modal fade" id="nopresentado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Ya se encuentran habilitadas sus primeras pruebas!</h3>
                    <a type="button" href="" class="btn btn-danger" ><strong>Ir a las pruebas</strong></a>
                  </div>
                </div>
              </div>
            </div>
<script>
        
        function editar(){
            $('#mis_plantillas').attr('action', 'page1');
        }

        function mis_plantillas2(){
             $('#nopresentado').modal({
              show: true
            });
        }
    </script>
<?php
    }
?>
