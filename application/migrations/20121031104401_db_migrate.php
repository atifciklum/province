<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_db_migrate extends CI_Migration {

        public function up()
        {
                
                $this->dbforge->add_field(array(
                        'ID' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'first_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'last_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'country' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'province' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'user_avatar' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'gender' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                ));
                $this->dbforge->add_key('ID', TRUE);
                $this->dbforge->create_table('province_data');

                //country table

                $this->dbforge->add_field(array(
                        'country_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'country_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                ));
                $this->dbforge->add_key('country_id', TRUE);
                $this->dbforge->create_table('countries');

                $data = [
                        [
                            'country_id' => 1,
                            'country_name' => 'Pakistan'
                        ],
                        [
                            'country_id' => 2,
                            'country_name' => 'India'
                        ]
                    ];
            
                    
                        $this->db->insert_batch('countries', $data);
                    

                     //province table

                     $this->dbforge->add_field(array(
                        'province_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'country_id' => array(
                                'type' => 'INT',
                                'constraint' => '255',
                        ),
                        'province_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        
                ));
                $this->dbforge->add_key('province_id', TRUE);
                $this->dbforge->create_table('provinces');

                $data = array(
                        array(
                            'province_id' => 1,
                            'country_id' => 1,
                            'province_name' => 'Panjab'
                        ),
                        array(
                            'province_id' => 2,
                            'country_id' => 1,
                            'province_name' => 'KPK'
                        ),
                        array(
                            'province_id' => 3,
                            'country_id' => 1,
                            'province_name' => 'Balochistan'
                        ),
                        array(
                            'province_id' => 5,
                            'country_id' => 1,
                            'province_name' => 'Sindh'
                        ),
                        array(
                            'province_id' => 6,
                            'country_id' => 2,
                            'province_name' => 'Haryana'
                        ),
                        array(
                            'province_id' => 7,
                            'country_id' => 2,
                            'province_name' => 'Himachal Pradesh'
                        ),
                        array(
                            'province_id' => 8,
                            'country_id' => 2,
                            'province_name' => 'Jharkhand'
                        )
                    );
            
                    $this->db->insert_batch('provinces', $data);


        }

        public function down()
        {
                $this->dbforge->drop_table('province_data');
                $this->dbforge->drop_table('countries');
                $this->dbforge->drop_table('provinces');
        }
}