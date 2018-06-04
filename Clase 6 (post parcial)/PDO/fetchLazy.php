<?php

    try 
    {
        //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
        $origenDatos = 'mysql:host=localhost;dbname=cdcol;charset=utf8';
        $usuario='root';
        $clave='';
        $id = $_POST['id'];

        $objetoPDO = new PDO($origenDatos, $usuario, $clave);
        //-------------HASTA ACA LA CONEXION---------------//


        $sql = $objetoPDO->prepare('SELECT titel AS titulo, interpret AS interprete, jahr AS anio , id FROM cds WHERE id= :id');
        //prepara la instruccion, para que sea optimizada una sola vez, y luego ejecutada con ->execute() las veces que quiera

        $sql->bindParam("id", $id, PDO::PARAM_INT);
        //reemplaza el id del array en el ->prepare por el que se pasa por POST

        $sql->execute();
        //ejecuta la consulta que preparamos en ->prepare (el select)

        while($aux = $sql->fetch(PDO::FETCH_LAZY))
        {//el ->fetch admite parametros. En este caso, el FETCH_LAZY devuelve los datos como un objeto con atributos
        //es decir, me permite acceder luego como $objeto->variable
        
            echo "Titulo: ".$aux->titulo." - Interprete: ".$aux->interprete." - Anio: ".$aux->anio;
        }
        
    } catch (PDOException $e)
    {
        echo "Error!!!\n" . $e->getMessage();
    } 

?>