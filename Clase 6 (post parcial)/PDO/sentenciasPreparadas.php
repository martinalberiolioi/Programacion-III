<?php
    if($_POST['tipoQuery'] == "fetchall")
    {
        try 
        {
            //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
            $origenDatos = 'mysql:host=localhost;dbname=cdcol;charset=utf8';
            $usuario='root';
            $clave='';

            $objetoPDO = new PDO($origenDatos, $usuario, $clave);
            //-------------HASTA ACA LA CONEXION---------------//


            $sql = $objetoPDO->prepare('SELECT titel AS titulo, interpret AS interprete, jahr AS anio FROM cds');
            //prepara la instruccion, para que sea optimizada una sola vez, y luego ejecutada con ->execute() las veces que quiera

            $sql->execute();
            //ejecuta la consulta que preparamos en ->prepare (el select)

            var_dump($sql->fetchall());
            //una vez ejecutada la consulta, sql va a contener el resultado del select. Entonces con el fetchall mostramos TODO lo que tiene
            
            
        } catch (PDOException $e)
        {
            echo "Error!!!\n" . $e->getMessage();
        } 
    }
    else //if($_POST['tipoQuery'] == "fetchobject")
    {
        try 
        {
            //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
            $origenDatos = 'mysql:host=localhost;dbname=cdcol;charset=utf8';
            $usuario='root';
            $clave='';

            $objetoPDO = new PDO($origenDatos, $usuario, $clave);
            //-------------HASTA ACA LA CONEXION---------------//


            $sql = $objetoPDO->prepare('SELECT titel AS titulo, interpret AS interprete, jahr AS anio FROM cds WHERE id= :id');
            //prepara la instruccion, para que sea optimizada una sola vez, y luego ejecutada con ->execute() las veces que quiera

            $sql->execute(array('id' => 5));
            //va al array, busca la clave "id" y le asigna 1
            //despues ejecuta la consulta que preparamos en ->prepare (el select)

            while($fila = $sql->fetchObject('Cds'))
            {//trae una fila (como el fgets), lo instancia a $fila y abajo usa su metodo MostrarTodo
                echo($fila->MostrarTodo());
            }
            
            
        } catch (PDOException $e)
        {
            echo "Error!!!\n" . $e->getMessage();
        } 
    }

    class Cds
    {
        //se crea la clase porque para el fetchObject, tengo que instanciar un objeto y los atributos de la clase a instanciar
        //tienen que ser iguales a las columnas de la base de datos y tambien tienen que ser PUBLICAS

        public $interprete;
        public $titulo;
        public $anio;

        public function MostrarTodo()
        {
            echo("Titulo: ".$this->titulo." - "."Interprete: ".$this->interprete." - "."Anio: ".$this->anio."<br/>");
        }
    }


    
?>