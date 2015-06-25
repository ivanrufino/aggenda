<?php

defined('BASEPATH') OR exit('No direct script access allowed');
define('PASTA', 'template_associado');
define('PLUGIN', 'plugins');

class Admin extends CI_Controller {

    private $cod_associado;
    private $css = null;
    private $js = null;

    function __construct() {
        parent::__construct();
        $this->css = array(PASTA . '/layout2', '../' . PLUGIN . '/flot/examples/examples');
        /* Global js */
        $js_global = array('../' . PLUGIN . '/bootstrap/js/bootstrap.min', '../' . PLUGIN . '/modernizr-2.6.2-respond-1.1.0.min');
        $this->js = array_merge($js_global); //, array(PASTA.'/for_index'));
        if (!$this->session->has_userdata('logged') || $this->session->userdata('logged') != 'in') {
            //redirect('login');
        }
        $this->cod_associado = $this->session->userdata('CODIGO');
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Agenda_model', 'agenda');
    }

    public function index() {
        $data['associado'] = $this->admin->getAdmin($this->cod_associado);
        $data['titulo'] = 'Aggenda.com | admin';
        $data['servicos'] = $this->agenda->getServicos($this->cod_associado);
        $tela['agendamento'] = ('modal/agendamento');
        $tela['conteudo'] = ('associado/calendario');
        $tela['menu'] = ('associado/menu');
        $tela['lateralDireita'] = ('associado/lateralDireita');
        
        if(is_null($data['associado']['COD_EMPRESA'])){          
            $tela['conteudo'] = ('associado/config_inicial');
            $tela['menu'] = ('associado/menu_vazio');
            $tela['lateralDireita'] = ('associado/vazio');
        }
        //$dados['COD_EMPRESA']=$data['associado']['COD_EMPRESA'];
        //$this->session->set_userdata($dados);


        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('template/template_associado.php', $tela, $data);
    }
    public function getEventos($servico = NULL, $funcionario=NULL) {
      //  echo "servico: $servico"; echo $funcionario;
        $dados = $this->agenda->getAgenda($this->cod_associado);
//        foreach ($dados as $key =>  $value) {
//            $extra = unserialize($value['EXTRA']);
//            $dados[$key]= array_merge($dados[$key],$extra)  ;
//            unset($dados[$key]['EXTRA']);
//        }
        
//        $dados=array(
//            array(
//                    'id'=> '01',
//                    'title'=> 'Repeating Event',
//                    'start'=> '2015-06-22T11:45:00',
//                    'end'=> '2015-06-22T12:30:00',
//                    'backgroundColor'=>'beige',
//                    'textColor'=>'black',
//                    'rendering'=>'',
//                    'constraint'=>'businessHours',
//                    'editable' =>false
//                    ),
//            array(
//                    'id'=> '02',
//                    'title'=> 'Repeating Event',
//                    'start'=> '2015-06-22T12:45:00',
//                    'end'=> '2015-06-22T13:30:00',
//                    'backgroundColor'=>'gray',
//                    'textColor'=>'fff'))
//                ;
        echo json_encode($dados);
       
    }
    public function importacao() {
        $this->load->helper('file');
        $string = read_file('./assets/importacao/usuario.csv');
        $row = 1;
        $array=array();
        $handle = fopen('./assets/importacao/usuario.csv', "r");
        while (($data = fgetcsv($handle, 2000, ",")) !== FALSE) {
            $num = count($data);
            echo "<p> $num campos na linha $row: <br /></p>\n";
            $row++;
            for ($c = 0; $c < $num; $c++) {
                echo $data[$c] . "<br />\n";
            }
            $array[]= $data ;
        }
        fclose($handle);
        print_r($array);
        echo "importação";
    }

    public function painel() {
         $data['associado'] = $this->admin->getAdmin($this->cod_associado);
        $data['titulo'] = 'Aggenda.com | admin' ;
        $tela['conteudo'] = 'vazio';
        $tela['menu'] = 'associado/menu';
        $tela['lateralDireita'] = 'associado/lateralDireita';
        
        
        //$dados['COD_EMPRESA']=$data['associado']['COD_EMPRESA'];
        //$this->session->set_userdata($dados);
        

        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('template/template_associado.php', $tela, $data);
    }
    public function Clientes() {
         $data['associado'] = $this->admin->getAdmin($this->cod_associado);
        $data['titulo'] = 'Aggenda.com | admin' ;
        $tela['conteudo'] = 'vazio';
        $tela['menu'] = 'associado/menu';
        $tela['lateralDireita'] = 'associado/lateralDireita';
        
        
        //$dados['COD_EMPRESA']=$data['associado']['COD_EMPRESA'];
        //$this->session->set_userdata($dados);
        

        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('template/template_associado.php', $tela, $data);
    }
}

// Admin.php
