<?php
    abstract class FiguraGeometrica
    {
        protected $_color;
        protected $_perimetro;
        protected $_superficie;

        public function __construct()
        {
            $this->_color = "";            
        }

        protected abstract function CalcularDatos(); //es abstracta porque se implementa en las clases derivadas  

        public abstract function Dibujar(); //es abstracta porque se implementa en las clases derivadas

        public function GetColor()
        {
            return $this->_color;
        }

        public function SetColor($color)
        {
            $this->_color = $color;
        }

        public function ToString()
        {
           return "Color: ".$this->_color." -- Perimetro: ".$this->_perimetro." -- Superficie: ".$this->_superficie."<br>";
           $this->Dibujar();
        }
    }


    class Rectangulo extends FiguraGeometrica
    {
        private $_ladoUno;
        private $_ladoDos;

        public function __construct($l1, $l2)
        {
            parent::__construct();
            $this->_ladoUno = $l1;
            $this->_ladoDos = $l2;
            $this->CalcularDatos();            
        }

        protected function CalcularDatos()
        {
            $this->_perimetro = 2 * ($this->_ladoUno + $this->_ladoDos);
            $this->_superficie = $this->_ladoUno * $this->_ladoDos;
        }

        public function Dibujar()
        {
            //base (L1) = cantidad de asteriscos horizontales
            //altura (L2) = cantidad de astericos verticales

            for($i = 0; $i < $this->_ladoUno; $i++)
            {
                for($k = 0; $k < $this->_ladoDos; $k++)
                {
                    echo("*");
                }

                echo("<br>");
            }
        }

        public function ToString()
        {
            return parent::ToString()."Lado uno: ".$this->_ladoUno." -- Lado dos: ".$this->_ladoDos."<br>";
            $this->Dibujar();
        }
    }

    class Triangulo extends FiguraGeometrica
    {
        private $_base;
        private $_altura;

        public function __construct($b, $h)
        {
            parent::__construct();
            $this->_base = $b;
            $this->_altura = $h;
            $this->CalcularDatos();
        }

        protected function CalcularDatos()
        {            
            $this->_perimetro = 3 * $this->_base;
            $this->_superficie = 0.5 * ($this->_base * $this->_altura); //base por altura divido 2
        }

        public function Dibujar()
        {
            for($i = 1; $i <= $this->_base; $i++)
            { 
                echo "*"; 
                $escrito = 1; 
                 
                while($escrito < $i){ 
                    echo "*"; 
                    $escrito++; 
                } 
                echo "<br>"; 
            }    
        }

        public function ToString()
        {
            return parent::ToString().("Base: ".$this->_base." -- Altura: ".$this->_altura."<br>");
            $this->Dibujar();
        }
    }

    $testRectangulo = new Rectangulo(3,7);

    echo $testRectangulo->ToString();
    $testRectangulo->Dibujar();

    $testTriangulo = new Triangulo(5,2);

    echo $testTriangulo->ToString();
    $testTriangulo->Dibujar();

?>