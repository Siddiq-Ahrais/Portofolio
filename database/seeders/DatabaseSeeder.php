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
        $this->call([
            AdminSeeder::class,
            ProjectsBackupSeeder::class,
            MessagesBackupSeeder::class,
            CacheBackupSeeder::class,
            CacheLocksBackupSeeder::class,
            FailedJobsBackupSeeder::class,
            JobBatchesBackupSeeder::class,
            JobsBackupSeeder::class,
            MigrationsBackupSeeder::class,
            PasswordResetTokensBackupSeeder::class,
            SessionsBackupSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
