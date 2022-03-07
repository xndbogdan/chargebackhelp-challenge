<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(50)->create();
        $faker = \Faker\Factory::create();

        foreach(User::all() as $user) {
            for($i = 0; $i < rand(0, 10); $i++) {
                $user->profiles()->create([
                    'name' => $faker->name,
                ]);
            }
        }

        foreach(UserProfile::with('user')->get() as $profile) {
            for($i = 0; $i < rand(0, 10); $i++) {
                $profile->books()->create([
                    'title' => $faker->sentence,
                    'author' => $faker->name,
                    'release_date' => Carbon::parse($faker->dateTimeBetween('-10 years', 'now'))->format('Y-m-d'),
                    'created_at' => $faker->dateTimeBetween('-10 years', 'now'),
                    'user_id' => $profile->user->id,
                ]);
            }
        }
        
    }
}
