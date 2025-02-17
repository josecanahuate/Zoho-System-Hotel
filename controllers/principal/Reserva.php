<?php
class Reserva extends Controller{
public function __construct() {
    parent::__construct();
}

public function index(){
    $data['title'] = '- Reservas';
    $this->views->getView('principal/reservas/index', $data);
}
}
?>