

<?php
$servername = "localhost";
$database = "mensageria";
$username = "mensageria";
$password ="mensageria";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connectado";
echo "<br>";
$sql = "INSERT INTO mensaje (id, username, mensaje) VALUES ('', '".$_SESSION["username"]."', '".$_POST["mensaje"]."')";
if (mysqli_query($conn, $sql)) {
    echo "mensaje enviado";
    echo "<br>";
    echo "enviado por:";
    echo $_SESSION["username"];
    echo "<br>";
    echo "mensaje:";
    echo $_POST["mensaje"];
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
