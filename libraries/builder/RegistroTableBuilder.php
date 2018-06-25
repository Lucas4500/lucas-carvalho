<?php

include_once APPPATH.'libraries/builder/TableBuilder.php';

class RegistroTableBuilder extends TableBuilder{

    public function __construct(){
        parent::__construct('mod_custos_registros');
    }

    public function get_fields(){
        return $fields = array(
            'tipo' => array(
                'type' => 'TINYINT',
                'constraint' => 1
            ),
            'custo' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
            ),
            'valor' => array(
                'type' => 'DECIMAL',
                'constraint' => 10,2
            )
        );
    }

}