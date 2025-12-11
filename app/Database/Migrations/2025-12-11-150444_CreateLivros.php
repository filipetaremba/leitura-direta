<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLivros extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'titulo' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'arquivo' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'usuario_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('usuario_id', 'usuarios', 'id');

        $this->forge->createTable('livros');
    }

    public function down()
    {
        $this->forge->dropTable('livros');
    }
}
