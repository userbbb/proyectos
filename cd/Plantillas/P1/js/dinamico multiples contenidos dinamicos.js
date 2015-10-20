 var variable2 = 0;
 var variable3 = 0;
 var nrogrupostval;
 function interactivovp(){
             $('#cinteractivoprevio').modal({
              show: true,
              backdrop:'static'
            });
            variable2 = $("#nroopc").val();
            respuesta=$(".resp");
            $('#cdinamic').append("<label>"+$('#pregunta').val()+"</label>");
             for(var l = 1; l<=variable2; l++){
                            $('.checkbox').append(
                            "<label><input class='respuestas' id='respuestas"+l+"' type='checkbox' value='"+$(respuesta[l-1]).val()+"'>"+$(respuesta[l-1]).val()+"</label>");
                        }
            }
 // ------------------------------------------------ Funcion para ejecutar el modal de bootstrap --------------------------------------------------------- 
        function interactivo(){
             $('#cinteractivo').modal({
              show: true,
              backdrop:'static'
            });
            if($('#nrogrupos').val() > 0){
                    $('#nrogruposdiv').hide();
                    $('#grupos_retrodiv').show();
                }else{
                    $('#nrogruposdiv').show();
                    $('#grupos_retrodiv').hide();
                }
            $('#preguntadiv').hide();
            $('#opc_grupodiv').hide();
        }
        
        function cerrar_modal(){
             $('#cinteractivo').modal('hide');
             $('#cinteractivoprevio').modal('hide');
        }
// ------------------------------------------------ Funcion para ocultar el div que pide la pregunta -----------------------------------------------------
        function ocultar_pregunta(){
            if ($('#pregunta').val() != ""){
                if($('#nroopc').val() > 0){
                    $('#preguntadiv').hide();
                    $('#opc_grupodiv').show();
                }else{
                    $('#preguntadiv').hide();
                    $('#nroopcdiv').show();
                }
            }else{
                alert ("El campo de pregunta no puede estar vacio")
            }
        }
// ---------Funcion para ocultar el div que pide la cantidad de grupos que va a registrar y la generación de los campos solicitados -----------------------
        function ocultar_nrogrupos(){
            if ($('#nrogrupos').val() > 0){
                $('#nrogruposdiv').hide();
                $('#grupos_retrodiv').show();
                if ($('#nrogrupos').val() >=0){
                    for(var i = 1; i<=$("#nrogrupos").val(); i++){
                        $("#grupo_retrotable").append(
                        "<tr class='campos'><td><input class='nrogrupost' id='nrogrupost"+i+"' type='text'></td><td><input type='text' id='retro"+i+"'></td></tr>"
                        );
                    }
                
                }
            }else{
                alert ("No puede estar vacio y debe ser un numero mayor a 0");
            }
        }
//  -----------------------------------------------------Funcion que elimina los campos generados --------------------------------------------------------               
        function borrar_grupos_retro(){
            $(".campos").empty();
            $('#grupos_retrodiv').hide();
            $('#nrogruposdiv').show();
        }                
//  --------------------------------------Funcion que oculta el div que pide los datos de grupo y retroalimentacion ----------------------------------------   
        function ocultar_grupos_retro(){
            var ng=0;
            var nr=0;
            for(var i = 1; i<=$("#nrogrupos").val(); i++){
                if($('#nrogrupost'+i).val() != ''){
                    ng = ng + 1;
                }
                if($('#retro'+i).val() != ''){
                    nr = nr + 1;
                }
               
            }
            if ($("#nrogrupos").val()==ng && $("#nrogrupos").val()==nr){
                $('#grupos_retrodiv').hide(); 
                $('#preguntadiv').show();
            }else{
                alert("Ningun campo puede estar vacio");
            }
        }
        
      
