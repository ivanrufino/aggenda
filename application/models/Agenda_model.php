<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agenda_model extends CI_Model{
     
    public function getAgenda($id=null) {
        $this->db->select('*');
        $this->db->from('v_agendamento');
      //  $this->db->where('CODIGO', $id);
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
