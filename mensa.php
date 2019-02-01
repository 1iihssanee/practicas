
<!DOCTYPE html>
<html>
<head>
    <title>mensajes</title>
    <link rel="stylesheet" type="text/css" href="estilos1.css">
    <link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">


</head>
<body>
<form method="POST" action="indexx.php">
    <input type="text" name="nombre" placeholder="Ingresa tu nombre">
    <textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
    <input type="submit" name="enviar" value="Enviar">
</form>
<div id="contenedor">
    <div id="caja-chat">
        <div id="chat">

        </div>
    </div>
    <?php require_once 'mensaje.php';?>
    <?php new mysqli('localhost','mensageria','mensageria','mensageria') or die(mysqli_error($mysqli));
    $select="select *from chat";
    $result= $mysqli->query($select) or die($consulta->error);

    function pre_r($array){
        echo '<pre>';
        print_r ($array);
            echo '</pre>';
    }

    ?>


    <?php
     new mysqli('localhost','mensageria','mensageria','mensageria') or die(mysqli_error($mysqli));
    session_start();
    if (isset($_POST['enviar'])) {

        $nombre = $_POST['nombre'];
        $mensaje = $_POST['mensaje'];
       $mensage1=$_SESSION['mensaje'];
        $consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";

        $ejecutar = $conexion->query($consulta);

    }

    if (isset($_POST['delete'])) {
     $id=$_POST['delete'];
     $mysqli->query("delete  from chat where id=$id");
        $_SESSION['mensaje']="mensaje borrado";
    }
    ?>
</div>

</body>
</html>