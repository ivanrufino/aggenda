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
        $this->load->model('Mensagem_model', 'mensagem');
        if (is_null($this->data['associado'])) {
            $this->data['associado'] = $this->admin->getAdmin($this->cod_associado);
        }
    }

    public function index() {
        $this->dadosComuns();
        //die($this->session->userdata('ULTIMA_ATIVIDADE'));
        $this->data['titulo'] = 'Aggenda.com | admin > Calendário';
        $this->tela['agendamento'] = ('modal/agendamento');
        $this->tela['lateralDireita'] = ('associado/vazio');
        if (is_null($this->data['associado']['COD_EMPRESA'])) {
            $this->data['segmentos']= $this->admin->getSegmentos();
            $this->tela['conteudo'] = ('associado/config_inicial');
            $this->tela['menu'] = ('associado/menu_vazio');
        } else {
            $this->tela['conteudo'] = ('associado/calendario');
            //$this->data['servicos'] = $this->agenda->getServicos($this->cod_associado);
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
    public function updateConfigInicial() {
         $this->form_validation->set_rules('nome', 'Razão Social', 'trim|required|is_unique[empresa.NOME]', array('is_unique' => 'Este %s já esta sendo utilizado.'));
         
         $this->form_validation->set_rules('nome_responsavel', 'Nome', 'trim|required');
         $this->form_validation->set_rules('sobrenome_responsavel', 'Sobrenome', 'trim|required');
         $this->form_validation->set_rules('url', 'URL', 'trim|required|min_length[5]|max_length[15]|alpha_dash');
         $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');
         if($this->input->post('segmento') == 25){
                     $this->form_validation->set_rules('area', 'Descrição', 'trim|required');
         }
         if($this->input->post('tipo')=='J'){
            $this->form_validation->set_rules('cnpj', 'CNPJ', 'trim|required|is_unique[empresa.CNPJ]', array('is_unique' => 'Este %s já esta sendo utilizado.'));
         }else{
             $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|is_unique[empresa.CPF]', array('is_unique' => 'Este %s já esta sendo utilizado.'));
         }
         
         $this->form_validation->set_rules('cep', 'CEP', 'trim|required');
         $this->form_validation->set_rules('endereco', 'Endereço', 'trim|required');
         $this->form_validation->set_rules('bairro', 'Bairro', 'trim|required');
         $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
         $this->form_validation->set_rules('estado', 'Estado', 'trim|required');
         
         $this->data['step']=0; 
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
        $empresa = array(
                'NOME'  =>  $this->input->post('nome'),
                'TIPO'  =>  $this->input->post('tipo'), 
                'CNPJ'  =>  $this->input->post('tipo')=='J'? $this->input->post('cpf_cnpj'):"",
                'CPF'   =>  $this->input->post('tipo')=='F'? $this->input->post('cpf_cnpj'):"",
                'AREA'   =>  $this->input->post('area'),
                'SEGMENTO'=>  $this->input->post('segmento')!='25'? $this->input->post('segmento'):$this->input->post('segmento2'),
                'URL'   =>  $this->input->post('url'),
               // 'LOGO'  =>  $this->input->post(''),
                'TELEFONE'=>  $this->input->post('telefone'), 
        );
        
        $endereco =array(
                'COD_ASSOCIADO'=> $this->cod_associado,
                'CEP'       =>  $this->input->post('cep'),
                'ENDERECO'    =>  $this->input->post('endereco'),
                'BAIRRO'    =>  $this->input->post('bairro'),
                'CIDADE'    =>  $this->input->post('cidade'),
                'ESTADO'    =>  $this->input->post('estado')
        );
        $horario = array(
                'COD_ASSOCIADO' => $this->cod_associado,  
                'HORA_INICIO'   =>min( $this->input->post('hora_inicio')),
                'HORA_FIM'      =>max($this->input->post('hora_fim')),
                'DIAS_DE_TRABALHO'=>"[". implode(",", $this->input->post('dias_de_trabalho'))."]"
        );
        $servico=array();
        $array_serv=$this->input->post('servico');
        $array_valor=$this->input->post('valor');
        $array_obs=$this->input->post('obs');
        foreach ($array_serv as $chave => $serv) {
           $servico[]=array(
                'COD_ASSOCIADO'=> $this->cod_associado,
                'NOME'  =>  $array_serv[$chave],
                'VALOR' =>  $array_valor[$chave]==""? '0':$array_valor[$chave],
                'OBS'   =>  $array_obs[$chave],
                'LOGO'  =>  " "
           );
        }

       $funcionario =array();
       foreach ($this->input->post('nome_funcionario') as $key => $func) {
           $funcionario[]=array(
                'NOME'      =>  $this->input->post('nome_funcionario')[$key],
                'DESCRICAO' =>  $this->input->post('descricao')[$key],
                'FOTO'  => ""
       );
           
       }
        $associado = array(
                'NOME_RESPONSAVEL'  =>  $this->input->post('nome_responsavel'),
                'SOBRENOME_RESPONSAVEL' =>  $this->input->post('sobrenome_responsavel'),
               
                );
        
        $this->db->trans_begin();
             $cod_empresa = $this->admin->novaEmpresa($empresa);
             $associado['COD_EMPRESA']=$cod_empresa;
             $this->admin->novoEndereco($endereco);
             $this->admin->novoHorario($horario);
             $this->admin->novoServico($servico);
             $this->admin->novoFuncionario($funcionario);
             $this->admin->alteraAdmin($this->cod_associado, $associado);
             
        if ($this->db->trans_status() === FALSE ) {
            $this->db->trans_rollback();
            echo "não foi";
        }else{
            $this->db->trans_commit();
            echo "foi";
        }
        
        echo "<pre>";
        echo $this->db->trans_status();
        //print_r($this->input->post());
        echo "</pre>";
    }
    }
    public function dadosComuns() {
        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->data['iniciais']= $this->Iniciais( $this->data['associado']['NOME'],FALSE);
        $this->data['servicos'] = $this->agenda->getServicos($this->cod_associado);
        $this->data['func_salas'] = $this->agenda->getAllFuncSala($this->cod_associado);
        $this->data['agenda'] = $this->agenda->getAgenda($this->cod_associado);
        $this->data['mensagens'] = $this->mensagem->getMensagem($this->cod_associado,'3');
        $this->data['versao'] = $this->admin->getVersao();
        
        $this->data['num_servico'] = count($this->data['servicos']); //$this->agenda->getNumServicos($this->cod_associado);
        $this->data['num_func_sala'] = count($this->data['func_salas']);
        $this->data['num_mensagem_hoje']=  $this->mensagem->getNumMensagemHoje($this->cod_associado);
        $limite_agendamento=50; // temporario
        $this->data['num_agendamento'] = count($this->data['agenda'])." de ".$limite_agendamento;
        $this->data['num_agendamento_percent'] =$this->data['num_agendamento']/ $limite_agendamento*100;
        
        $this->data['num_cliente'] = 12;
        $this->tela['menu'] = 'associado/menu';
       
    }
    public function Iniciais($nome,$minusculas = true){
	preg_match_all('/\s?([A-Z])/',$nome,$matches);
	$ret = implode('',$matches[1]);
	return $minusculas?
		strtolower($ret) :
		$ret;
    }
    

}

// Admin.php
