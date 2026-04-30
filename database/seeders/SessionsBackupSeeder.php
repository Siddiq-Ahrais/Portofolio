<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionsBackupSeeder extends Seeder
{
    /**
     * Backup seed for the sessions table.
     * Data backed up on: 2026-04-30
     * Note: Sessions are transient and auto-managed by Laravel.
     */
    public function run(): void
    {
        // Sessions are transient user data managed by Laravel's session driver.
        // This seeder exists as a structural backup.
        // Table had 6 rows at backup time (all transient session data).
    }
}
