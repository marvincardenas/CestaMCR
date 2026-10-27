<?php

//Iniciamos la sesión
session_start();

//Eliminamos solo la variable 'cesta' de la sesión
unset($_SESSION['cesta']);

//Mensaje de confirmación
echo "Gracias por su compra.<br/>¿Quiere <a href='productos.php'>comenzar de nuevo</a>?";

//Finalizamos el script, ya que no necesitamos ejecutar más

exit();

?>