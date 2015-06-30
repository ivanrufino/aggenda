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

    public function criarEvento($admin=true) {
        $this->form_validation->set_rules('cod_funcionario_sala', '<strong>Agenda de</strong>', 'required');
        $this->form_validation->set_rules('cliente', 'Cliente', 'required');
        $this->form_validation->set_rules('dataStart', '<strong>Data</strong>', 'required|callback_date_invalid');
        $this->form_validation->set_rules('dataEnd', '<strong>Data</strong>', 'required');
        $this->form_validation->set_rules('timeStart', '<strong>Tempo Inicial</strong>', 'required|callback_time_invalid');
        $this->form_validation->set_rules('timeEnd', '<strong>Tempo Final</strong>', 'required');

        if ($this->form_validation->run() == FALSE) {
            
            $erros=  validation_errors('<div class="alert alert-danger">', '</div>');
            $data=array('success'=>FALSE,'erros'=>$erros);
             echo json_encode($data);
        } else {
            $confirmado=$admin? '1':'0';
            $ALLDAY= $this->input->post('allday')=="Dia_Todo"? TRUE:FALSE;
                
            $dados=array(
                'COD_CLIENTE'=>  $this->input->post('cliente'),
                'START'=>$this->input->post('dataStart')." ".$this->input->post('timeStart'),
                'END'=>$this->input->post('dataEnd')." ".$this->input->post('timeEnd'),
                'COD_FUNCIONARIO_SALA'=>$this->input->post('cod_funcionario_sala'),
                'ALLDAY'=>$ALLDAY,
                'CONFIRMADO'=>$confirmado,
            );
               $id =  $this->agenda->novoAgendamento($dados);
               
            if ($id){
                $data=array('success'=>true,'msg'=>"<br><span class='alert alert-success'>Evento criado com sucesso</span>");
//                $evento = "Novo agendamento";
//                
//                
//                if ( $this->input->post('allday')=="Dia_Todo"){
//                    $start=$this->input->post('dataStart');
//                    $end=$this->input->post('dataEnd');
//                    $allday=" ";
//                }else{
//                    $start=$this->input->post('dataStart')."T".$this->input->post('timeStart');
//                    $end=$this->input->post('dataEnd')."T".$this->input->post('timeEnd');
//                    
//                    $allday=false;
//                }
                $data['evento'] = $this->agenda->getAgenda($this->cod_associado,$id)[0];
                
//                $data['evento']=array(
//                    'start'=>$start,
//                    'end'=>$end,
//                    'allday'=>$allday,
//                    'evento'=>$evento);
            }else{
                $data=array('success'=>FALSE,'erros'=>'Não foi possivel criar este agendamento');
            }
            die(json_encode($data));
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