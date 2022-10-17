<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Continent;
use App\Models\Country;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $continents = [
            ['id' => 1, 'name' => 'Europe'],
            ['id' => 2, 'name' => 'Asia'],
            ['id' => 3, 'name' => 'Africa'],
            ['id' => 4, 'name' => 'South America'],
            ['id' => 5, 'name' => 'North America'],
        ];



//        foreach ($continents as $continent)
//        {
//            Continent::factory()
//                ->has(Country::factory()->count(10))
//                ->create($continent);
//        }

        foreach ($continents as $continent) {
            Continent::factory()->create($continent);
        }

        Continent::all()
            ->each(function ($continent) {
                Country::factory()
                    ->count(10)
                    ->create(['continent_id' => $continent->id]);
            });
    }
}
