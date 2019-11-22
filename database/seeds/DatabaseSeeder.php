<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        #$this->call(MkidsSeeder::class);
        #$this->call(MWelfaCorpSeeder::class);
        #$this->call(MWelfaFacilSeeder::class);
        #$this->call(MWfGroupSeeder::class);
        #$this->call(MWfStaffPosiSeeder::class);
        #$this->call(MWfStaffSeeder::class);
        #$this->call(TKidsGpPosiSeeder::class);
        $this->call(SupplieDivision::class);
        #$this->call(SuppliersSeeder::class);
        $this->call(SuppliesSeeder::class);
        #$this->call(SkuSeeder::class);
    }
}
