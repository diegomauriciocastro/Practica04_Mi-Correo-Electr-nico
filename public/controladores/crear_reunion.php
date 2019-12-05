<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Crear Reunion</title> 
        <style type="text/css" rel="stylesheet">
         
            .error{ 
                color: red; } 
        </style> 
    </head> 
    
    <body> 
        <?php 
                //incluir conexión a la base de datos 

                include '../../config/conexionBD.php';

                $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null; 
                $hora = isset($_POST["hora"]) ? mb_strtoupper(trim($_POST["hora"]), 'UTF-8') : null; 
                $lugar = isset($_POST["lugar"]) ? mb_strtoupper(trim($_POST["lugar"]), 'UTF-8') : null; 
                $latitud = isset($_POST["latitud"]) ? trim($_POST["latitud"]): null; 
                $longitud = isset($_POST["longitud"]) ? trim($_POST["longitud"]): null; 
                $remitente = isset($_POST["remitente"]) ? trim($_POST["remitente"]): null; 
                $invitado = isset($_POST["invitado"]) ? trim($_POST["invitado"]) : null;
                $motivo = isset($_POST["motivo"]) ? trim($_POST["motivo"]) : null;
                $observacion = isset($_POST["observacion"]) ? trim($_POST["observacion"]) : null;

                $sql = "INSERT INTO usuario VALUES (0, '$fecha','$hora','$lugar','$latitud','$longitud','$remitente', 
                '$invitado','$motivo','$observacion')";
                
                if ($conn->query($sql) === TRUE) { 
                    echo "<p>Se ha creado los datos personales correctamemte!!!</p>"; 
                } else { 
                    if($conn->errno == 1062){ 
                        echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>"; 
                    }else{

                        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>"; 
                        } 
                        
                    } 
                    
                //cerrar la base de datos 
                
                $conn->close(); 
                echo "<a href='../vista/crear_usuario.html'>Regresar</a>"; 
            
            ?> 
    </body> 
</html>