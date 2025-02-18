<?php
class Principal extends Controller{
public function __construct() {
    parent::__construct();
}

public function index(){
    $data['title'] = '- Luxury Hotel';
    //TRAER HABITACIONES
    $data['habitaciones'] = $this->model->getHabitaciones();
    $this->views->getView('index', $data);
}

public function verify(){
    #print_r($_GET);
    if (isset($_GET['fecha_llegada']) && isset($_GET['fecha_salida']) && isset($_GET['habitacion'])  ) {
        $fecha_llegada = strClean(($_GET['fecha_llegada']));
        $fecha_salida = strClean(($_GET['fecha_salida']));
        $habitacion = strClean(($_GET['habitacion']));
        if (empty($fecha_llegada || empty($fecha_salida) || empty($habitacion))) {
            header('Location: ' . RUTA_PRINCIPAL . '?respuesta=warning');
        } else {
            $data = $this->model->getDisponible($fecha_llegada, $fecha_salida, $habitacion);
            #print_r($data);
        }
    }
}
}
?>