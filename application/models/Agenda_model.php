<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agenda_model extends CI_Model{
     
    public function getAgenda($cod_associado) {
        $this->db->select('*');
        $this->db->from('v_agendamento');
        $this->db->where('COD_ASSOCIADO', $cod_associado);
        $query = $this->db->get();        
       // echo $this->db->last_query(); die();
        
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
       // echo $this->db->last_query(); die();
        
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{ 
            return FALSE;
        } 
    }
     public function getFuncSala($cod_associado) {
        $this->db->select('*');
        $this->db->from('funcionario');
        $this->db->where('COD_SERVICO', $cod_associado);
        $this->db->where('STATUS', 1);
        $query = $this->db->get();        
       // echo $this->db->last_query(); die();
        
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{ 
            return FALSE;
        } 
    }
    public function novoAgenda($dados) {


    }
    public function alteraAgenda($id, $dados) {

    }
    public function excluirAgenda($id) {

    }
}
