<?php

use Illuminate\Database\Seeder;

class MKidsCareLedgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_kids_care_ledg')->insert([
            [
                'LEDG_NUM' => '20091008000000017219',     
            ],   
            [
                'LEDG_NUM' => '20091019000000017222',     
            ],           
            [
                'LEDG_NUM' => '20091208000000017224',     
            ],                    			
        ]);
    }
}
