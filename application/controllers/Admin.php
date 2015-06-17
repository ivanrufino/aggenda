<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('PASTA', 'template_associado');
define('PLUGIN', 'plugins');
class Admin extends CI_Controller{
    private $cod_associado;
    private $css = null;
    private $js = null;
     function __construct() {
         parent::__construct();
         $this->css = array(PASTA . '/layout2', '../' . PLUGIN . '/flot/examples/examples');
        /* Global js */
        $js_global = array('../' . PLUGIN . '/bootstrap/js/bootstrap.min', '../' . PLUGIN . '/modernizr-2.6.2-respond-1.1.0.min');
        $this->js = array_merge($js_global); //, array(PASTA.'/for_index'));
         if(!$this->session->has_userdata('logged') || $this->session->userdata('logged')!='in' ){
             redirect('login');
         }
         $this->cod_associado = $this->session->userdata('CODIGO');
    }
    public function index() {
        $data['titulo'] = 'Aggenda.com | admin' ;
        //$tela['conteudo'] = ('associado/dashboard');
        if(is_null($this->session->userdata('COD_EMPRESA'))){
            $tela['conteudo'] = ('associado/config_inicial');
            $data['associado'] = $this->associado->getAdmin($this->cod_associado);
        }
        echo"<pre>";
        print_r($this->session->userdata());
        echo "</pre>";
        die();
        $tela['menu'] = ('associado/menu');
        if(true){
        $tela['conteudo'] = ('associado/config_inicial');
        }
        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('template/template_associado.php', $tela, $data);
    }
    
}
// Admin.php