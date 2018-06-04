<?php
    try 
    {
        //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
        $origenDatos = 'mysql:host=localhost;dbname=cdcol;charset=utf8';
        $usuario='root';
        $clave='';

        $objetoPDO = new PDO($origenDatos, $usuario, $clave);
        //los objetos PDO tiran excepciones de tipo PDOEXception

        echo(":)");
        //si todo salio bien, muestra :)
        
    } catch (PDOException $e)
    {
        echo "Error!!!\n" . $e->getMessage();
    } 
?>