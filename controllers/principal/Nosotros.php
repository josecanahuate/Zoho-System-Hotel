<?php
class Nosotros extends Controller{
public function __construct() {
    parent::__construct();
}

public function index(){
    $data['title'] = '- Nosotros';
    $this->views->getView('principal/nosotros/index', $data);
}
}
?>