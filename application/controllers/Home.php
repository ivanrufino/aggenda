<?php

defined('BASEPATH') OR exit('No direct script access allowed');
define('PASTA', 'template_associado');
define('PLUGIN','plugins');
class Home extends CI_Controller {
    private $cod_associado = null;
    private $css = null;
    private $js = null;
    function __construct() {
        parent::__construct();
        $this->css = array(PASTA.'/layout2','../'.PLUGIN.'/flot/examples/examples');
        /*Global js*/
        $js_global =array('../'.PLUGIN.'/bootstrap/js/bootstrap.min','../'.PLUGIN.'/modernizr-2.6.2-respond-1.1.0.min');
        
        /*local js*/
    //    $jsFloat=array('../'.PLUGIN.'/flot/jquery.flot' ,'../'.PLUGIN.'/flot/jquery.flot.resize' ,'../'.PLUGIN.'/flot/jquery.flot.time' ,'../'.PLUGIN.'/flot/jquery.flot.stack');
        
        
        $this->js = array_merge($js_global);//, array(PASTA.'/for_index'));
        
    }

    public function index() {
        $this->load->view('home/index');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('login', 'Login', 'trim|required|is_unique[associado.LOGIN]',array( 'is_unique'     => 'Este %s já esta sendo uilizado.'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[associado.EMAIL]',array( 'is_unique'     => 'Este %s já esta sendo uilizado.'));
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]');
        if ($this->form_validation->run() == FALSE) {           
            $this->load->view('home/index');
        } else {
            redirect('admin/login');
            //$this->logado();
        }
    }
    public function login() {
        $this->load->view('associado/login');
    }
    public function admin() {
        
        $data[]=NULL;
        $tela['conteudo'] = ('associado/config_inicial');
        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('template/template_associado.php', $tela, $data);
    }

}

// home.php

//<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
//    <link rel="stylesheet" href="assets/css/main.css" />
//    <link rel="stylesheet" href="assets/css/theme.css" />
//    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
//    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
//    
//    <!--END GLOBAL STYLES -->
//
//    <!-- PAGE LEVEL STYLES -->
//    <link href="assets/css/layout2.css" rel="stylesheet" />
//       <link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />
//       <link rel="stylesheet" href="assets/plugins/timeline/timeline.css" />