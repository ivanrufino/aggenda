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
        $this->form_validation->set_rules('cod_funcionario_sala', '<strong>Agenda de</strong>', 'required');
        $this->form_validation->set_rules('cliente', 'Cliente', 'required');
        $this->form_validation->set_rules('dataStart', '<strong>Data</strong>', 'required|callback_date_invalid');
        $this->form_validation->set_rules('timeStart', '<strong>Tempo Inicial</strong>', 'required|callback_time_invalid');
        $this->form_validation->set_rules('timeEnd', '<strong>Tempo Final</strong>', 'required');

        if ($this->form_validation->run() == FALSE) {
            
            $erros=  validation_errors('<div class="alert alert-danger">', '</div>');
            $data=array('success'=>FALSE,'erros'=>$erros);
             echo json_encode($data);
        } else {
            //colocar cadastro aqui;
            $data=array('success'=>true,'msg'=>"<br><span class='alert alert-success'>Evento criado com sucesso</span>");
            echo json_encode($data);
            //echo "<br><span class='alert alert-success'>Arquivo gravado com sucesso</span>";
        }
        
    }

    public function date_invalid($date) {
        if (strtotime($date) < strtotime(date('Y-m-d'))){
        //if ($str == 'test') {
            $this->form_validation->set_message('date_invalid', 'Não pode criar eventos para dias passados');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function time_invalid($time) {
        if (strtotime($time) > strtotime($this->input->post('timeEnd'))){
        //if ($str == 'test') {
            $this->form_validation->set_message('time_invalid', '<strong>Hora de Inicio</strong> não pode ser maior que <strong>Hora Final</strong>');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

// Evento.php