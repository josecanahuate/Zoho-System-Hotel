<?php

class ReservaModel extends Query{
    public function __construct(){
        parent::__construct();
    }

    public function getDisponible($fecha_llegada, $fecha_salida, $habitacion){
        return $this->selectAll("SELECT * FROM reservas
        WHERE fecha_ingreso <= '$fecha_llegada'
        AND fecha_salida >= '$fecha_salida'
        AND id_habitacion = '$habitacion'
        ");
    }

    public function getReservasHabitacion($habitacion){
        return $this->selectAll("SELECT * FROM reservas WHERE id_habitacion = $habitacion");
    }

    //RECUPERAR LAS HABITACIONES
    public function getHabitaciones(){
        return $this->selectAll("SELECT * FROM habitaciones WHERE estado = 1");
    }

    //RECUPERAR HABITACION
    public function getHabitacion($id_habitacion){
        return $this->select("SELECT * FROM habitaciones WHERE id = $id_habitacion");
    }
}

?>