<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_post'   => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'id_user'   => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
            ],
            'gambar'   => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
                'null'              => true
            ],
            'deskripsi'   => [
                'type'              => 'VARCHAR',
                'constraint'        => 1000,
            ],
            'created_at'   => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'updated_at'   => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'deleted_at'   => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);

        $this->forge->addKey('id_post', true, true);
        $this->forge->addForeignKey('id_user', 'users', 'id');
        $this->forge->createTable('post');
    }

    public function down()
    {
        $this->forge->dropTable('post', true);
    }
}
