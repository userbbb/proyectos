<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="css/custom.css" />
<script src="js/modernizr.custom.17475.js"></script>
<script type="text/javascript" src="js/jquerypp.custom.js"></script>
<script type="text/javascript" src="js/jquery.elastislide.js"></script>
<style>
    #cont{
        width: 100%;
        margin: 0 auto;
    }
    .seccion{
        width: 80%;
        margin: 0 auto;
    }
    
</style>
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
<body  style="overflow-y:hidden">
<?php
 session_start();
 require_once("includes/connection.php");
 if(!isset($_SESSION["session_username"])) {
    header("location:login.php");
 } else {
    $query1 =mysql_query("select id from cont_user where username like '".$_SESSION["session_username"]."'");
    while($row=mysql_fetch_assoc($query1))
    {
        $iduser=$row['id'];
    }
    $query2 =mysql_query("SELECT cp.id,cp.userid,cp.fecha_creacion,cp.plantilla,cp.url,cp.titulo,cp.idunico from cont_plantillas cp
                            where cp.userid like ");
    while($row=mysql_fetch_assoc($query2))
    {
        $iduser=$row['id'];
    }
    echo $iduser;
    ?>
    <nav id="navbar-example" class="navbar navbar-default navbar-static" role="navigation" style="margin-bottom: 0px !important;">
            <div class="navbar-header" style="width: 100%;">
                <button id="bt" onclick="prueba()" class="navbar-toggle" style="position: absolute; right: -5px;" type="button" data-toggle="collapse" data-target=".bs-js-navbar-scrollspy">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="col-md-12 col-xs-11 col-sm-12">
                    <h2 align="center">CONTENIDO DINAMICOS</h2>
                    <h3 align="center">Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h3>
                    <p align="center"><a href="logout.php">Finalice</a> sesión aquí!</p>
                </div>
            </div>
            <div class="collapse navbar-collapse bs-js-navbar-scrollspy">
                <ul class="nav navbar-nav" style="float: right !important;">
                    <li><a href="#int">Introducción</a></li>
                    <li><a href="#cp">Crear Plantilla</a></li>
                    <li><a href="#mp">Mis Plantillas</a></li>
                </ul>
            </div>
      </nav>
    <div id="cont" data-spy="scroll" data-target="#navbar-example" data-offset="0" style="height:auto;overflow:auto; position: relative;">
   <div id="int" style="height: 300px;">
        <div style="width: 40%; float: left; margin-left: 10%">
            <p style="margin:5% 5% 5% 5%;">iOS is a mobile operating system developed and distributed by Apple 
            Inc. Originally released in 2007 for the iPhone, iPod Touch, and Apple 
            TV. iOS is derived from OS X, with which it shares the Darwin 
            foundation. iOS is Apple's mobile version of the OS X operating system 
            used on Apple computers.
            </p>
        </div>
        <div style="width: 40%; float: left; margin-left: 0%;">
            <iframe style="margin:5% 5% 5% 5%;" width="480" height="250" src="http://spira.co/presentacion/videos/insES.mp4" frameborder="0" allowfullscreen></iframe>
        </div>
   </div>
   
 <!----------------------------------------------------------Crear Contenidos--------------------------------------------------------------------->    
   <div id="cp" class="seccion">
        <div style="margin-top: 5%; margin-bottom: 5%;">
        <h2 align="center">Plantillas Disponibles</h2>
        	<!-- Elastislide Carousel -->
			<ul id="carousel" class="elastislide-list">
				<li><a href="Plantillas/P1/formp.php"><img src="images/small/1.jpg" alt="image01" /></a></li>
				
			</ul>
            <!-- End Elastislide Carousel -->
        </div>
   </div>
 <!----------------------------------------------------------Mis Contenidos------------------------------------------------------------------------->
   
   <div id="mp" class="seccion">
        <div style="margin-top: 5%; margin-bottom: 5%;">
            <h2 align="center">Mis Plantillas</h2>
        	<!-- Elastislide Carousel -->
			<ul id="carousel2" class="elastislide-list">
				<li><a href="#"><img src="images/small/1.jpg" alt="image01" /></a></li>
				<li><a href="#"><img src="images/small/2.jpg" alt="image02" /></a></li>
				<li><a href="#"><img src="images/small/3.jpg" alt="image03" /></a></li>
				<li><a href="#"><img src="images/small/4.jpg" alt="image04" /></a></li>
				<li><a href="#"><img src="images/small/5.jpg" alt="image05" /></a></li>
				<li><a href="#"><img src="images/small/6.jpg" alt="image06" /></a></li>
				<li><a href="#"><img src="images/small/7.jpg" alt="image07" /></a></li>
				<li><a href="#"><img src="images/small/8.jpg" alt="image08" /></a></li>
				<li><a href="#"><img src="images/small/9.jpg" alt="image09" /></a></li>
				<li><a href="#"><img src="images/small/10.jpg" alt="image10" /></a></li>
				<li><a href="#"><img src="images/small/11.jpg" alt="image11" /></a></li>
				<li><a href="#"><img src="images/small/12.jpg" alt="image12" /></a></li>
				<li><a href="#"><img src="images/small/13.jpg" alt="image13" /></a></li>
				<li><a href="#"><img src="images/small/14.jpg" alt="image14" /></a></li>
				<li><a href="#"><img src="images/small/15.jpg" alt="image15" /></a></li>
				<li><a href="#"><img src="images/small/16.jpg" alt="image16" /></a></li>
				<li><a href="#"><img src="images/small/17.jpg" alt="image17" /></a></li>
				<li><a href="#"><img src="images/small/18.jpg" alt="image18" /></a></li>
				<li><a href="#"><img src="images/small/19.jpg" alt="image19" /></a></li>
				<li><a href="#"><img src="images/small/20.jpg" alt="image20" /></a></li>
			</ul>
            <!-- End Elastislide Carousel -->
        </div>
    </div>
    <?php
 }

?>
<script type="text/javascript">
			
			$( '#carousel' ).elastislide();
            $( '#carousel2' ).elastislide();
			
		</script>
</body>
</html>