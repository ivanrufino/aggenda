<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Aggenda_old extends CI_Migration{
     
    public function up() {
        
    }

    public function down() {
         $this->dbforge->drop_table('shows');
    }

  
}
// 001_aggenda_new.php