<?php

//Iniciamos la sesión
session_start();

//Destruimos la sesión

session_destroy();

//Eliminamos la cookie de sesión en el cliente

if(ini_get("session.use_cookies")){
    $params=session_get_cookie_params();
    setcookie(session_name(), '',time()-42000,
        $params["path"],$params["domain"],
        $params["secure"], $params["httponly"]
    );
}

//Redigirimos al usuario a la página de login
header("Location: login.php");
exit(); //Aseguramos que el script no siga ejecutánose 

?>