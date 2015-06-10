<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migrate extends CI_Controller{
     function __construct() {
         parent::__construct();
        
    }
    public function index() {
        $this->load->library('migration');
        $versaoAtual= 2;
       print_r($this->migration->find_migrations()); 
       //  $this->migration->latest();
//                if ($this->migration->current() === FALSE)
//                {
//                        show_error($this->migration->error_string());
//                }
    }
}
// Migrate.php