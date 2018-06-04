<?php
    class Cliente
    {
        private $_nombre;
        private $_correo;
        private $_clave;

        public function __construct($nombre, $correo, $clave)
        {
            $this->_nombre = $nombre;
            $this->_correo = $correo;
            $this->_clave = $clave;
        }

        public static function GuardarEnArchivo($cliente)
        {
            $archivo = fopen("./clientes/clientesActuales.txt", "a");

            if(fwrite($archivo, $cliente->ToString()))
            {
                echo "Guardado con exito <br/>";
            }
            else
            {
                echo "Error al guardar <br/>";
            }

            fclose($archivo);

        }

        public function ToString()
        {
            return $this->_nombre." - ".$this->_correo." - ".$this->_clave;
        }
    }

?>