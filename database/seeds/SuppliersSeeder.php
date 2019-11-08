<?php

use Illuminate\Database\Seeder;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            [
                'id' => '1',
                'name' => '株式会社フルーベル館',
                'person_charge' => '寺山',
                'phone_number' => '086-243-0785',
                'postal_code' => '700-0975',
                'street_address_1' => '岡山県',
                'street_address_2' => '岡山市北区',
                'street_address_3' => '今３丁目２−３０',
            ],
            [
                'id' => '2',
                'name' => '中村被服株式会社',
                'person_charge' => '山根',
                'phone_number' => '',
                'postal_code' => '',
                'street_address_1' => '',
                'street_address_2' => '',
                'street_address_3' => '',
            ],
            [
                'id' => '3',
                'name' => 'ひかりのくに株式会社',
                'person_charge' => '藤原',
                'phone_number' => '',
                'postal_code' => '',
                'street_address_1' => '',
                'street_address_2' => '',
                'street_address_3' => '',
            ],
            [
                'id' => '4',
                'name' => 'イートン',
                'person_charge' => '',
                'phone_number' => '',
                'postal_code' => '',
                'street_address_1' => '',
                'street_address_2' => '',
                'street_address_3' => '',
            ],
            [
                'id' => '5',
                'name' => 'ジェス西日本株式会社',
                'person_charge' => '濱田',
                'phone_number' => '',
                'postal_code' => '',
                'street_address_1' => '',
                'street_address_2' => '',
                'street_address_3' => '',
            ],
            [
                'id' => '6',
                'name' => '有限会社岡山こどものとも社',
                'person_charge' => '',
                'phone_number' => '',
                'postal_code' => '',
                'street_address_1' => '',
                'street_address_2' => '',
                'street_address_3' => '',
            ],
            [
                'id' => '7',
                'name' => '株式会社岡山チャイルド社',
                'person_charge' => '山本',
                'phone_number' => '',
                'postal_code' => '',
                'street_address_1' => '',
                'street_address_2' => '',
                'street_address_3' => '',
            ],

        ]);
    }
}
