
<?php
if (!isset($_GET['codigo'])) {
    header('Location: inicio.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT pro.promocion, pro.duracion , pro.id_persona, per.nombres , per.apellido_paterno ,per.apellido_materno,per.celular , per.fecha_nacimiento 
  FROM promociones pro 
  INNER JOIN persona per ON per.id = pro.id_persona 
  WHERE pro.id = ?;");
$sentencia->execute([$codigo]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);

    $url = 'https://api.green-api.com/waInstance1101816218/SendMessage/c7a2b4c8f8824dedaa8bef6b6c16b4f925cf478c3c854f2da0';
    $data = [
        "chatId" => "51".$persona->celular."@c.us",
        "message" =>  'Estimado(a) cliente *'.strtoupper($persona->nombres).' '.strtoupper($persona->apellido_paterno).' '.strtoupper($persona->apellido_materno).
        '* No se pierda esta increible promocion de *'.strtoupper($persona->promocion).'* valido solo por *'.$persona->duracion.'*'.'. No dejes pasar esta oportunidad. Ingresa a este link para mas informacion -> https://www.falabella.com.pe/falabella-pe/category/cat40508/Cafeteras'
    ];
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
   // header('Location: agregarPromocion.php?codigo='.$persona->id_persona);
?> 