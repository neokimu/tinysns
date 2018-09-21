<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_table extends  CI_Migration {
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function up()
    {
        $this->dbforge->add_field(array(
                        'uq_number' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unique' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'id' => array(
                                'type' => 'CHAR',
                                'constraint' => '20',
                        ),
                        'password' => array(
                                'type' => 'varchar',
                                'constraint' => '80'
                        ),
                        'email' => array(
                                'type' => 'varchar',
                                'constraint' => '80'
                        ),
                        'm_photo' => array(
                                'type' => 'varchar',
                                'constraint' => '100',
                                'null' => TRUE,
                                'default' => ''
                        ),
                        'profile' => array(
                                'type' => 'varchar',
                                'constraint' => '500',
                                'null' => TRUE
                        ),
                        'm_category' => array(
                                'type' => 'char',
                                'constraint' => '8'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('member');
                echo 'memberを作成しました。'.PHP_EOL;
                
        $this->dbforge->add_field(array(
                        'p_number' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'auto_increment' => TRUE
                        ),
                        'id' => array(
                                'type' => 'varchar',
                                'constraint' => '20',
                        ),
                        'title' => array(
                                'type' => 'varchar',
                                'constraint' => '100'
                        ),
                        'p_photo' => array(
                                'type' => 'varchar',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        'p_text' => array(
                                'type' => 'varchar',
                                'constraint' => '500',
                        ),
                        'p_category' => array(
                                'type' => 'char',
                                'constraint' => '6'
                        ),
                        'like_num' => array(
                                'type' => 'int',
                                'constraint' => '11',
                                'null' => TRUE,
                                'default' => '0'
                        ),
                        'p_date' => array(
                                'type' => 'datetime'
                        )            
                ));
                $this->dbforge->add_key('p_number', TRUE);
                $this->dbforge->create_table('post');
                echo 'postを作成しました。'.PHP_EOL;
                $sql = <<<SQL
                        ALTER TABLE post ADD CONSTRAINT post_fk FOREIGN KEY (id) REFERENCES member(id) ON DELETE CASCADE
SQL;
                $this->db->query($sql);
                echo 'postの外部キーを追加しました。'.PHP_EOL;
                
        $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'varchar',
                                'constraint' => '20',
                        ),
                        'request_id' => array(
                                'type' => 'varchar',
                                'constraint' => '500',
                                'null' => TRUE
                        ),
                        'friends_id' => array(
                                'type' => 'varchar',
                                'constraint' => '500',
                                'null' => TRUE
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('friends');
                echo 'frinendsを作成しました。'.PHP_EOL;
                $sql = <<<SQL
                        ALTER TABLE friends ADD CONSTRAINT friends_fk FOREIGN KEY (id) REFERENCES member(id) ON DELETE CASCADE
SQL;
                $this->db->query($sql);
                echo 'friebdsの外部キーを追加しました。'.PHP_EOL;

    }
    
    public function down()
    {
            $this->dbforge->drop_table('friends');
            echo 'frinendsを削除しました。'.PHP_EOL;
            $this->dbforge->drop_table('post');
            echo 'postを削除しました。'.PHP_EOL;
            $this->dbforge->drop_table('member');
            echo 'memberを削除しました。'.PHP_EOL;
    }
}
