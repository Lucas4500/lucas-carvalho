<?php

include_once APPPATH.'libraries/builder/MenuBuilder.php';

class MenuTableBuilder extends MenuBuilder{

    function __construct(){
        parent::__construct('custos');
    }

    function get_data(){
        return array(
            array(
                'label' => 'Novo Custo Operacional', 
                'link' => $this->mod_name,
                'name' => 'novo custo',
                'module' => $this->mod_name
            ),
            array(
                'label' => 'Registrar Custo', 
                'link' => $this->mod_name.'/registrar',
                'name' => 'registrar custo',
                'module' => $this->mod_name
            ),
            array(
                'label' => 'Custos Cadastrados', 
                'link' => $this->mod_name.'/view_cadastros',
                'name' => 'visualizar custos cadastrados',
                'module' => $this->mod_name
            ),
            array(
                'label' => 'Ver Registros', 
                'link' => $this->mod_name.'/view_registros',
                'name' => 'visualizar registros de custo',
                'module' => $this->mod_name
            )
        );
    }
}
