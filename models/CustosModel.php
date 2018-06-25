<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once APPPATH.'modules/custos/libraries/component/CustosLib.php';
include_once APPPATH.'modules/custos/libraries/component/EditaLib.php';

class CustosModel extends MY_Model{

    private $custos;
    private $edita;

    public function __construct(){
        parent::__construct('Custos');
        $this->custos = new CustosLib();
        $this->edita = new EditaLib();
    }

    public function inserirCusto(){
        if(sizeof($_POST) == 0) return '';

        $data = array(
            'tipo' => $this->input->post('tipo'),
            'impacto' => $this->input->post('impacto'),
            'nome_do_custo' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao')
        );

        $this->custos->insert('cadastros', $data);

        return '<p class="text-center alert alert-success">Custo Operacional Cadastrado com Sucesso!</p>';

    }

    public function registrarCusto(){
        if(sizeof($_POST) == 0){
            return '<p class="text-center alert alert-danger">
                        Se o Select Custo Operacional, não retornar valores.
                        Favor Cadastrar um Novo Custo Operacional antes de Prosseguir!
                    </p>';
        }

        $data = array(
            'tipo' => $this->input->post('tipo'),
            'custo' => $this->input->post('custo'),
            'valor' => $this->input->post('valor')
        );

        $this->custos->insert('registros', $data);

        return '<p class="text-center alert alert-success">Custo Operacional Registrado com Sucesso!</p>';

    }

    public function editaRegistros($id){
        if(sizeof($_POST) == 0) return '';

        $data = array(
            'tipo' => $this->input->post('tipo'),
            'custo' => $this->input->post('custo'),
            'valor' => $this->input->post('valor')
        );

        $this->edita->editaRegistros($id, $data);

        return '<p class="text-center alert alert-success">Registro Alterado com Sucesso!</p>';
            
    }

    public function editaCadastros($id){
        if(sizeof($_POST) == 0) return '';

        $data = array(
            'tipo' => $this->input->post('tipo'),
            'impacto' => $this->input->post('impacto'),
            'nome_do_custo' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao')
        );

        $this->edita->editaCadastros($id, $data);

        return '<p class="text-center alert alert-success">Custo Operacional Alterado com Sucesso!</p>';
            
    }

    public function deletaRegistros($id){
        $this->edita->deletaRegistros($id);
        redirect('custos');
    }

    public function deletaCadastros($id){
        $this->edita->deletaCadastros($id);
        redirect('custos');
    }

    public function pegaCadastros($id){
        return $this->custos->getAll('cadastros', $id);
    }

    public function pegaRegistros($id){
        return $this->custos->getAll('registros', $id);
    }

    public function getCadastros(){
        return $this->custos->viewCadastros('cadastros');
    }

    public function getRegistros(){
        return $this->custos->viewRegistros('registros');
    }

    public function getOption(){
        $tipo = $_POST['id_tipo'];
        return $this->custos->getOption($tipo);
    }

    public function validate_config_itens($itens){
        $this->form_validation->set_rules("config[mod_custos_active]", "Config[mod_custos_active]", "required|is_natural|less_than[2]");
        $this->form_validation->set_rules("config[mod_custos_novo_cadastro]", "Config[mod_custos_novo_cadastro]", "required|is_natural|less_than[2]");
        $this->form_validation->set_rules("config[mod_custos_registrar]", "Config[mod_custos_registrar]", "required|is_natural|less_than[2]");
        return $this->form_validation->run();
    }

}