<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@a.sa',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::factory()->create([
            'name' => 'editor man',
            'email' => 'editor@e.sa',
            'role' => 'editor',
            'password' => Hash::make('123456'),
        ]);
        User::factory()->create([
            'name' => 'editor women',
            'email' => 'women@e.sa',
            'role' => 'editor',
            'password' => Hash::make('123456'),
        ]);
    }
}
