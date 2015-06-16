<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_segmento_up extends CI_Migration{
     
    public function up() {
        
        $newColumn = array(
            'SLUG' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
        ),
            );
        $alterColumn = array(
            'NOME' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
        ),
           
            );
        $this->dbforge->modify_column('segmento', $alterColumn);
        $this->dbforge->add_column('segmento', $newColumn);
        
    }

    public function down() {
        $this->dbforge->drop_column('segmento','SLUG');
        // $this->dbforge->drop_table('shows');
    }

  
}
// 001_aggenda_new.php