// ---------Funcion para ocultar el div que pide la cantidad de grupos que va a registrar y la generación de los campos solicitados -----------------------
        function ocultar_nroopc(){
            if ($('#nroopc').val() > 0){
                $('#nroopcdiv').hide();
                $('#opc_grupodiv').show();
                nrogrupostval=$(".nrogrupost");
                alert ($(nrogrupostval[0]).val());
                if ($('#nroopc').val() >=0){
                for(var i = 1; i<=$("#nroopc").val(); i++){
                    $("#opc_grupotable").append(
                    "<tr class='campos2'><td><input type='text' class='resp' id='nroopcion"+i+"'></td>"+
                    "<td><select name='OS' id='opcgrupos"+i+"'>");
                        for(var l = 1; l<=$("#nrogrupos").val(); l++){
                            $('#opcgrupos'+i).append("<option value='"+l+"'>"+$(nrogrupostval[l-1]).val()+"</option>");
                        }
                         $("#opc_grupotable").append("</select></td></tr>");
                    
                }
            }}else{
                alert ("Debe ser un numero mayor a 0 y no puede estar vacio");
            }
        }
        
//  -----------------------------------------------------Funcion que elimina los campos generados --------------------------------------------------------               
        function borrar_opc_grupo(){
            $(".campos2").empty();
            $('#nroopcdiv').show();
            $('#opc_grupodiv').hide();
        }       
        
//  --------------------------------------Funcion que oculta el div que pide los datos de grupo y retroalimentacion ----------------------------------------   
        function Guardarinteractivo(){
            var no=0;
            var ng=0;
            for(var i = 1; i<=$("#nroopc").val(); i++){
                if($('#nroopcion'+i).val() != ''){
                    no = no + 1;
                }
                if($('#idgrupo'+i).val() != ''){
                    ng = ng + 1;
                }
            }
            if ($("#nroopc").val()==ng && $("#nroopc").val()==no){
                cerrar_modal();
            }else{
                alert("Ningun campo puede estar vacio");
            }
        }
             
             
// ************************************************************************ 2 ****************************************************************************

 // ------------------------------------------------ Funcion para ejecutar el modal de bootstrap --------------------------------------------------------- 
        function interactivo2(){
             $('#cinteractivo2').modal({
              show: true,
              backdrop:'static'
            });
            if($('#nrogrupos2').val() > 0){
                    $('#nrogruposdiv2').hide();
                    $('#grupos_retrodiv2').show();
                }else{
                    $('#nrogruposdiv2').show();
                    $('#grupos_retrodiv2').hide();
                }
            $('#preguntadiv2').hide();
            $('#opc_grupodiv2').hide();
        }
        
        function cerrar_modal2(){
             $('#cinteractivo2').modal('hide');
             $('#cinteractivoprevio2').modal('hide');
        }
// ------------------------------------------------ Funcion para ocultar el div que pide la pregunta -----------------------------------------------------
        function ocultar_pregunta2(){
            if ($('#pregunta2').val() != ""){
                if($('#nroopc2').val() > 0){
                    $('#preguntadiv2').hide();
                    $('#opc_grupodiv2').show();
                }else{
                    $('#preguntadiv2').hide();
                    $('#nroopcdiv2').show();
                }
            }else{
                alert ("El campo de pregunta no puede estar vacio")
            }
        }
// ---------Funcion para ocultar el div que pide la cantidad de grupos que va a registrar y la generación de los campos solicitados -----------------------
        function ocultar_nrogrupos2(){
            if ($('#nrogrupos2').val() > 0){
                $('#nrogruposdiv2').hide();
                $('#grupos_retrodiv2').show();
                if ($('#nrogrupos2').val() >=0){
                    for(var i = 1; i<=$("#nrogrupos2").val(); i++){
                        $("#grupo_retrotable2").append(
                        "<tr class='campos2'><td><input class='nrogrupost2' id='nrogrupost2"+i+"' type='text'></td><td><input type='text' id='retro2"+i+"'></td></tr>"
                        );
                    }
                
                }
            }else{
                alert ("No puede estar vacio y debe ser un numero mayor a 0");
            }
        }
//  -----------------------------------------------------Funcion que elimina los campos generados --------------------------------------------------------               
        function borrar_grupos_retro2(){
            $(".campos2").empty();
            $('#grupos_retrodiv2').hide();
            $('#nrogruposdiv2').show();
        }                
