<?php //
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model{
     
    public function getAdmin($id) {
        $this->db->select('*');
        $this->db->from('v_associado_completo');
        $this->db->where('CODIGO', $id);
        $query = $this->db->get();        
       // echo $this->db->last_query(); die();
        
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{ 
            return FALSE;
        } 
    }
    public function novoAdmin($dados) {
        unset($dados['senha_curta']);
        unset($dados['emailLoginHash']);
        $dados['NOME_RESPONSAVEL']=$dados['SOBRENOME_RESPONSAVEL']="";
       if ($this->db->insert('associado', $dados)){
          return $this->db->insert_id();
        }else{
            return false;
        }
    }
    public function ativar($emailLogin) {
        $dados['STATUS']='A';
        $this->db->where('sha1(concat(EMAIL,LOGIN))', $emailLogin);
        $this->db->update('associado', $dados);
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;
        
    }
    public function alteraAdmin($id, $dados) {
        $this->db->where('CODIGO', $id);
        $this->db->update('associado', $dados);
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;
    }
    public function excluirAdmin($id) {

    }
    public function getVersao() {
        $this->db->select('*');
        $this->db->from('v_versao');
        $this->db->limit('1');
        $query = $this->db->get();        
       // echo $this->db->last_query(); die();
        
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{ 
            return FALSE;
        } 
    }
}
