<?php
    class Auto
    {
        private $_color;
        private $_precio;
        private $_marca;
        private $_fecha;

        public function __construct($marca = "Audi", $color = "Blanco", $precio = "150000", $fecha = "08-03-15")
        {
            $this->_color = $color;
            $this->_marca = $marca;
            $this->_precio = $precio;
            $this->_fecha = $fecha;
        }

        public function AgregarImpuestos($valorImpuesto)
        {
            $this->_precio += (double)$valorImpuesto;
            echo "Impuestos agregados, nuevo valor: ".$this->_precio."<br/>";
        }

        public static function MostrarAuto($unAuto)
        {
            echo "Marca: ".$unAuto->_marca." Precio: ".$unAuto->_precio." Color: ".$unAuto->_color." Fecha: ".$unAuto->_fecha;
        }

        public static function Equals($unAuto, $otroAuto)
        {
            if($unAuto->_marca == $otroAuto->_marca)
            {
                return true;
            }

            return false;
        }

        public static function Add($unAuto, $otroAuto)
        {
            if($unAuto->_marca == $otroAuto->_marca && $unAuto->_precio == $otroAuto->_precio)
            {
                $suma = $unAuto->_precio + $otroAuto->_precio;
                //guarda la suma de los precios de ambos autos

                if($suma)
                {//si la suma se pudo hacer, la devuelve. Caso contrario, devuelve 0
                    return "Resultado de la suma del precio de los dos autos: ".$suma."<br/>";
                }
                else
                {
                    return 0;
                }
            }
            else
            {
                echo "No se pudo sumar los precios. Los autos ingresados no son iguales <br/>";
            }
        }
    }


?>