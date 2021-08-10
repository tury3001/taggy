<?php

namespace Database\Seeders;

use App\Models\Resource;
use App\Models\Set;
use App\Models\Tag;
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
        Set::factory(3)->create();

        Resource::factory(10)->has(
            Tag::factory()->count(4)
        )->create([
            'set_id' => 1
        ]);

        Resource::factory(7)->has(
            Tag::factory()->count(2)
        )->create([
            'set_id' => 2
        ]);

        Resource::factory(9)->has(
            Tag::factory()->count(4)
        )->create([
            'set_id' => 3
        ]);
    }
}
