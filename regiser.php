 <?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<div class="header">
    <h2>Register</h2>
</div>

<form method="post" action="regiser.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <div class="input-group">
            <label>nombre</label>
            <input type="nombre" name="nombre" >
        </div>
        <div class="input-group">
            <label>apellido1</label>
            <input type="apellido1" name="apellido1" >
        </div>
        <div class="input-group">
            <label>apellido1</label>
            <input type="apellido2" name="apellido2">
        </div>
        <label>Usuario</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
    </div>

    <div class="input-group">
        <label>contraseña</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Confirmar contraseña</label>
        <input type="password" name="password_2">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Registrar</button>
    </div>
    <p>
        ¿Ya eres miembro? <a href="login.php">acceder</a>
    </p>
</form>
</body>
</html>