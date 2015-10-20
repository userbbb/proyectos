 var variable2 = 0;
 var variable3 = 0;
 var nrogrupostval;
 function interactivovp1(){
             $('#cinteractivoprevio').modal({
              show: true,
              backdrop:'static'
            });
            variable2 = $("#nroopc").val();
            respuesta=$(".resp");
            $('#cdinamic').append("<label>"+$('#pregunta').val()+"</label>");
             for(var l = 1; l<=variable2; l++){
                            $('.checkbox').append(
                            "<label><input class='respuestas' id='respuestas"+l+"' type='checkbox' value='"+
                            $(respuesta[l-1]).val()+"'>"+$(respuesta[l-1]).val()+"</label>");
                        }
            }
 
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
                            "<label><input class='respuestas' id='respuestas"+l+"' type='checkbox' value='"+
                            $(respuesta[l-1]).val()+"'>"+$(respuesta[l-1]).val()+"</label>");
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
                        "<tr class='campos'><td><input name='nrogrupos[]' class='nrogrupost' id='nrogrupost"+i+"' type='text'></td><td><input type='text' name='retro[]' id='retro"+
                        i+"'></td></tr>"
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
                //alert ($(nrogrupostval[0]).val());
                if ($('#nroopc').val() >=0){
                for(var i = 1; i<=$("#nroopc").val(); i++){
                    $("#opc_grupotable").append(
                    "<tr class='campos2'><td><input type='text' name='resp[]' class='resp' id='nroopcion"+i+"'></td>"+
                    "<td><select name='grupsel[]' id='opcgrupos"+i+"'>");
                        for(var l = 1; l<=$("#nrogrupos").val(); l++){
                            $('#opcgrupos'+i).append("<option value='"+$(nrogrupostval[l-1]).val()+"'>"+$(nrogrupostval[l-1]).val()+"</option>");
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
                var nn=$('#sele').val();
                var topc = $("#nroopc").val();
                //$('#'+nn+'').children('textarea[name="introduccion"]').html('kjlsjdñfklsdfasdf');
                //alert (nn);
                cerrar_modal();
            }else{
                alert("Ningun campo puede estar vacio");
            }
        }
             
             
