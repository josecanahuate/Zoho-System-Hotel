<?php
class Contacto extends Controller{
public function __construct() {
    parent::__construct();
}

public function index(){
    $data['title'] = '- Contacto';
    $this->views->getView('principal/contacto/index', $data);
}
}
?>