<?php

defined('BASEPATH') OR exit('No direct script access allowed');
define('PASTA', 'template_associado');
define('PLUGIN', 'plugins');

class Home extends CI_Controller {
    private $css = null;
    private $js = null;
    private $nome_site="A<span>gg</span>endar.com";

    function __construct() {
        parent::__construct();
        $this->css = array(PASTA . '/layout2', '../' . PLUGIN . '/flot/examples/examples');
        /* Global js */
        $js_global = array('../' . PLUGIN . '/bootstrap/js/bootstrap.min', '../' . PLUGIN . '/modernizr-2.6.2-respond-1.1.0.min');
        $this->js = array_merge($js_global); //, array(PASTA.'/for_index'));
        
    }

    public function index() {
        $data['nome_site']=  $this->nome_site;
        $this->load->view('home/index',$data);
    }

    public function cadastrar() {
        $this->form_validation->set_rules('login', 'Login', 'trim|required|is_unique[associado.LOGIN]', array('is_unique' => 'Este %s já esta sendo uilizado.'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[associado.EMAIL]', array('is_unique' => 'Este %s já esta sendo uilizado.'));
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/index');
        } else {
            //colocar cadastro aqui;
            redirect('login');
            
        }
    }

    public function login() {
        $data['nome_site']=  $this->nome_site;
        $this->load->view('associado/login',$data);
    }
   

    public function acessar() {
        $this->form_validation->set_rules('login', 'Login', 'trim|required|callback_check_status');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('associado/login');
        } else {
            $login =  $this->input->post('login');
            $senha =  sha1($this->input->post('senha'));
            $dados=$this->login->efetuarLogin($login,  $senha);
            if($dados){
                $dados['logged']='in';
                $this->session->set_userdata($dados);
                
            }
            redirect('admin');
            
            //$this->logado();
        }
    }

    public function check_status($login) {
        $status = $this->login->checkStatus($login);
        
        if($status){        
            if ($status=="I") {
            $this->form_validation->set_message('check_status', 'Seu cadastro ainda não foi ativada<br> Verifique o email enviado para sua conta.');
            return FALSE;
            } else {
                return true;
            }
        }else {
             $this->form_validation->set_message('check_status', 'Este email não foi encontrado em nossa base de dados, realize seu cadastro.');
            return FALSE;
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
    public function tela($pasta,$tela) {
        //echo 'aqui';
        $this->load->view("template_associado/".$tela);
    }
}

// home.php

