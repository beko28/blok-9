<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'firstname' => 'Test',
            'email' => 'test@example.com',
        ]);

        User::insert(
            [
                'firstname' => 'Bekir',
                'surname' => 'Koc',
                'age' => 18,
                'role' => 'student',
                'email' => 'bekir12@live.nl',
                'password' => bcrypt('hallo123'),
            ]
        );
    }
}
