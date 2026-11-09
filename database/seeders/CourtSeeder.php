<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourtSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('courts')->insert([
            [
                'name' => 'Padel Court 1 - Panoramic Center',
                'type' => 'Panoramic',
                'price_per_hour' => 350000,
                'description' => 'Lapangan padel full panoramic tanpa tiang sudut, kaca tempered 12mm, rumput sintetis Mondo Supercourt WPT.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Padel Court 2 - Indoor Pro',
                'type' => 'Indoor',
                'price_per_hour' => 300000,
                'description' => 'Lapangan padel indoor ber-AC, pencahayaan LED anti-silau, bebas angin dan hujan.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Padel Court 3 - Outdoor Breezy',
                'type' => 'Outdoor',
                'price_per_hour' => 250000,
                'description' => 'Lapangan padel outdoor dengan sirkulasi udara alami dan lampu sorot turnamen untuk malam hari.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
