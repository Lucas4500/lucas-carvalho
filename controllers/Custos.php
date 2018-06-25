<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Custos extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('CustosModel', 'model');
        $this->menu_itens = $this->model->get_menu_itens();
    }

    public function index(){
        $data['info'] = $this->model->inserirCusto();
        $data['action'] = base_url('custos');
        $html = $this->load->view('form_cadastro', $data, true);
        $this->show($html);
    }

    public function registrar(){
        $data['info'] = $this->model->registrarCusto();
        $data['action'] = base_url('custos/registrar');
        $html = $this->load->view('script', null, true);
        $html .= $this->load->view('form_registro', $data, true);
        $this->show($html);
    }

    public function view_registros(){
        $data['content'] = $this->model->getRegistros();
        $html = $this->load->view('viewer', $data, true);
        $this->show($html);
    }

    public function view_cadastros(){
        $data['content'] = $this->model->getCadastros();
        $html = $this->load->view('viewer', $data, true);
        $this->show($html);
    }

    public function edita_registros($id = NULL){
        $data['action'] = base_url('custos/edita_registros'.$id);
        $data['data'] = $this->model->pegaRegistros($id);
        $data['info'] = $this->model->editaRegistros($id);
        $html = $this->load->view('script', null, true);
        $html .= $this->load->view('form_edita_registro', $data, true);
        $this->show($html);
    }

    public function edita_cadastros($id = NULL){
        $data['action'] = base_url('custos/edita_cadastros/'.$id);
        $data['data'] = $this->model->pegaCadastros($id);
        $data['info'] = $this->model->editaCadastros($id);
        $html = $this->load->view('form_edita_cadastro', $data, true);
        $this->show($html);
    }

    public function deleta_registros($id = NULL){
        $this->model->deletaRegistros($id);
    }

    public function deleta_cadastros($id = NULL){
        $this->model->deletaCadastros($id);
    }

    public function getCustos(){
        echo $this->model->getOption();
    }

}