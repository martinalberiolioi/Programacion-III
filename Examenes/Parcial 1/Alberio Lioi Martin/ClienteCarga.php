<?php
    include "Cliente.php";

    $unCliente = new Cliente($_POST['nombre'], $_POST['correo'], $_POST['clave']);

    Cliente::GuardarEnArchivo($unCliente);
    
?>