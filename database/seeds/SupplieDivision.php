<?php

use Illuminate\Database\Seeder;

class SupplieDivision extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('supplie_division')->insert([
        [
          'division_name' => '衣類、靴、鞄等',
        ],
        [
          'division_name' => 'ノート、本等',
        ],
        [
          'division_name' => '文房具等',
        ],
        [
          'division_name' => '名札、印鑑等',
        ],
        [
          'division_name' => 'その他',
        ]

      ]);
    }
}
