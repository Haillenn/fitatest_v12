<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Role::firstOrCreate(['id' => 1], ['name' => 'Admin']);
        \App\Models\Role::firstOrCreate(['id' => 2], ['name' => 'Sub-Admin']);
        \App\Models\Role::firstOrCreate(['id' => 3], ['name' => 'User']);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 3,
        ]);
    }
}
