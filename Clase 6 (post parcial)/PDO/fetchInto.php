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

        $sql->setFetchMode(PDO::FETCH_INTO, new Cds);
        //el ->fetch admite parametros. En este caso, el FETCH_INTO me permite instanciar los datos a una clase que yo quiera (cds)
        //entonces, convierte a $sql en un array de objetos instanciados de tipo Cds y luego me permite accederlos como $variable->atributo o $variable->metodo

        $sql->execute();
        //ejecuta la consulta que preparamos en ->prepare (el select)

        foreach($sql as $aux)
        {
            echo($aux->MostrarTodo());
        }
        
    } catch (PDOException $e)
    {
        echo "Error!!!\n" . $e->getMessage();
    } 

    class Cds
    {
        public $interprete;
        public $titulo;
        public $anio;

        public function MostrarTodo()
        {
            echo("Titulo: ".$this->titulo." - "."Interprete: ".$this->interprete." - "."Anio: ".$this->anio."<br/>");
        }
    }


?>