//  --------------------------------------Funcion que oculta el div que pide los datos de grupo y retroalimentacion ----------------------------------------   
        function ocultar_grupos_retro2(){
            var ng=0;
            var nr=0;
            for(var i = 1; i<=$("#nrogrupos2").val(); i++){
                if($('#nrogrupost2'+i).val() != ''){
                    ng = ng + 1;
                }
                if($('#retro2'+i).val() != ''){
                    nr = nr + 1;
                }
               
            }
            if ($("#nrogrupos2").val()==ng && $("#nrogrupos2").val()==nr){
                $('#grupos_retrodiv2').hide(); 
                $('#preguntadiv2').show();
            }else{
                alert("Ningun campo puede estar vacio");
            }
        }
        
      
// ---------Funcion para ocultar el div que pide la cantidad de grupos que va a registrar y la generación de los campos solicitados -----------------------
        function ocultar_nroopc2(){
            if ($('#nroopc2').val() > 0){
                $('#nroopcdiv2').hide();
                $('#opc_grupodiv2').show();
                nrogrupostval=$(".nrogrupost2");
                alert ($(nrogrupostval[0]).val());
                if ($('#nroopc2').val() >=0){
                for(var i = 1; i<=$("#nroopc2").val(); i++){
                    $("#opc_grupotable2").append(
                    "<tr class='campos22'><td><input type='text' class='resp2' id='nroopcion2"+i+"'></td>"+
                    "<td><select name='OS' id='opcgrupos2"+i+"'>");
                        for(var l = 1; l<=$("#nrogrupos2").val(); l++){
                            $('#opcgrupos2'+i).append("<option value='"+l+"'>"+$(nrogrupostval[l-1]).val()+"</option>");
                        }
                         $("#opc_grupotable2").append("</select></td></tr>");
                    
                }
            }}else{
                alert ("Debe ser un numero mayor a 0 y no puede estar vacio");
            }
        }
        
//  -----------------------------------------------------Funcion que elimina los campos generados --------------------------------------------------------               
        function borrar_opc_grupo2(){
            $(".campos22").empty();
            $('#nroopcdiv2').show();
            $('#opc_grupodiv2').hide();
        }       
        
//  --------------------------------------Funcion que oculta el div que pide los datos de grupo y retroalimentacion ----------------------------------------   
        function Guardarinteractivo2(){
            var no=0;
            var ng=0;
            for(var i = 1; i<=$("#nroopc2").val(); i++){
                if($('#nroopcion2'+i).val() != ''){
                    no = no + 1;
                }
                if($('#idgrupo2'+i).val() != ''){
                    ng = ng + 1;
                }
            }
            if ($("#nroopc2").val()==ng && $("#nroopc2").val()==no){
                cerrar_modal2();
            }else{
                alert("Ningun campo puede estar vacio");
            }
        }
                          
// ************************************************************************ 3 ****************************************************************************

 // ------------------------------------------------ Funcion para ejecutar el modal de bootstrap --------------------------------------------------------- 
        function interactivo3(){
             $('#cinteractivo3').modal({
              show: true,
              backdrop:'static'
            });
            if($('#nrogrupos3').val() > 0){
                    $('#nrogruposdiv3').hide();
                    $('#grupos_retrodiv3').show();
                }else{
                    $('#nrogruposdiv3').show();
                    $('#grupos_retrodiv3').hide();
                }
            $('#preguntadiv3').hide();
            $('#opc_grupodiv3').hide();
        }
        
        function cerrar_modal3(){
             $('#cinteractivo3').modal('hide');
             $('#cinteractivoprevio3').modal('hide');
        }
// ------------------------------------------------ Funcion para ocultar el div que pide la pregunta -----------------------------------------------------
        function ocultar_pregunta3(){
            if ($('#pregunta3').val() != ""){
                if($('#nroopc3').val() > 0){
                    $('#preguntadiv3').hide();
                    $('#opc_grupodiv3').show();
                }else{
                    $('#preguntadiv3').hide();
                    $('#nroopcdiv3').show();
                }
            }else{
                alert ("El campo de pregunta no puede estar vacio")
            }
        }
