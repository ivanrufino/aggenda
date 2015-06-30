<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Plano_model extends CI_Model{
     
    public function getPlano($id=null) {
         $this->db->select('*');
        $this->db->from('plano');
        $this->db->where('CODIGO', $id);
        $query = $this->db->get();        
       // echo $this->db->last_query(); die();
        
        if($query->num_rows() > 0){
            if(!is_null($id)){
                return $query->row_array();
            }
            return $query->result_array();
        }else{ 
            return FALSE;
        } 
    }
    public function novoPlano($dados) {


    }
    public function alteraPlano($id, $dados) {

    }
    public function excluirPlano($id) {

    }
}
