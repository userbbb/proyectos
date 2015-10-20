<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
<script src="../../js/jquery-1.11.1.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap.js"></script>
<script>
    $(document).ready(function(){
        var alto = $(window).resize().height();
        var mar=$(".navbar-nav").css("margin");
        if (mar=='0px'){
            $("#cont").css("height" , (alto-200)+"px");
        }else{
            $("#cont").css("height" , (alto-150)+"px");
        }
    });
    $(window).resize(function() {
        var alto2 = $(this).height();
        var mar=$(".navbar-nav").css("margin");
        if (mar=='0px'){
            $("#cont").css("height" , (alto2-200)+"px");
        }else{
            if ($(".navbar-collapse").hasClass('in')){
                $("#cont").css("height" , (alto2-300)+"px");
            }else{
                $("#cont").css("height" , (alto2-150)+"px");
            }
        }
    });
    function prueba (){
        if ($(".navbar-collapse").hasClass('in')){
            var alto=$(this).height();
            $("#cont").css("height" , (alto-150)+"px");
        }else{
            var alto=$(this).height();
            $("#cont").css("height" , (alto-300)+"px");
        }
    }
</script>
</head>
<body>
<?php
session_start();
require_once("../../includes/connection.php");
include("../../includes/encriptar.php");
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
    if(isset($_POST['enviar']))
    {
        $_SESSION['color1s']=$_POST['color1'];
		$_SESSION['color2s']=$_POST['color2'];
		$_SESSION['color3s']=$_POST['color3'];
		$titulo=$_POST['titulo'];
		$introduccion=$_POST['introduccion'];
		$contenido1=$_POST['contenido1'];
		$contenido2=$_POST['contenido2'];
		$contenido3=$_POST['contenido3'];
		$titulo2=$_POST['titulo2'];
		$introduccion2=$_POST['introduccion2'];
        $titleimg1=$_POST['titleimg1'];
        $titleimg2=$_POST['titleimg2'];
        $titleimg3=$_POST['titleimg3'];
        $img1=$_POST['img1'];
        $img2=$_POST['img2'];
        $img3=$_POST['img3'];
        $url=$_POST['url'];
        $plantilla=$_POST['plantilla'];
        $pregunta=$_POST['pregunta'];
        $grupos=$_POST['nrogrupos'];
        $retro=$_POST['retro'];
        $resp=$_POST['resp'];
        $gruposel=$_POST['grupsel'];
    }
    
    $query2 =mysql_query("select id from cont_user where username like '".$_SESSION["session_username"]."'");
    while($row=mysql_fetch_assoc($query2))
    {
        $iduser=$row['id'];
    }
    $idunico=Encrypter::encrypt($iduser.$titulo.time());
    $registroplantilla="INSERT INTO cont_plantillas (userid, fecha_creacion, plantilla, url, titulo, idunico) 
    VALUES ('".$iduser."','".time()."','".$plantilla."','".$url."','".$titulo."','".$idunico."')";
   
   

    if (mysql_query($registroplantilla) === TRUE)
    {
        $ultimoid=mysql_insert_id();
        $registropreg="INSERT INTO cont_preguntas (idplantilla, pregunta) VALUES (".$ultimoid.", '".utf8_encode($pregunta)."')";
        mysql_query($registropreg);
        $query3 =mysql_query("select id from cont_preguntas where idplantilla like '".$ultimoid."'");
        if($row=mysql_fetch_assoc($query3))
        {
            $idpreg=$row['id'];
        }
        for($i=0; $i<count($grupos); $i++){ 
            $registrogrupos="INSERT INTO cont_grupos (idpregunta, idplantilla, grupo, retroalimentacion) 
            VALUES ('".$idpreg."','".$ultimoid."','".utf8_encode($grupos[$i])."','".utf8_encode($retro[$i])."')";
            mysql_query($registrogrupos); 
        }
        for($k=0;$k<count($resp); $k++){
            $query4 =mysql_query("select id from cont_grupos where idplantilla like '".$ultimoid."' and grupo like '".utf8_encode($gruposel[$k])."'");
            if($row=mysql_fetch_assoc($query4))
            {
                $idgrupo=$row['id'];
            }
            $registroopc="INSERT INTO cont_opciones (idgrupo, opcion) 
            VALUES ('".$idgrupo."','".utf8_encode($resp[$k])."')";
            mysql_query($registroopc);        
        }
        $item = array('color1','color2','color3','titulo','introduccion','contenido1','contenido2','contenido3','titulo2','introduccion2',
                    'titleimg1','img1','titleimg2','img2','titleimg3','img3');
        $values=array($_SESSION['color1s'],$_SESSION['color2s'],$_SESSION['color3s'],$titulo,$introduccion,$contenido1,$contenido2,$contenido3,
                $titulo2,$introduccion2,$titleimg1,$img1,$titleimg2,$img2,$titleimg3,$img3);
        //$combine=array_combine($item,$values);
        $limit=count ($item);
        for($l=0; $l<=$limit-1; $l++){
            $registrovalue="INSERT INTO cont_itemvalue (idplantilla, item, value) VALUES ('".$ultimoid."','".$item[$l]."','".$values[$l]."')";
            mysql_query($registrovalue);
        }
        $link=str_replace("formp.php","index2.php",$url);
        ?>
            <nav id="navbar-example" class="navbar navbar-default navbar-static" role="navigation">
                <div class="navbar-header" style="width: 100%;">
                    <div class="col-md-12 col-xs-11 col-sm-12">
                        <h2 align="center">CONTENIDO DINAMICOS</h2>
                        <h3 align="center">Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h3>
                    </div>
                </div>
            </nav>
            <div id="int" style="height: 300px;">
                <div style="width: 45%; float: left; margin-left: 5%">
                    <p style="margin:5% 5% 5% 5%;">
                        Su contenido ha sido creado satisfactoriamente, el link para poder acceder al contenido creado es:<br />
                        <?php echo "http://".$_SERVER['HTTP_HOST'].$link."?ID=".$idunico; ?>
                    </p>
                </div>
                <div style="width: 45%; float: left; margin-left: 5%;">
                    <iframe style="margin:5% 5% 5% 5%;" width="480" height="250" src="https://www.youtube.com/embed/OPf0YbXqDm0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        
        
 <?php       
    }else {
        echo "Error: " . $registroplantilla . "<br>" . $con->error;
    }
    
  }
?>
</body>
</html>