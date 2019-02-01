<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Debes iniciar sesión primero";
    header('location: indexx.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: indexx.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>document</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

<div class="header">
    <h2>Home Page</h2>
</div>
<div class="content">
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <a href="buscador.php">buscar personas</a>
        <?php
        include "db.php";
///consultamos a la base
        $consulta = "SELECT * FROM chat ORDER BY id DESC";
        $ejecutar = $conexion->query($consulta);
        while($fila = $ejecutar->fetch_array()) :
            ?>
            <div id="datos-chat">
                <span style="color: #1C62C4;"><?php echo $fila['nombre']; ?></span>
                <span style="color: #848484;"><?php echo $fila['mensaje']; ?></span>
                <span style="float: right;"><?php echo formatearFecha($fila['fecha']); "<br>"; ?>

                    <button id="delete" name="delete">delete</button >
            <button id="update" name="update">update</button >


        </span>
            </div>

        <?php endwhile; ?>
        <p> <a href="mensa.php" style="color: red;">escribir un mensaje</a> </p>
        <p> <a href="indexx.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>