<?php

class PrincipalModel extends Query{
    public function __construct(){
        parent::__construct();
    }

    public function getPrueba(){
        return $this->select("SELECT * FROM usuarios WHERE id = 1");
    }

    //RECUPERAR LAS HABITACIONES
    public function getHabitaciones(){
        return $this->selectAll("SELECT * FROM habitaciones");
    }

    public function getDisponible($fecha_llegada, $fecha_salida, $habitacion){
        return $this->selectAll("SELECT * FROM reservas
        WHERE fecha_ingreso <= '$fecha_llegada'
        AND fecha_salida >= '$fecha_salida'
        AND id_habitacion = '$habitacion'
        ");
    }

/*     public function getDisponible($fecha_llegada, $fecha_salida, $habitacion){
        return $this->selectAll("SELECT * FROM reservas
        WHERE fecha_ingreso <= '$fecha_salida'
        AND fecha_salida >= '$fecha_llegada'
        AND id_habitacion = '$habitacion'
        ");
    } */
}

?>