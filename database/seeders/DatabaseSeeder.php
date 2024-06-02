<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

         $gender = $faker->randomElement(['male', 'female']);
    	foreach (range(1,50) as $index) {
            DB::table('data_customers')->insert([
                'nama_customer' => $faker->name($gender),
                'alamat_customer' => $faker->address,
                'email' => $faker->email,
                'nomor_hp' => $faker->phoneNumber
            ]);
        }
        foreach (range(1,50) as $index) {
            DB::table('data_bahanbakus')->insert([
                'suplier' => $faker->company,
                'nama_bahan_baku' => $faker->domainName,
                'kode_bahan_baku' => $faker->swiftBicNumber,
                'satuan_bahan_baku' => $faker->tld,
                'jumlah_bahan_baku' => $faker->randomDigit,
                'harga' => $faker->numberBetween($min = 10000, $max = 300000),
                'ket' => $faker->sentence($nbWords = 3, $variableNbWords = true)
            ]);
        }
        foreach (range(1,50) as $index) {
            DB::table('data_bahanstgjadis')->insert([
                'nama_bahan_stgjadi' => $faker->domainName,
                'kode_bahan_stgjadi' => $faker->swiftBicNumber,
                'jumlah_bahan_stgjadi' => $faker->randomDigit,
                'satuan_bahan_stgjadi' => $faker->tld,

                'kode_bahan_baku' => $faker->swiftBicNumber,
                'satuan_bahan_baku' => $faker->tld,
                'jumlah_bahan_baku' => $faker->randomDigit,

                'harga' => $faker->numberBetween($min = 10000, $max = 300000),
                'ket' => $faker->sentence($nbWords = 3, $variableNbWords = true)
            ]);
        }
        foreach (range(1,50) as $index) {
            DB::table('data_bahanjadis')->insert([
                'nama_bahan_jadi' => $faker->domainName,
                'kode_bahan_jadi' => $faker->swiftBicNumber,
                'satuan_bahan_jadi' => $faker->tld,
                'jumlah_bahan_jadi' => $faker->randomDigit,
                'harga' => $faker->numberBetween($min = 10000, $max = 300000),
                'ket' => $faker->sentence($nbWords = 3, $variableNbWords = true)
            ]);
        }
        foreach (range(1,50) as $index) {
            DB::table('data_penjualans')->insert([
                'nama_customer' => $faker->name($gender),
                'kode_bahan_jadi' => $faker->swiftBicNumber,
                'satuan_bahan_jadi' => $faker->tld,
                'jumlah_bahan_jadi' => $faker->randomDigit,
                'harga' => $faker->numberBetween($min = 10000, $max = 300000),
                'ket' => $faker->sentence($nbWords = 3, $variableNbWords = true)
            ]);
        }
    }
}
