<?php

namespace Database\Seeders;

use App\Models\MusicEvent;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MusicEventSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        MusicEvent::factory(10)->create();
    }
}
