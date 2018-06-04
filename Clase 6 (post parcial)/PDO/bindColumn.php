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

        $sql->bindColumn(1, $colTitulo, PDO::PARAM_STR);
        $sql->bindColumn(2, $colInterprete, PDO::PARAM_STR);
        $sql->bindColumn(3, $colAnio, PDO::PARAM_INT);
        $sql->bindColumn(4, $colId, PDO::PARAM_INT);

        //el bindColumn, retorna a la variable ($colTitulo, $colInterprete, etc) lo que este en el array de ->prepare
        //en la posicion que le indique (1 es titulo, 2 es interprete, 3 es anio y 4 id)
        
        $sql->execute();
        //ejecuta la consulta que preparamos en ->prepare (el select)

        while($sql->fetch(PDO::FETCH_BOUND))
        {
            echo "Titulo: ".$colTitulo." - Interprete: ".$colInterprete." - Anio: ".$colAnio." - ID: ".$colId;
        }
        
    } catch (PDOException $e)
    {
        echo "Error!!!\n" . $e->getMessage();
    } 

?>