<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
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
            "harga"=>[
                "type"=>"INT",
                "constraint"=>11,
            ],
            "stok"=>[
                "type"=>"INT",
                "constraint"=>11,
            ],
            "gambar"=>[
                "type"=>"TEXT",
            ],
            "id_kategori"=>[
                "type"=>"INT",
                "constraint"=>11,
                "unsigned"=>TRUE,
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

        $this->forge->addKey("id", TRUE);
        $this->forge->createTable("barang");

        $this->forge->addColumn(
            "barang",
            [
                "CONSTRAINT barang_id_kategori_foreign FOREIGN KEY(id_kategori) REFERENCES kategori(id) ON DELETE NO ACTION ON UPDATE CASCADE"
            ]
        );
    }

    public function down()
    {
        //
        $this->forge->dropTable("barang");
    }
}
