<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    private $cod_associado = null;
    private $css = null;
    private $js = null;

    function __construct() {
        parent::__construct();
        $this->css = array('bootstrap.min', 'font-awesome.min', 'template/styles');
        $this->js = array('jquery', 'bootstrap.min', 'template/scripts');
    }

    public function index($cor='blue') {
        $data['estilo']['cor'] ='#FFC0EB';
        $data['estilo']['borda'] ='#B286A4';
        $data['estilo']['cor_letra'] ='#231A20';
        $data['estilo']['cor_corpo'] ='#F7F2F5';
        $data['estilo']=NULL;
        $tela[] = NULL;
        $this->css[]='template/padrao_cor_'.$cor;
        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('template/template_home.php', $tela, $data);
    }

    public function getEmpresa($codigo, $action = 'home') {
        $this->cod_associado = $codigo;
        $action = "_" . $action;
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            show_404();
        }
        
    }

    public function _home() {
        echo 'aqui';
    }

    public function _servicos() {
        echo "serviços de " . $this->cod_associado;
    }

}

// agenda.php