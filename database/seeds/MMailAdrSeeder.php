<?php

use Illuminate\Database\Seeder;

class MMailAdrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_mail_adr')->insert([
            [
                'LEDG_NUM' => '20091008000000017219',                 			
                'GURD_NUM' => '1',
                'MAIL' => 'j.kawakami.sotuken@gmail.com',
            ],
            [
                'LEDG_NUM' => '20091019000000017222',                 			
                'GURD_NUM' => '1',
                'MAIL' => 'j.kawakami.dev@gmail.com',
            ],
            [
                'LEDG_NUM' => '20091208000000017224',                 			
                'GURD_NUM' => '1',
                'MAIL' => 'j.kawakami.phone@gmail.com',
            ],
        ]);
    }
}
