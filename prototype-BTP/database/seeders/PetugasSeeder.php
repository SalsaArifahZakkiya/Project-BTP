<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i <=10; $i++) {
            $gender = $faker->randomElement(['male', 'female']);

            DB::table('petugas')->insert([
                'nama_lengkap'  => $faker->name,
                'jenis_kelamin' => $gender,
                'alamat' => $faker->address,
                'nomor_telepon' => preg_replace("/[^0-9]/", "", $faker->phoneNumber),
                'email' => $faker->safeEmail,
                'password' => Hash::make('password'),
            ]);
        }

    }
}
