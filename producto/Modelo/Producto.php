<?php


class Producto{
    
    private $codigo;
    private $producto;
    private $fabricante;
    private $precio;

    function __construct($codigo, $producto, $fabricante, $precio) {
        $this->codigo = $codigo;
        $this->producto = $producto;
        $this->fabricante = $fabricante;
        $this->precio = $precio;
    }
    function getCodigo() {
        return $this->codigo;
    }

    function getProducto() {
        return $this->producto;
    }

    function getFabricante() {
        return $this->fabricante;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setProducto($producto) {
        $this->producto = $producto;
    }

    function setFabricante($fabricante) {
        $this->fabricante = $fabricante;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }
}