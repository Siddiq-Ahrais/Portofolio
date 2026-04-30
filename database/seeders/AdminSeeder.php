<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the admin user account.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'sraintiny@alph.c.d.f'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Jinjajujijujijinjarantaniriani'),
                'email_verified_at' => now(),
            ]
        );
    }
}