// ---------Funcion para ocultar el div que pide la cantidad de grupos que va a registrar y la generación de los campos solicitados -----------------------
        function ocultar_nrogrupos3(){
            if ($('#nrogrupos3').val() > 0){
                $('#nrogruposdiv3').hide();
                $('#grupos_retrodiv3').show();
                if ($('#nrogrupos3').val() >=0){
                    for(var i = 1; i<=$("#nrogrupos3").val(); i++){
                        $("#grupo_retrotable3").append(
                        "<tr class='campos3'><td><input class='nrogrupost3' id='nrogrupost3"+i+"' type='text'></td><td><input type='text' id='retro3"+i+"'></td></tr>"
                        );
                    }
                
                }
            }else{
                alert ("No puede estar vacio y debe ser un numero mayor a 0");
            }
        }
//  -----------------------------------------------------Funcion que elimina los campos generados --------------------------------------------------------               
        function borrar_grupos_retro3(){
            $(".campos3").empty();
            $('#grupos_retrodiv3').hide();
            $('#nrogruposdiv3').show();
        }                
//  --------------------------------------Funcion que oculta el div que pide los datos de grupo y retroalimentacion ----------------------------------------   
       function ocultar_grupos_retro3(){
            var ng=0;
            var nr=0;
            for(var i = 1; i<=$("#nrogrupos3").val(); i++){
                if($('#nrogrupost3'+i).val() != ''){
                    ng = ng + 1;
                }
                if($('#retro3'+i).val() != ''){
                    nr = nr + 1;
                }
               
            }
            if ($("#nrogrupos3").val()==ng && $("#nrogrupos3").val()==nr){
                $('#grupos_retrodiv3').hide(); 
                $('#preguntadiv3').show();
            }else{
                alert("Ningun campo puede estar vacio");
            }
        }
      
// ---------Funcion para ocultar el div que pide la cantidad de grupos que va a registrar y la generación de los campos solicitados -----------------------
        function ocultar_nroopc3(){
            if ($('#nroopc3').val() > 0){
                $('#nroopcdiv3').hide();
                $('#opc_grupodiv3').show();
                nrogrupostval=$(".nrogrupost3");
                alert ($(nrogrupostval[0]).val());
                if ($('#nroopc3').val() >=0){
                for(var i = 1; i<=$("#nroopc3").val(); i++){
                    $("#opc_grupotable3").append(
                    "<tr class='campos23'><td><input type='text' class='resp3' id='nroopcion3"+i+"'></td>"+
                    "<td><select name='OS' id='opcgrupos3"+i+"'>");
                        for(var l = 1; l<=$("#nrogrupos3").val(); l++){
                            $('#opcgrupos3'+i).append("<option value='"+l+"'>"+$(nrogrupostval[l-1]).val()+"</option>");
                        }
                         $("#opc_grupotable3").append("</select></td></tr>");
                    
                }
            }}else{
                alert ("Debe ser un numero mayor a 0 y no puede estar vacio");
            }
        }
        
//  -----------------------------------------------------Funcion que elimina los campos generados --------------------------------------------------------               
        function borrar_opc_grupo3(){
            $(".campos23").empty();
            $('#nroopcdiv3').show();
            $('#opc_grupodiv3').hide();
        }       
        
//  --------------------------------------Funcion que oculta el div que pide los datos de grupo y retroalimentacion ----------------------------------------   
        function Guardarinteractivo3(){
            var no=0;
            var ng=0;
            for(var i = 1; i<=$("#nroopc3").val(); i++){
                if($('#nroopcion3'+i).val() != ''){
                    no = no + 1;
                }
                if($('#idgrupo3'+i).val() != ''){
                    ng = ng + 1;
                }
            }
            if ($("#nroopc3").val()==ng && $("#nroopc3").val()==no){
                cerrar_modal3();
            }else{
                alert("Ningun campo puede estar vacio");
            }
        }