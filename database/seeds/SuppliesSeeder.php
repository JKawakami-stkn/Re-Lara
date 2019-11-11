<?php

use Illuminate\Database\Seeder;

class SuppliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplies')->insert([
            [
                'name' => '名札',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '1',
                'price' => '210',
                'division_id' => '4',
            ],
            [
                'name' => '出席ブック',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '1',
                'price' => '0',
                'division_id' => '2',
            ],
            [
                'name' => '氏名印',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '8',
                'price' => '380',
                'division_id' => '4',
            ],
            [
                'name' => 'おたよりｹｰｽ',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '1',
                'price' => '310',
                'division_id' => '5',
            ],
            [
                'name' => '通園ﾘｭｯｸ',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '2',
                'price' => '3250',
                'division_id' => '1',
            ],
            [
                'name' => '通園手さげﾊﾞｯｸ',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '1',
                'price' => '520',
                'division_id' => '1',
            ],
            [
                'name' => '組帽子',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '2',
                'price' => '820',
                'division_id' => '1',
            ],
            [
                'name' => 'ﾍﾞｯﾄ用ｼｰﾂ',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '3',
                'price' => '2000',
                'division_id' => '5',
            ],
            [
                'name' => '諸費袋',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '3',
                'price' => '50',
                'division_id' => '5',
            ],
            [
                'name' => 'ネームプレート（2枚組）',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '4',
                'price' => '200',
                'division_id' => '4',
            ],
            [
                'name' => '上靴',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '5',
                'price' => '1550',
                'division_id' => '1',
            ],
            [
                'name' => 'お誕生絵本（全園児）',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '6',
                'price' => '370',
                'division_id' => '2',
            ],
            [
                'name' => '連絡帳',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '3',
                'price' => '150',
                'division_id' => '2',
            ],
            [
                'name' => '自由画帳（A4）',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '1',
                'price' => '200',
                'division_id' => '2',
            ],
            [
                'name' => 'ｸﾚﾖﾝ12色',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '1',
                'price' => '560',
                'division_id' => '3',
            ],
            [
                'name' => 'ｽﾎﾟｰﾂｳｪｱ（半袖）',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '2',
                'price' => '1500',
                'division_id' => '1',
            ],
            [
                'name' => 'ｽﾎﾟｰﾂｳｪｱ（長袖）',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '2',
                'price' => '1750',
                'division_id' => '1',
            ],
            [
                'name' => '紺半ｽﾞﾎﾞﾝ',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '2',
                'price' => '1400',
                'division_id' => '1',
            ],
            [
                'name' => 'セーラ制服',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '2',
                'price' => '4000',
                'division_id' => '1',
            ],
            [
                'name' => '制作ｽﾓｯｸ',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '2',
                'price' => '1400',
                'division_id' => '1',
            ],
            [
                'name' => 'お道具箱',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '3',
                'price' => '590',
                'division_id' => '3',
            ],
            [
                'name' => 'はさみ',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '3',
                'price' => '500',
                'division_id' => '3',
            ],
            [
                'name' => 'のり',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '1',
                'price' => '210',
                'division_id' => '3',
            ],
            [
                'name' => 'ｸﾚﾖﾝ16色',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '7',
                'price' => '610',
                'division_id' => '3',
            ],
            [
                'name' => '自由画帳（B3）',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '1',
                'price' => '210',
                'division_id' => '2',
            ],
            [
                'name' => '粘土',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '1',
                'price' => '460',
                'division_id' => '3',
            ],
            [
                'name' => '粘土板',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '3',
                'price' => '550',
                'division_id' => '3',
            ],
            [
                'name' => '粘土ｹｰｽ（ﾍﾗ付き）',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '1',
                'price' => '590',
                'division_id' => '3',
            ],
            [
                'name' => 'ﾁｪｯｸ半ｽﾞﾎﾞﾝ',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '2',
                'price' => '3500',
                'division_id' => '1',
            ],
            [
                'name' => 'ﾏｰｶｰ10色',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '1',
                'price' => '790',
                'division_id' => '3',
            ],
            [
                'name' => 'お誕生ｱﾙﾊﾞﾑｶｰﾄﾞ',
                'img_path' => 'spplie_imgs/no_image.png',
                'supplier_id' => '6',
                'price' => '300',
                'division_id' => '2',
            ]
        ]);
    }
}
