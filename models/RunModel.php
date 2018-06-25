<?php
include_once APPPATH.'libraries/component/InstallStatus.php';

class RunModel extends MY_Model{

    public function __construct(){
        parent::__construct('Custos');
        $this->builder_list[] = 'ConfigTableBuilder';
        $this->builder_list[] = 'MenuTableBuilder';

        $this->builder_list[] = 'CadCustosTableBuilder';
        $this->builder_list[] = 'RegistroTableBuilder';
    }

}