<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agenda_model extends CI_Model{
     
    public function getAgenda($cod_associado,$id=null) {
        $this->db->select('*');
        $this->db->from('v_agendamento');
        $this->db->where('COD_ASSOCIADO', $cod_associado);
        if(!is_null($id)){
            $this->db->where('CODIGO', $id);
        }
        $query = $this->db->get();        
        //echo $this->db->last_query(); die();
        
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{ 
            return FALSE;
        } 
    }
    public function getServicos($cod_associado) {
        $this->db->select('*');
        $this->db->from('servico');
        $this->db->where('COD_ASSOCIADO', $cod_associado);
        $query = $this->db->get();        
        
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{ 
            return FALSE;
        } 
    }
    public function getNumServicos($cod_associado) {
        $this->db->select('*');
        $this->db->from('servico');
        $this->db->where('COD_ASSOCIADO', $cod_associado);
        return $this->db->count_all_results();
    }
    
    public function getHorario($cod_associado) {
        $this->db->select('*');
        $this->db->from('horario');
        $this->db->where('COD_ASSOCIADO', $cod_associado);
        $query = $this->db->get();        
       // echo $this->db->last_query(); die();
        
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{ 
            return FALSE;
        } 
    }
    
     public function getFuncSala($cod_servico) {
        $this->db->select('F.*');
        $this->db->from('funcionario F');
        $this->db->join('func_serv FS', 'FS.COD_FUNCIONARIO = F.CODIGO');
        $this->db->where('FS.COD_SERVICO', $cod_servico);
        $this->db->where('F.STATUS', 1);
        $query = $this->db->get();        
       // echo $this->db->last_query(); die();
        
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{ 
            return FALSE;
        } 
    }
    public function getAllFuncSala($cod_associado) {
        $this->db->select('F.*');
        $this->db->from('funcionario F');
        $this->db->join('func_serv FS', 'FS.COD_FUNCIONARIO = F.CODIGO');
        $this->db->join('servico S', 'S.CODIGO = FS.COD_SERVICO');
        $this->db->where('S.COD_ASSOCIADO', $cod_associado);
        $query = $this->db->get();        
        //echo $this->db->last_query(); die();
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{ 
            return FALSE;
        } 
    }
    public function novoAgendamento($dados) {
        if ($this->db->insert('agendamento', $dados)){
          //   echo $this->db->last_query(); //die();
            return $this->db->insert_id();
        }else{
            return false;
        }

    }
    public function alteraAgenda($id, $dados) {

    }
    public function excluirAgenda($id) {

    }
}
