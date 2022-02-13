<?php

use Illuminate\Database\Seeder;
use App\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'title'=>'educational',
            'description'=>'for educational purpose'
        ]);
        Tag::create([
            'title'=>'litreature',
            'description'=>'for poem,story,songs etc'
        ]);
        Tag::create([
            'title'=>'notice',
            'description'=>'for notice purpose'
        ]);
    }
}
