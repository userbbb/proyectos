<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<style>
    .carousel-inner .active.left { left: -33%; }
    .carousel-inner .next        { left:  33%; }
    .carousel-inner .prev        { left: -33%; }
    .carousel-control.left,.carousel-control.right {background-image:none !important;}
    
    #cont{
        width: 100%;
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
        
        $('#myCarousel').carousel({
          interval: 1000000
        })
        
        $('.carousel .item').each(function(){
          var next = $(this).next();
          if (!next.length) {
            next = $(this).siblings(':first');
          }
          next.children(':first-child').clone().appendTo($(this));
          
          if (next.next().length>0) {
            next.next().children(':first-child').clone().appendTo($(this));
          }
          else {
          	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
          }
        });
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
                    <li><a href="#cp">Crear Planttilla</a></li>
                    <li><a href="#mp">Mis Planttillas</a></li>
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
 <!----- agregar contenido------otro comentario--->
 <!----------------------------------------------------------Crear Contenidos--------------------------------------------------------------------->    
   <div id="cp" style="height: 300px;">
   
   
            <div class="col-md-7">
            <div class="carousel slide" id="myCarousel">
              <div class="carousel-inner">
                <div class="item active">
                  <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/bbbbbb/fff&amp;text=1" class="img-responsive"></a></div>
                </div>
                <div class="item">
                  <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/CCCCCC&amp;text=2" class="img-responsive"></a></div>
                </div>
                <div class="item">
                  <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/eeeeee&amp;text=3" class="img-responsive"></a></div>
                </div>
                <div class="item">
                  <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/f4f4f4&amp;text=4" class="img-responsive"></a></div>
                </div>
                <div class="item">
                  <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/fcfcfc/333&amp;text=5" class="img-responsive"></a></div>
                </div>
                <div class="item">
                  <div class="col-md-4"><a href="#"><img src="http://placehold.it/500/f477f4/fff&amp;text=6" class="img-responsive"></a></div>
                </div>
              </div>
              <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
            </div>
    
        
   </div>
 <!----------------------------------------------------------Mis Contenidos------------------------------------------------------------------------->
   
   <div id="mp" style="height: 300px;">jMeter
    <p>jMeter is an Open Source testing software. It is 100% pure Java 
      application for load and performance testing.
    </p>
   </div>
</div>
    <?php
 }

?>
</body>
</html>