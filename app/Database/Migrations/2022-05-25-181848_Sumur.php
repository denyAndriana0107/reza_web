<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sumur extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'  => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => true,
					'auto_increment' => true,
			],
            'nama_perusahaan'=> [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'alamat_perusahaan' => [
                    'type'           => 'TEXT',
                    'constraint'     => '255',
            ],
            'lokasi' => [
                    'type'           => 'TEXT',
                    'constraint'     => '255',
            ],
            'koordinat' => [
                    'type'           => 'TEXT',
                    'constraint'     => '255',
            ],
            'nomor_registrasi' => [
                    'type'           => 'INT',
                    'constraint'     => '11',
            ],
            'kegunaan_air' => [
                    'type'           => 'TEXT',
                    'constraint'     => '255',
            ],
            'jumlah_max' => [
                    'type'           => 'INT',
                    'constraint'     => '11',
            ],
            'kedalaman_bor' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'kedalaman_aquifer' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'kedalaman_pompa' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'foto' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'created_at' => [
				'type'           	=> 'DATETIME',
				'null'     		 	=> true,
			],
			'updated_at' => [
				'type'           	=> 'DATETIME',
				'null'     		 	=> true,
			],
                
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('sumur');
    }

    public function down()
    {
        $this->forge->dropTable('sumur');
    }
}
