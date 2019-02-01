<?php
session_start();

// initializing variables
$username = "";
$nombre="";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'mensageria', 'mensageria', 'mensageria');

// REGISTER USER
if (isset($_POST['reg_user'])) {

    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $apellido1 = mysqli_real_escape_string($db, $_POST['apellido1']);
    $apellido2 = mysqli_real_escape_string($db, $_POST['apellido2']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


    if (empty($nombre)) { array_push($errors, "Se requiere nombre "); }
    if (empty($apellido1)) { array_push($errors, "Se requiere el primer apellido"); }
    if (empty($apellido2)) { array_push($errors, "Se requiere nombre de usuario"); }
    if (empty($username)) { array_push($errors, "Se requiere nombre de usuario"); }
    if (empty($password_1)) { array_push($errors, "Se requiere contraseña"); }
    if ($password_1 != $password_2) {
        array_push($errors, "Las dos contraseñas no coinciden");
    }


    $user_check_query = "SELECT * FROM usuarios WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }


    }


    if (count($errors) == 0) {
        $password = md5($password_1);
        $query = "INSERT INTO usuarios (nombre,apellido1,apellido2,username, password) 
  			  VALUES('$nombre', '$apellido1',$apellido2,$username, '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Ahora estás conectado";
        header('location: indexx.php');
    }
}

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "usuario es requerido");
    }
    if (empty($password)) {
        array_push($errors, "Se requiere contraseña");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Ahora estás conectado";
            header('location: indexx.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

?>