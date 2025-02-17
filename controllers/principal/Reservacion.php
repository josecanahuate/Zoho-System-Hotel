<?php
class Reservacion extends Controller{
public function __construct() {
    parent::__construct();
}

public function index(){
    $data['title'] = '- Contacto';
    $this->views->getView('principal/reservacion/index', $data);
}
}
?>