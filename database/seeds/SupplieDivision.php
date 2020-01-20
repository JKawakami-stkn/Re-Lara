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
          'division_name' => '全て'#1
        ],
        [
          'division_name' => '衣類、靴、鞄等',#2
        ],
        [
          'division_name' => 'ノート、本等',#3
        ],
        [
          'division_name' => '文房具等',#4
        ],
        [
          'division_name' => '名札、印鑑等',#5
        ],
        [
          'division_name' => 'その他',#6
        ]

      ]);
    }
}
