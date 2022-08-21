<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@admin.com',
            'password' => '$2y$10$rO7qTYs8BJEjWU67qK0yoOLOlwnlJrl/WYuZ5Nf3k3h4d/HKYAiS.',
            'avatar' => '/assets/img/avatar.png',
            'name' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
