<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Ivan Rufino Martins <>
 */
class login {
    private $login;
    private $senha;
    private $table;

    public function __construct($params){
        $this->login = $params['login'];
        $this->senha = $params['senha'];
        $this->table = $params['table'];
    }
    public function efetuarLogin() {
        
    }
    public function efetuarLogout() {
        
    }
    public function efetuarCadastro() {
        
    }
    public function emailAtivacao() {
        
    }
}
