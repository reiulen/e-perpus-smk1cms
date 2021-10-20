<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class bukuSeeder extends Seeder
{
        public function run()
        {

             $faker = \Faker\Factory::create('id_ID');
             for ($i = 0; $i < 20; $i++){
                $data = [
                        'judul_buku' => $faker->name,
                        'deskripsi'    => $faker->address,
                        'gambar_buku' => 'default.jpg',
                        'kategori' => 'Pengetahuan'
                ];

                $this->db->table('tb_buku')->insert($data);
            }
        }
}