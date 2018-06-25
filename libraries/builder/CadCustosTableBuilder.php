<?php

include_once APPPATH.'libraries/builder/TableBuilder.php';

class CadCustosTableBuilder extends TableBuilder{

    public function __construct(){
        parent::__construct('mod_custos_cadastros');
    }

    public function get_fields(){
        return $fields = array(
            'tipo' => array(
                'type' => 'TINYINT',
                'constraint' => 1
            ),
            'impacto' => array(
                'type' => 'TINYINT',
                'constraint' => 1
            ),
            'nome_do_custo' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'unique' => true
            ),
            'descricao' => array(
                'type' => 'VARCHAR',
                'constraint' => 150
            )
        );
    }

}