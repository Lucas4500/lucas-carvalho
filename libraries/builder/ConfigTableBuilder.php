<?php

include_once APPPATH.'libraries/builder/ConfigBuilder.php';

class ConfigTableBuilder extends ConfigBuilder{

    function __construct(){
        parent::__construct('custos');
    }

    function get_data(){
        $base = parent::get_data();
        
        $data = array(
            array(
                'nome' => 'mod_custos_active', 
                'valor' => 1,
                'descricao' => 'Indica se um módulo está habilitado ou não',
                'admin_only' => 1
            ),
            array(
                'nome' => 'mod_custos_novo_cadastro', 
                'valor' => true,
                'descricao' => 'Indica se a página de cadastro de novos custos operacionais aparecerá',
                'admin_only' => 1
            ),
            array(
                'nome' => 'mod_custos_registrar', 
                'valor' => true,
                'descricao' => 'Indica se o registro de custo aparecerá',
                'admin_only' => 1
            )
        );
        return array_merge($base, $data);
    }
}

// poll_tipo_votacao pode ser: 
// binary, star, grade, range
// binary [0, 1]
// star [0 .. 5]
// grade [0 .. 10]
// range [a .. b] {a, b} reais
