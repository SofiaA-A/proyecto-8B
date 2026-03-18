<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slide;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Slide::create(['title' => 'Primera Imagen', 'image_path' => 'slides/slide1.jpg']);
    Slide::create(['title' => 'Segunda Imagen', 'image_path' => 'slides/slide2.jpg']);
    Slide::create(['title' => 'Tercera Imagen', 'image_path' => 'slides/slide3.jpg']);
}
}
