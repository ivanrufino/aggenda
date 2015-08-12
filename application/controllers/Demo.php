<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Demo extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->config('pagseguro');
        $this->load->library('pagsegurolibrary/pagseguro', 'pagseguro');
    }

    public function index() {        

        /* Página de Retorno */
        $pgRetorno = base_url('/pagamento/callback');
      //  die($pgRetorno);
        /* Dados Compra */
        $pgCompra = array(
            array(
                'description' => 'Doação pela contribuição',
                'amount' => 1.00,
                'quantity' => 1
            )
        );

        /* Dados Cliente */
        $pgCliente = array();
        $pgCliente['client_name'] = 'Fulano de tals';
        $pgCliente['client_email'] = 'contato@sandbox.pagseguro.com.br';
        $pgCliente['client_ddd'] = '21';
        $pgCliente['client_phone'] = '12346578';

        /* Dados Frete */
        $shipping = array();
        $shipping['frete'] = 3;
        $shipping['cep'] = '78280000';
        $shipping['rua'] = 'Av. Getúlio Vargas';
        $shipping['numero'] = '123';
        $shipping['complemento'] = '';
        $shipping['bairro'] = 'Centro';
        $shipping['cidade'] = 'Cuiabá';
        $shipping['estado'] = 'Mato Grosso';
        $shipping['pais'] = 'Brasil';

        /* Referência (ID da Compra) */
        $pgReference = '5';

        /* Gera URL da Pagamento */
        $paymentURL = $this->pagseguro->requestPayment($pgCompra, $pgCliente, $pgReference, $shipping, $pgRetorno);
      
         $code= explode("=", $paymentURL)['1'];
         $dados['code']=$code;

      //  die($code);
        $this->load->view('pagamento',$dados);
        
    }
    public function teste($codigo) {
       
        $retorno = $this->pagseguro->getRetorno($codigo,'transaction');
        //$retorno =  xml($retorno);
        // $retorno =(array)$retorno;
       // $data = $retorno['PagSeguroTransactiondate'];
       // echo $data;
        echo "<pre>";
        //print_r ($retorno->grossAmount);
        //$retorno = $retorno->toString();
        print_r($retorno);// $retorno;
       // echo $retorno['date'];
        
        echo "</pre>";
    }
    public function callback() {
        
    }
}

/* End of file demo.php */
/* Location: ./application/controllers/demo.php */