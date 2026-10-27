<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="tienda.css" type="text/css">
</head>

<body>
    <h1>Registro de usuarios</h1>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br><br>

        <label for="contraseña">Constraseña:</label>
        <input type="password" name="contraseña"><br><br>

        <button type="submit">Registrar</button>
        <button>
            <a href="login.php">Iniciar Sesión</a>
        </button>
        </a>
    </form>

    <?php

    include 'db.php';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        try {
            //Recibe los datos del formulario
            $nombre = $_POST['nombre'];
            $contraseña = $_POST['contraseña'];

            //Se genera un hash seguro para la contraseña
            $password_hash = password_hash($contraseña, PASSWORD_DEFAULT);

            //Insertar en la base de datos

            $sql = "INSERT INTO usuario(usuario,contrasena) VALUES (?,?)";
            $stmt = $pdo->prepare($sql);

            if ($stmt->execute([$nombre, $password_hash])) {
                echo "Usuario registrado";
            } else {
                echo "Error al registrar usuario";
            }

        } catch (PDOException $e) {

            if ($e->getCode() === '23000') {

                echo "Ese nombre de usuario ya existe";
            } else {
                echo "Error al registrar usuario", $e->getMessage();
            }
        }
    }

    ?>

</body>

</html>