<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example materials with various types
        $materials = [
            ['title' => 'Laravel Basics Video', 'type' => 'video', 'file' => 'video1.mp4', 'chapter_id' => 1],
            ['title' => 'Laravel Basics PDF', 'type' => 'pdf', 'file' => 'pdf1.pdf', 'chapter_id' => 1],
            ['title' => 'Laravel Advanced Concepts Video', 'type' => 'video', 'file' => 'video2.mp4', 'chapter_id' => 2],
            ['title' => 'Laravel Testing Guide', 'type' => 'pdf', 'file' => 'pdf2.pdf', 'chapter_id' => 3],
            ['title' => 'Laravel Basics Audio', 'type' => 'audio', 'file' => 'audio1.mp3', 'chapter_id' => 1],
            ['title' => 'Laravel Basics Image', 'type' => 'image', 'file' => 'image1.jpg', 'chapter_id' => 1],
            ['title' => 'Laravel Advanced Concepts Audio', 'type' => 'audio', 'file' => 'audio2.mp3', 'chapter_id' => 2],
            ['title' => 'Laravel Advanced Concepts Image', 'type' => 'image', 'file' => 'image2.jpg', 'chapter_id' => 2],
            ['title' => 'Laravel Testing Audio', 'type' => 'audio', 'file' => 'audio3.mp3', 'chapter_id' => 3],
            ['title' => 'Laravel Testing Image', 'type' => 'image', 'file' => 'image3.jpg', 'chapter_id' => 3],
        ];

        DB::table('materials')->insert($materials);
    }
}
