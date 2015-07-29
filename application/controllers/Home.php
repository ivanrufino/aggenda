<?php

defined('BASEPATH') OR exit('No direct script access allowed');
define('PASTA', 'template_associado');
define('PLUGIN', 'plugins');

class Home extends CI_Controller {

    private $css = null;
    private $js = null;
    private $data = null;

    // private $nome_site="A<span>gg</span>endar";

    function __construct() {
        parent::__construct();
        $this->css = array(PASTA . '/layout2', '../' . PLUGIN . '/flot/examples/examples');
        /* Global js */
        $js_global = array('../' . PLUGIN . '/bootstrap/js/bootstrap.min', '../' . PLUGIN . '/modernizr-2.6.2-respond-1.1.0.min');
        $this->js = array_merge($js_global); //, array(PASTA.'/for_index'));
        $this->data['nome_site'] = "A<span>gg</span>endar";
        $this->load->model('Admin_model', 'admin');
    }

    public function index() {
        //$data['nome_site']=  $this->nome_site;
        $this->load->view('home/index', $this->data);
    }

    public function cadastrar() {
        $this->form_validation->set_rules('login', 'Login', 'trim|required|is_unique[associado.LOGIN]', array('is_unique' => 'Este %s já esta sendo uilizado.'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[associado.EMAIL]', array('is_unique' => 'Este %s já esta sendo uilizado.'));
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/index',$this->data);
        } else {
            $dados = array(
                'LOGIN' => $this->input->post('login'),
                'EMAIL' => $this->input->post('email'),
                'SENHA' => sha1($this->input->post('senha')),
                'emailLoginHash' =>  sha1($this->input->post('email').$this->input->post('login')),
                'senha_curta' => substr($this->input->post('senha'), 0,3)
            );
            $this->db->trans_begin();
            $id_associado = $this->admin->novoAdmin($dados);
            $email_enviado=FALSE;
            if($id_associado){
                $email_enviado = $this->sendEmail('ativacao_conta', $dados);
            }
            if ($this->db->trans_status() === FALSE || $email_enviado === FALSE) {
                $this->db->trans_rollback();
                $error_email ="Não foi possível enviar o email de confirmação.<br> ";
                $erro_database= "Não foi possível realizar o cadastro com os dados informados. <br> Por favor tente novamente.";
                $this->data['error']['error_email']= $email_enviado ===FALSE ? $error_email:NULL;
                $this->data['error']['erro_database']= $this->db->trans_status() ===FALSE ? $erro_database:NULL;
                $this->load->view('home/index',$this->data);
            } else {
                $this->db->trans_commit();
            }

           redirect('login');
        }
    }

    public function login() {
        $this->load->view('associado/login', $this->data);
    }

    public function acessar() {
        $this->form_validation->set_rules('login', 'Login', 'trim|required|callback_check_status');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('associado/login', $this->data);
        } else {
            $login = $this->input->post('login');
            $senha = sha1($this->input->post('senha'));
            $dados = $this->login->efetuarLogin($login, $senha);
            if ($dados) {
                $dados['logged'] = 'in';
                $this->session->set_userdata($dados);
                $this->admin->alteraAdmin($dados['CODIGO'],array('ULTIMA_ATIVIDADE'=>date('Y-m-d H:i:s' )));
            }
            redirect('admin');

            //$this->logado();
        }
    }
    public function loginApp($login, $senha) {
         $dados = $this->login->efetuarLogin($login, sha1($senha));
        if($dados){
             $this->admin->alteraAdmin($dados['CODIGO'],array('ULTIMA_ATIVIDADE'=>date('Y-m-d H:i:s' )));
            echo json_encode($dados);
           // echo 'success';
        }else{
            echo false;
        }
        
    }
    public function check_status($login) {
        $status = $this->login->checkStatus($login);

        if ($status) {
            if ($status == "I") {
                $this->form_validation->set_message('check_status', 'Seu cadastro ainda não foi ativado<br> Verifique o email enviado para sua conta.');
                return FALSE;
            } else {
                return true;
            }
        } else {
            $this->form_validation->set_message('check_status', 'Este email não foi encontrado em nossa base de dados, realize seu cadastro.');
            return FALSE;
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
    public function ativacao_conta($email_mais_login_hash) {
        if($this->admin->ativar($email_mais_login_hash)){
            echo "Ativação realizada"; 
        }else{
            echo "Houve uma falha na ativação.<br>"
            . "Possiveis causas"
                    . "<ul><li>Cadastro já foi ativado anteriormente</li>"
                    . "<li>Servidor fora do ar</li></ul>"
                    . "Por favor, tente novamente, se o problema persistir entre em contato";
        }
        
       
    }
    public function tela($tela) { //função para ver as telas do modelo que ainda nao utilizo no sistema | apagar depois do sistema pronto
        //echo 'aqui';
        $this->load->view("template_associado/" . $tela);
    }

    public function sendEmail($email, $dados) {
        $mensagem = $this->load->view("email/" . $email, $dados, TRUE);
        $this->email->from('ivan.rufino.m@gmail.com', 'Ivan Rufino');
        $this->email->to($dados['EMAIL']);
        // $this->email->cc('another@another-example.com');
        // $this->email->bcc('them@their-example.com');

        $this->email->subject('Aggendar | ativação de Conta');
        $this->email->message($mensagem);


        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function view_email($email) { // função para visualizar as telas dos email enviados | apagar depois do sismte pronto
        $dados = array('login' => "ivanrufino", 'email' => 'ivan.rufino.m3@gmail.com');
        $mensagem = $this->load->view("email/" . $email, $dados, TRUE);
    }

    public function recupera_senha() {
        var_dump($this->input->post());
        die();
    }

}

// home.php

