<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "id"=>[
                "type"=>"INT",
                "constraint"=>11,
                "unsigned"=>TRUE,
                "auto_increment"=>TRUE,
            ],
            "nama"=>[
                "type"=>"TEXT",
            ],
            "created_by"=>[
                "type"=>"INT",
                "constraint"=>11,
            ],
            "created_date"=>[
                "type"=>"DATETIME",
            ],
            "updated_by"=>[
                "type"=>"INT",
                "constraint"=>11,
                "null"=>TRUE,
            ],
            "updated_date"=>[
                "type"=>"DATETIME",
                "null"=>TRUE,
            ],
        ]);

        $this->forge->addKey("id",TRUE);
        $this->forge->createTable("kategori");
    }

    public function down()
    {
        //
        $this->forge->dropTable("kategori");
    }
}
