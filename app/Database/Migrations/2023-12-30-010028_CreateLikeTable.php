<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLikeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_like'   => [
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
            'id_post'   => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
            ],
            'status'   => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
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

        $this->forge->addKey('id_like', true, true);
        $this->forge->addForeignKey('id_user', 'users', 'id');
        $this->forge->addForeignKey('id_post', 'post', 'id_post');
        $this->forge->createTable('like');
    }

    public function down()
    {
        //
    }
}
