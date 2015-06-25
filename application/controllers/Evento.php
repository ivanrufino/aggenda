<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {

    private $cod_associado;

    function __construct() {
        parent::__construct();
        $this->cod_associado = $this->session->userdata('CODIGO');
        $this->load->model('Agenda_model', 'agenda');
    }

    public function index() {
        
    }

    public function getEventos($servico = NULL, $funcionario = NULL) {
        //  echo "servico: $servico"; echo $funcionario;
        $dados = $this->agenda->getAgenda($this->cod_associado);
        echo json_encode($dados);
    }

    public function getFuncSalas($servico) {
        $agendadores = $this->agenda->getFuncSala($servico);
        $ret = array();
        if (!$agendadores) {
            $ret = "<option value=''>Não Disponivel<option>";
        } else {
            foreach ($agendadores as $agendador) {
                $ret = "<option value='{$agendador['CODIGO']}'>{$agendador['NOME']}<option>";
            }
        }
        echo $ret;
    }

    public function criarEvento() {
        $this->form_validation->set_rules('cod_funcionario_sala', 'Agenda de', 'required');
        $this->form_validation->set_rules('cliente', 'Cliente', 'is_natural_no_zero');
        $this->form_validation->set_rules('dataStart', 'Data', 'required');
        $this->form_validation->set_rules('timeStart', 'Tempo Inicial', 'required');
        $this->form_validation->set_rules('timeEnd', 'Tempo Final', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<span class="error">', '</span>');
        } else {
            //colocar cadastro aqui;
            echo "legal";
            
        }
        print_r($this->input->post());
    }

}

// Evento.php