<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include_once APPPATH.'libraries/util/CI_Object.php';

class CustosLib extends CI_Object{

    public function __construct(){
        parent::__construct();
    }

    public function insert($table, array $data){
        $this->db->insert('mod_custos_'.$table, $data);
    }

    public function viewRegistros($table){
        $rs = $this->db->get('mod_custos_'.$table);
        $html = '';
        foreach($rs->result() as $aux){
            $html .= $this->htmlRegistros($aux);
        }
        return $html;
    }

    public function viewCadastros($table){
        $rs = $this->db->get('mod_custos_'.$table);
        $html = '';
        foreach($rs->result() as $aux){
            $html .= $this->htmlCadastros($aux);
        }
        return $html;
    }

    private function htmlCadastros($aux){
        return '<div class="card text-center">
                    <div class="card-header bg-primary white-text">
                        '.$this->pegaTipo($aux->tipo).'
                    </div>
                    <div class="card-body">
                        <h4 class="">Custo: '.$aux->nome_do_custo.'</h4>
                        '.$this->pegaImpacto($aux->impacto).'
                        <p class="card-text">Descrição: '.$aux->descricao.'</p>
                        <a class="btn btn-info btn-sm" href="'.base_url('custos/edita_cadastros/'.$aux->id).'">Editar</a>
                        <a class="btn btn-danger btn-sm" href="'.base_url('custos/deleta_cadastros/'.$aux->id).'">Deletar</a>
                    </div>
                    <div class="card-footer text-muted bg-primary white-text">
                    </div>
                </div>';
    }

    private function htmlRegistros($aux){
        return '<div class="card text-center">
                    <div class="card-header bg-primary white-text">
                        '.$this->pegaTipo($aux->tipo).'
                    </div>
                    <div class="card-body">
                        <h4>Custo: '.$aux->custo.'</h4>
                        <a class="btn btn-info btn-sm" href="'.base_url('custos/edita_registros/'.$aux->id).'">Editar</a>
                        <a class="btn btn-danger btn-sm" href="'.base_url('custos/deleta_registros/'.$aux->id).'">Deletar</a>
                    </div>
                    <div class="card-footer text-muted bg-primary white-text">
                        Valor: R$'.$aux->valor.'
                    </div>
                </div>';
    }

    private function pegaImpacto($case){
        switch($case){
            case '1': return '<p class="text-success">Impacto: Muito Baixo</p>'; 
            case '2': return '<p class="text-info">Impacto: Baixo</p>'; 
            case '3': return '<p class="text-warning">Impacto: Médio</p>'; 
            case '4': return '<p class="text-danger">Impacto: Alto</p>'; 
            case '5': return '<p class="alert-danger">Impacto: Muito Alto</p>'; 
        }
    }

    private function pegaTipo($case){
        switch($case){
            case '1': return '<h3 class="mt-2 text-muted white-text">Administrativo</h3>';
            case '2': return '<h3 class="mt-2 text-muted white-text">Financeiro</h3>';
            case '3': return '<h3 class="mt-2 text-muted white-text">Não Recuperável</h3>';
            case '4': return '<h3 class="mt-2 text-muted white-text">De Representação</h3>';
        }
    }

    public function getAll($table, $id){
        $this->db->where('id', $id);
        $rs = $this->db->get('mod_custos_'.$table);
        foreach($rs->result() as $data);
        return $data;
    }

    public function getOption($tipo){
        $rs = $this->db->get_where('mod_custos_cadastros', array('tipo' => $tipo));
        $html = '<option value="" selected>Selecione o Custo Operacional...</option>';
        foreach($rs->result() as $custos){
            $html .= '<option value="'.$custos->nome_do_custo.'">'.$custos->nome_do_custo.'</option>'.PHP_EOL;
        }
        return $html;
    }

}