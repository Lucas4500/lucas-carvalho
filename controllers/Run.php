<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Run extends MY_Controller{

    public function config(){
        // aqui vão as configurações que apenas admin tem acesso
        $this->load->model('RunModel', 'model');
    }

    public function usage(){
        // página de orientações sobre o uso do módulo
    }
}