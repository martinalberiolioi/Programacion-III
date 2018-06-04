<?php
    include "interfaces.php";
    include_once "Empleado.php";

    class Fabrica implements IArchivo
    {
        private $_cantidadMaxima;
        private $_empleados;
        private $_razonSocial;

        public function __construct($razonSocial, $cantidadMaxima = 5)
        {
            $this->_cantidadMaxima = $cantidadMaxima;
            $this->_razonSocial = $razonSocial;
            $this->_empleados = Array();
        }

        public function AgregarEmpleado($empleado)
        {
            if(count($this->_empleados) < $this->_cantidadMaxima)
            {
                array_push($this->_empleados, $empleado);
                $this->EliminarEmpleadoRepetido();
                return true;
            }
            else
            {
                echo "Fabrica llena!</br>";
            }

            return false;
        }

        public function CalcularSueldos()
        {
            $contador = 0;

            foreach($this->_empleados as $unEmpleado)
            {
                $contador += $unEmpleado->GetSueldo();
            }

            return $contador;
        }

        public function EliminarEmpleado($empleado)
        {
            for($i = 0; $i < count($this->_empleados); $i++)
            {
                if($this->_empleados[$i]->GetLegajo() == $empleado->GetLegajo())
                {
                    unset($this->_empleados[$i]);
                    return true;
                }
            }

            return false;

        }

        private function EliminarEmpleadoRepetido()
        {
            $this->_empleados = array_unique($this->_empleados, SORT_REGULAR);
        }

        public function ToString()
        {
            $retorno = "";

            foreach($this->_empleados as $unEmpleado)
            {
                $retorno .= $unEmpleado->ToString()."<br/>";
            }

            return "Razon social: ".$this->_razonSocial." - Cantidad maxima de empleados: ".$this->_cantidadMaxima." - Lista de empleados: <br/><br/>".$retorno;

        }

        public function GuardarEnArchivo($nombreArchivo = "../archivos/empleados.txt")
        {
            $archivo = fopen($nombreArchivo, "w");

            foreach($this->_empleados as $unEmpleado)
            {
                fwrite($archivo, $unEmpleado->ToString()."\r\n");
            }

            fclose($archivo);
        }

        public function TraerDeArchivo($nombreArchivo = "../archivos/empleados.txt")
        {
            $archivo = fopen($nombreArchivo, "r");

            while(!feof($archivo))
            {
                $auxiliar = explode(" - ",fgets($archivo));

                if(trim($auxiliar[0]) != "")
                {
                    $unEmpleado = new Empleado($auxiliar[0], $auxiliar[1], $auxiliar[2], $auxiliar[3], $auxiliar[4], $auxiliar[5], $auxiliar[6]);
                    $unEmpleado->SetPathFoto("../fotos/".$auxiliar[2]."-".$auxiliar[1]);
                    
                    $this->AgregarEmpleado($unEmpleado);
                }
            
            }
        
            fclose($archivo);

        }

        public function GetEmpleados()
        {
            return $this->_empleados;
        }
    }


?>