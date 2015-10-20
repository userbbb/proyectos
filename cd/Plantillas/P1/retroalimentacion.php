<?php
    require_once("../../includes/connection.php");
    $concat=$_POST['r_opciones'];
    $check=$_POST['check'];
    $value=$_POST['value'];
    $user_plat=$_POST['user'];
    
    for($i = 0; $i<count($value); $i++){
        $registros="INSERT INTO cont_registros (usuario_plataforma, idopcion, respuesta) VALUES ('".$user_plat."',".$value[$i].",'".$check[$i]."')";
        mysql_query($registros);
    }
    $query =mysql_query("SELECT idgrupo,count(idgrupo) as conteo, cg.retroalimentacion
            FROM
            cont_opciones co left join cont_grupos cg on co.idgrupo=cg.id
            where co.id in (".$concat.")
            GROUP BY co.idgrupo
            order by count(idgrupo) desc
            limit 1");
    while($row=mysql_fetch_assoc($query))
        {
            $max=$row['conteo'];
        }
    $query2 =mysql_query("SELECT idgrupo,count(idgrupo) as conteo, cg.retroalimentacion
            FROM
            cont_opciones co left join cont_grupos cg on co.idgrupo=cg.id
            where co.id in (".$concat.")
            GROUP BY co.idgrupo
            order by count(idgrupo) desc");
    while($row=mysql_fetch_assoc($query2))
        {
            if($row['conteo']==$max){
                echo $row['retroalimentacion']."</br>";
            }
        }
    echo "<input type='button' id='salir' onclick='cerrar_modal()' value='Cerrar' />";


?>