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
                'name' => '株式会社フルーベル館',
                'person_charge' => '寺山',
                'phone_number' => '086-243-0785',
                'postal_code' => '700-0975',
                'street_address_1' => '岡山県',
                'street_address_2' => '岡山市北区今３丁目',
                'street_address_3' => '２−３０',
            ],
            [
                'name' => '中村被服株式会社',
                'person_charge' => '山根',
                'phone_number' => '0835-22-3515',
                'postal_code' => '747-0806',
                'street_address_1' => '山口県',
                'street_address_2' => '防府市石が口',
                'street_address_3' => '2丁目9-1',
            ],
            [
                'name' => 'ひかりのくに株式会社',
                'person_charge' => '藤原',
                'phone_number' => '06-6768-1151',
                'postal_code' => '543-0001',
                'street_address_1' => '大阪府',
                'street_address_2' => '大阪市天王寺区上本町',
                'street_address_3' => '3-2-14',
            ],
            [
                'name' => 'イートン',
                'person_charge' => '',
                'phone_number' => '086-265-5561',
                'postal_code' => '700-0956',
                'street_address_1' => '岡山県',
                'street_address_2' => '岡山市南区当新田',
                'street_address_3' => '443-1',
            ],
            [
                'name' => 'ジェス西日本株式会社',
                'person_charge' => '濱田',
                'phone_number' => '086-272-5437',
                'postal_code' => '703-8258',
                'street_address_1' => '岡山県',
                'street_address_2' => '岡山市中区西川原１丁目',
                'street_address_3' => '７－１３',
            ],
            [
                'name' => '有限会社岡山こどものとも社',
                'person_charge' => '',
                'phone_number' => '086-272-4101',
                'postal_code' => '703-8292',
                'street_address_1' => '岡山県',
                'street_address_2' => '岡山市中区中納言町',
                'street_address_3' => '6-30',
            ],
            [
                'name' => '株式会社岡山チャイルド社',
                'person_charge' => '山本',
                'phone_number' => '086-297-6835',
                'postal_code' => '709-0621',
                'street_address_1' => '岡山県',
                'street_address_2' => '岡山市東区沼',
                'street_address_3' => '1309-1',
            ],
            [
                'name' => 'はんこプロジェクト',
                'person_charge' => '',
                'phone_number' => '086-259-0161',
                'postal_code' => '702-8034',
                'street_address_1' => '岡山県',
                'street_address_2' => '岡山市南区福浜西町',
                'street_address_3' => '４－１８－１０２',
            ],
            
        ]);
    }
}
