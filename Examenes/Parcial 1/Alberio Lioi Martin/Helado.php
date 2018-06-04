<?php
    include "IVendible.php";

    class Helado implements IVendible
    {
        private $_sabor;
        private $_precio;

        public function __construct($sabor, $precio)
        {
            $this->_sabor = $sabor;
            $this->_precio = $precio;
        }

        public function GetSabor()
        {
            return $this->_sabor;
        }

        public function GetPrecio()
        {
            return $this->_precio;
        }

        public function PrecioMasIva()
        {
            $precioTotal = ($this->_precio * 21) / 100;

            return $this->_precio += $precioTotal;
        }

        public static function RetornarArrayDeHelados()
        {
            $misHelados = array();
            $helado1 = new Helado("Menta", "1");
            $helado2 = new Helado("Frutilla", "2");
            $helado3 = new Helado("Limon", "3");
            $helado4 = new Helado("Dulce de Leche", "4");
            $helado5 = new Helado("Chocolate", "5");

            array_push($misHelados, $helado1);
            array_push($misHelados, $helado2);
            array_push($misHelados, $helado3);
            array_push($misHelados, $helado4);
            array_push($misHelados, $helado5);

            return $misHelados;
        }

        public static function RecuperarHelados()
        {
            //falta recuperar las imagenes
            $archivo = fopen("./heladosArchivo/helados.txt", "r");
            $arrayHelados = array();

            while(!feof($archivo))
            {
                $heladoAux = explode("-",fgets($archivo));
                $heladoGuardar = new Helado($heladoAux[0], $heladoAux[1]);
                array_push($arrayHelados, $heladoGuardar);
            }

            fclose($archivo);

            return $arrayHelados;
        }
    }


?>