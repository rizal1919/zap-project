<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Place;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Place::truncate();

        $data = [
            // AMC Lantai 1
            ['place' => 'MCU', 'floor' => 1],
            ['place' => 'Klinik Akupuntur', 'floor' => 1],
            ['place' => 'Klinik Fisioterapi', 'floor' => 1],
            ['place' => 'Klinik Stroke', 'floor' => 1],
            ['place' => 'TPP AMC', 'floor' => 1],
            ['place' => 'Kasir AMC', 'floor' => 1],
            ['place' => 'Kamar Obat AMC', 'floor' => 1],
            // AMC Lantai 2
            ['place' => 'Interne', 'floor' => 2],
            ['place' => 'Klinik Urologi', 'floor' => 2],
            ['place' => 'Klinik Bedah', 'floor' => 2],
            ['place' => 'Klinik Orthopedi', 'floor' => 2],
            ['place' => 'Klinik Kulit Kelamin', 'floor' => 2],
            ['place' => 'Klinik Gizi', 'floor' => 2],
            ['place' => 'Klinik Mata', 'floor' => 2],
            ['place' => 'Klinik Syaraf', 'floor' => 2],
            ['place' => 'Klinik Jantung', 'floor' => 2],
            ['place' => 'Klinik Radiologi', 'floor' => 2],
            ['place' => 'Laboratorium', 'floor' => 2],
            ['place' => 'Kepala Unit Rawat Jalan', 'floor' => 2],
            ['place' => 'TPP AMC', 'floor' => 2],
            ['place' => 'Kasir AMC', 'floor' => 2],
            ['place' => 'Kamar Obat AMC', 'floor' => 2],
            // AMC Lantai 3
            ['place' => 'Klinik Obgyn', 'floor' => 3],
            ['place' => 'Klinik Anak', 'floor' => 3],
            ['place' => 'Klinik Psikiatri', 'floor' => 3],
            ['place' => 'Klinik Imunisasi', 'floor' => 3],
            ['place' => 'Klinik THT', 'floor' => 3],
            ['place' => 'Klinik Gigi', 'floor' => 3],
            ['place' => 'Klinik Kecantikan', 'floor' => 3],
        ];

        Place::insert($data);
    }
}
