<?php
class Eventos extends Controller{
public function __construct() {
    parent::__construct();
}

public function index(){
    $data['title'] = '- Eventos';
    $this->views->getView('principal/eventos/index', $data);
}
}
?>