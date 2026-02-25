<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Usuario</title>
</head>
<body>
    <?php
        $host = "host.docker.internal";
        $puerto = 3307;
        $usuario = "usuario";
        $password = "password";
        $base_datos = "users";

        // Conexión
        $conn = new mysqli($host, $usuario, $password, $base_datos, $puerto);
        if ($conn->connect_error) { die("Error de conexión: " . $conn->connect_error); }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $pass = mysqli_real_escape_string($conn, $_POST['password']);

            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$pass')";
            if ($conn->query($sql) === TRUE) {
                echo "✅ Usuario insertado correctamente";
            } else {
                echo "❌ Error al insertar: " . $conn->error;
            }
        }
        $conn->close();
    ?>
</body>
</html>

