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


            $sql = $objetoPDO->query('SELECT * FROM cds');
            //aca trae TODO de la base de datos (select *)

            $result = $sql->fetchAll();
            //aca trae TODO lo que contiene $sql (osea, TODO lo de la base de datos)

            echo(var_dump($result));
            
        } catch (PDOException $e)
        {
            echo "Error!!!\n" . $e->getMessage();
        } 
    }
    else //if($_POST['tipoQuery'] == "fechobject")
    {
        try 
        {
            //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
            $origenDatos = 'mysql:host=localhost;dbname=cdcol;charset=utf8';
            $usuario='root';
            $clave='';

            $objetoPDO = new PDO($origenDatos, $usuario, $clave);
            //-------------HASTA ACA LA CONEXION---------------//


            $sql = $objetoPDO->query('SELECT titel AS titulo, interpret AS interprete, jahr AS anio FROM cds');
            //aca cambia de nombre las columnas (titel la cambia a titulo, interpret a interprete y jahr a anio)
            //y despues las devuelve


            while($fila = $sql->fetchObject('Cds'))
            {//trae una fila (como el fgets), lo instancia a $fila y abajo usa su metodo MostrarTodo
                echo($fila->MostrarTodo());
            }

            //cuando hago $fila = $sql->fetchObject('Cds) lo que hace es ir a la clase Cds, y buscar si cada
            //columna que traje del query (titulo, interprete, anio) existen como atributos en la clase Cds
            //si existen, se asignan. Luego se instancia en $fila. Y abajo uso la funcion MostrarTodo() para
            //mostrar los datos que se asignaron previamente.
            //si algun juego de columna/atributo no coinciden, se asigna "null"
            
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