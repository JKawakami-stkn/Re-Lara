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
          'division_name' => '寝具',
        ],
        [
          'division_name' => '衣類',
        ],
        [
          'division_name' => 'ノート',
        ],
        [
          'division_name' => '筆記用具',
        ],
        [
          'division_name' => '教具',
        ],
        [
          'division_name' => 'その他',
        ]

      ]);
    }
}
