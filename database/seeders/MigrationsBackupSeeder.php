<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MigrationsBackupSeeder extends Seeder
{
    /**
     * Backup seed for the migrations table.
     * Data backed up on: 2026-04-30
     * Note: This table tracks which migrations have been run.
     *       It is auto-managed by `php artisan migrate`.
     */
    public function run(): void
    {
        // The migrations table is auto-managed by Laravel's migrator.
        // Running `php artisan migrate` will populate this table.
        // This seeder exists as a structural backup.
        //
        // Migrations at backup time (5 rows):
        //   1. 0001_01_01_000000_create_users_table
        //   2. 0001_01_01_000001_create_cache_table
        //   3. 0001_01_01_000002_create_jobs_table
        //   4. 2026_04_27_130000_create_projects_table
        //   5. 2026_04_27_130001_create_messages_table
    }
}
