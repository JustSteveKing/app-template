<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Steve McDougall',
            'email' => 'juststevemcd@gmail.com',
            'email_verified_at' => null,
        ]);
    }
}
