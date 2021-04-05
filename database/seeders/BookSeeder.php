<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Book::factory(10)
            ->for(\App\Models\Author::factory()->create())
            ->has(\App\Models\Genre::factory()->count(1))
            ->has(\App\Models\Publisher::factory()->count(1))
            ->hasReaders(4)
            ->create();
    }
}
