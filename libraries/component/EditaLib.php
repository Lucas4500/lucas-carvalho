<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';

class EditaLib extends CI_Object{

    public function __construct(){
        parent::__construct();
    }

    public function editaRegistros($id, array $data){
        $this->db->where('id', $id);
        $this->db->update('mod_custos_registros', $data);
    }

    public function editaCadastros($id, array $data){
        $this->db->where('id', $id);
        $this->db->update('mod_custos_cadastros', $data);
    }

    public function deletaRegistros($id){
        $this->db->where('id', $id);
        $this->db->delete('mod_custos_registros');
    }

    public function deletaCadastros($id){
        $this->db->where('id', $id);
        $this->db->delete('mod_custos_cadastros');
    }

}