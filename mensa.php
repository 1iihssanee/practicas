<?php
include "db.php";


?>
<!DOCTYPE html>
<html>
<head>
    <title>mensajes</title>
    <link rel="stylesheet" type="text/css" href="estilos1.css">
    <link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">


</head>
<body>

<div id="contenedor">
    <div id="caja-chat">
        <div id="chat">

        </div>
    </div>

    <form method="POST" action="indexx.php">
        <input type="text" name="nombre" placeholder="Ingresa tu nombre">
        <textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php
    session_start();
    if (isset($_POST['enviar'])) {

        $nombre = $_POST['nombre'];
        $mensaje = $_POST['mensaje'];

        $consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";

        $ejecutar = $conexion->query($consulta);

    }


    ?>
</div>

</body>
</html>