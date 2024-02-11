<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = [
            'name' => 'Passager Client',
            'picture' => '#',
            'email' => 'passager@mail.com',
            'password' => bcrypt(123456),
            'role' => 'passager',
            'phone' => '6666666666'
        ];

        \App\Models\User::create($user);
    }
}
