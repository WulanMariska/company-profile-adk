<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\HomePageRepository;
use App\Models\HomePage;

class HomePageSeeder extends Seeder
{
    /**
     * Create the database record for this singleton module.
     *
     * @return void
     */
    public function run()
    {
        if (HomePage::count() > 0) {
            return;
        }

        app(HomePageRepository::class)->create([
            'title' => 'HomePage',
            'description' => '',
            'published' => false,
        ]);
    }
}
