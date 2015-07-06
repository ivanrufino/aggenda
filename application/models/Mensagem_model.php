<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mensagem_model extends CI_Model{
     
    public function getMensagem($cod_associado,$limit=NULL,$id=null) {
         $this->db->select('*');
        $this->db->from('v_mensagens');
        $this->db->where('COD_ASSOCIADO', $cod_associado);
        if(!is_null($limit)){
            $this->db->limit($limit);
        }
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
    public function getNumMensagemHoje($cod_associado) {
        $this->db->select('*');
        $this->db->from('v_mensagens');
        $this->db->where('COD_ASSOCIADO', $cod_associado);
        $this->db->where('DATA', 'Hoje');
       
        return $this->db->count_all_results();
         die($this->db->last_query());
    }
    public function novoMensagem($dados) {


    }
    public function alteraMensagem($id, $dados) {

    }
    public function excluirMensagem($id) {

    }
}
