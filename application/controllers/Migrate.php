<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migrate extends CI_Controller{
     function __construct() {
         parent::__construct();
        
    }
    public function index() {
        $this->load->library('migration');
        $versaoAtual= 3;
       print_r($this->migration->find_migrations()); 
         //$this->migration->version(2);
                if ($this->migration->current() === FALSE)
                {
                        show_error($this->migration->error_string());
                }
    }
    public function erro404() {
        show_404('asdasd.php');
    }
    
}
// Migrate.php