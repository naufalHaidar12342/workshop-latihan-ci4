<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Diskon extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "constraint" => 11,
                "auto_increment" => TRUE,
            ]
        ]);
        $this->forge->addField([
            "kode_voucher" => [
                "type" => "VARCHAR",
                "constraint" => 10,
            ]
        ]);
        $this->forge->addField([
            "tanggal_mulai_berlaku" => [
                "type" => "DATE",
            ]
        ]);
        $this->forge->addField([
            "tanggal_akhir_berlaku" => [
                "type" => "DATE",
            ]
        ]);
        $this->forge->addField([
            "besar_diskon" => [
                "type" => "TINYINT",
                "constraint" => 2,
            ]
        ]);
        $this->forge->addField([
            "aktif" => [
                "type" => "TINYINT",
                "constraint" => 1,
            ]
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropTable("diskon");
    }
}
