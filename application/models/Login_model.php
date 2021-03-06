<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{
     
    public function efetuarLogin($login, $senha) {
        $this->db->select('CODIGO,COD_EMPRESA,ULTIMA_ATIVIDADE');
        $this->db->from('associado');
        $this->db->where('EMAIL', $login);
        $this->db->or_where('LOGIN', $login);
        $this->db->where('SENHA', $senha);
        $query = $this->db->get();
        
      //  echo $this->db->last_query(); die();
        
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{ 
            return FALSE;
        }
    }
    public function checkStatus($login) {
        
        $this->db->select("STATUS");
        $this->db->from("associado");
        $this->db->where("EMAIL", "$login"); 
        $this->db->or_where("LOGIN ", "$login");
        $query = $this->db->get();
        
      //  echo $this->db->last_query(); die();
        
        if($query->num_rows() > 0){
            return $query->row_array()['STATUS'];
        }else{ 
            return FALSE;
        }
    }
    
}
