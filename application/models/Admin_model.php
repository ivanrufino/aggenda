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
        //unset($dados['senha_curta']);
        $dados['NOME_RESPONSAVEL']=$dados['SOBRENOME_RESPONSAVEL']="";
       if ($this->db->insert('associado', $dados)){
          return $this->db->insert_id();
        }else{
            return false;
        }
    }
    public function alteraAdmin($id, $dados) {

    }
    public function excluirAdmin($id) {

    }
}
