<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataEventsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nim' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
            'instansi' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
            'bima_registered' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'payment_status' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'idEvents' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'timestamp'
            ],
            'updated_at' => [
                'type' => 'timestamp',
                'null' => true
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('idEvents', 'masterevents', 'id', 'cascade', 'null');
        $this->forge->createTable('dataevents');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('dataevents');
        $this->db->enableForeignKeyChecks();
    }
}
