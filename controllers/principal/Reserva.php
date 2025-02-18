<?php
class Reserva extends Controller{
public function __construct() {
    parent::__construct();
}

public function verify(){
    #print_r($_GET);
    if (isset($_GET['fecha_llegada']) && isset($_GET['fecha_salida']) && isset($_GET['habitacion'])  ) {
        $fecha_llegada = strClean(($_GET['fecha_llegada']));
        $fecha_salida = strClean(($_GET['fecha_salida']));
        $habitacion = strClean(($_GET['habitacion']));
        if (empty($fecha_llegada) || empty($fecha_salida) || empty($habitacion)) {
            header('Location: ' . RUTA_PRINCIPAL . '?respuesta=warning');
        } else {
            $reserva = $this->model->getDisponible($fecha_llegada, $fecha_salida, $habitacion);
            $data['title'] = '- Reservas';
            $data['disponible'] = [
                'fecha_llegada' => $fecha_llegada,
                'fecha_salida' => $fecha_salida,
                'habitacion' => $habitacion,
            ];
            if (empty($reserva)) {
                $data['mensaje'] = 'DISPONIBLE';
                $data['tipo'] = 'success';
            } else {
                $data['mensaje'] = 'NO DISPONIBLE';
                $data['tipo'] = 'danger';
            }
            $data['habitaciones'] = $this->model->getHabitaciones();
            $data['habitacion'] = $this->model->getHabitacion($habitacion);
            $this->views->getView('principal/reservas/index', $data);
            #print_r($data);
        }
    }
}

public function listar($parametros){
    $array = explode(',', $parametros);
    $fecha_llegada = (!empty($array[0])) ? $array[0] : null;
    $fecha_salida = (!empty($array[1])) ? $array[1] : null;
    $habitacion = (!empty($array[2])) ? $array[2] : null;
    $results = [];
    if ($fecha_llegada != null && $fecha_salida != null  && $habitacion != null ) {
        $reservas = $this->model->getReservasHabitacion($habitacion);
        for ($i = 0; $i < count($reservas); $i++) {
            $datos['id'] = $reservas[$i]['id'];
            $datos['title'] = 'OCUPADO';
            $datos['start'] = $reservas[$i]['fecha_ingreso'];
            $datos['end'] = $reservas[$i]['fecha_salida'];
            $datos['color'] = '#dc3545';
            array_push($results, $datos);
        }
        $data['id'] = $habitacion;
        $data['title'] = 'DISPONIBLE';
        $data['start'] = $fecha_llegada;
        $data['end'] = $fecha_salida;
        $data['color'] = '#ffc107';
        array_push($results, $data);
        echo json_encode($results, JSON_UNESCAPED_UNICODE);
    }
    die();
}
}
?>