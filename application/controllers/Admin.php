<?php

defined('BASEPATH') OR exit('No direct script access allowed');
define('PASTA', 'template_associado');
define('PLUGIN', 'plugins');

class Admin extends CI_Controller {

    private $cod_associado;
    private $css = null;
    private $js = null;
    private $tela = null; //telas do template
    private $data = null; //dados com variaveis para a tela

    function __construct() {
        parent::__construct();
        $this->css = array(PASTA . '/layout2', '../' . PLUGIN . '/flot/examples/examples');
        /* Global js */
        $js_global = array('../' . PLUGIN . '/bootstrap/js/bootstrap.min', '../' . PLUGIN . '/modernizr-2.6.2-respond-1.1.0.min', 'jquery.form');
        $this->js = array_merge($js_global); //, array(PASTA.'/for_index'));
        if (!$this->session->has_userdata('logged') || $this->session->userdata('logged') != 'in') {
            redirect('login');
        }
        $this->cod_associado = $this->session->userdata('CODIGO');
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Agenda_model', 'agenda');
        if (is_null($this->data['associado'])) {
            $this->data['associado'] = $this->admin->getAdmin($this->cod_associado);
        }
    }

    public function index() {
        $this->dadosComuns();
        $this->data['titulo'] = 'Aggenda.com | admin > Calendário';
        $this->tela['agendamento'] = ('modal/agendamento');
        $this->tela['lateralDireita'] = ('associado/vazio');
        if (is_null($this->data['associado']['COD_EMPRESA'])) {
            $this->tela['conteudo'] = ('associado/config_inicial');
            $this->tela['menu'] = ('associado/menu_vazio');
        } else {
            $this->tela['conteudo'] = ('associado/calendario');
            $this->data['servicos'] = $this->agenda->getServicos($this->cod_associado);
            $this->data['horario'] = $this->agenda->getHorario($this->cod_associado);
        }

        $this->parser->mostrar('template/template_associado.php', $this->tela, $this->data);
    }

    public function importacao() {
        $this->load->helper('file');
        $string = read_file('./assets/importacao/usuario.csv');
        $row = 1;
        $array = array();
        $handle = fopen('./assets/importacao/usuario.csv', "r");
        while (($data = fgetcsv($handle, 2000, ",")) !== FALSE) {
            $num = count($data);
            echo "<p> $num campos na linha $row: <br /></p>\n";
            $row++;
            for ($c = 0; $c < $num; $c++) {
                echo $data[$c] . "<br />\n";
            }
            $array[] = $data;
        }
        fclose($handle);
        print_r($array);
        echo "importação";
    }

    public function painel() {
        $this->dadosComuns();
        $this->data['titulo'] = 'Aggenda.com | admin > Painel';
        $this->tela['conteudo'] = 'vazio';
        $this->tela['menu'] = 'associado/menu';
        $this->tela['lateralDireita'] = 'associado/lateralDireita';        

        $this->parser->mostrar('template/template_associado.php', $this->tela, $this->data);
    }

    public function Clientes() {
        $this->dadosComuns();

        $this->data['titulo'] = 'Aggenda.com | admin > Clientes';
        $this->tela['conteudo'] = 'vazio';
        $this->tela['lateralDireita'] = 'associado/lateralDireita';       

        $this->parser->mostrar('template/template_associado.php', $this->tela, $this->data);
    }

    public function dadosComuns() {
        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->data['num_servico'] = $this->agenda->getNumServicos($this->cod_associado);
        $this->tela['menu'] = 'associado/menu';
        
    }

}

// Admin.php
