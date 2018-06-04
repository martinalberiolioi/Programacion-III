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


        $sql = $objetoPDO->prepare('SELECT titel AS titulo, interpret AS interprete, jahr AS anio FROM cds WHERE id= :id');
        //prepara la instruccion, para que sea optimizada una sola vez, y luego ejecutada con ->execute() las veces que quiera

        $id = $sql->bindParam("id", $id, PDO::PARAM_INT);
        //fijate si lo que esta en $id es de tipo INT (PDO::PARAM_INT) y luego metelo en la posicion de clave "id" del array en ->prepare

        $sql->execute();
        //ejecuta la consulta que preparamos en ->prepare (el select)

        while($fila = $sql->fetchObject('Cds'))
        {//trae una fila (como el fgets), lo instancia a $fila y abajo usa su metodo MostrarTodo
            echo($fila->MostrarTodo());
        }
        
        
    } catch (PDOException $e)
    {
        echo "Error!!!\n" . $e->getMessage();
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