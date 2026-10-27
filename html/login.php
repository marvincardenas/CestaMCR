<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

session_start();

if(isset($_POST['enviar'])){
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    //Validamos si los campos están vacios

    if(empty($usuario) || empty($password)){
        $error="Debes introducir un nombre de usuario y una contraseña";
    }else{
        //Comprobamos las credenciales con la base de datos
        try{
            //Consulta segura
            $sql="SELECT contrasena FROM usuario WHERE usuario = ?";
            $stmt = $pdo -> prepare ($sql);

            //Ejecutamos la consulta con los valores seguros
            $stmt->execute([$usuario]);
            //Obtenemos el resultado
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);

            if($fila){
                //Si el resultado es válido, regeneramos la sesión
                if(password_verify($password,$fila['contrasena'])){
                    session_regenerate_id(true);
                    $_SESSION['usuario']=$usuario;
                    header("Location: productos.php");
                    exit();//Detenemos el script para evitar continuar cargando la página
                }
            }else{
                //Si las credenciales no son válidas 
                $error = "Usuario o contraseña no válidos!";
            }
        }catch(PDOException $e){
            $error="Error en la conexión a la base de datos: ".$e -> getMessage();
        }

    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <linkhref="tienda.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h1>Bienvenido a la tienda</h1>
    <div id="login">
        <form action="login.php" method="post">
            <fieldset>
                <legend>Login</legend>
                    <!--Escapamos la variable $error para prevenir XSS-->
                    <div><span class="error"><?php echo isset($error) ? htmlspecialchars($error,ENT_QUOTES,'UTF-8') :''; ?></span></div>

                    <div class='campo'>
                        <label for="usuario">Usuario:</label><br/>
                    <!--Usamos htmlspecialchars para escapar la entrada del usuario -->
                    <input type="text" name="usuario" id="usuario" maxlength="50" value="<?php echo isset($usuario) ? htmlspecialchars($usuario,ENT_QUOTES,'UTF-8') : ''; ?>"/><br>
                    </div>

                    <div class="campo">
                        <label for="password">Contraseña:</label><br>
                        <input type="password" name="password" id="password" maxlength="50"><br>
                    </div>

                    <div class="campo">
                        <input type="submit" name="enviar" value='Enviar'>
                    </div>

            </fieldset>
        </form>

    </div>
</body>
</html>
