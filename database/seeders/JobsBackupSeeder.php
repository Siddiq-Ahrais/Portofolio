<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsBackupSeeder extends Seeder
{
    /**
     * Backup seed for the jobs table.
     * Data backed up on: 2026-04-30
     * Note: Jobs are managed by Laravel's queue system.
     */
    public function run(): void
    {
        // Jobs are managed by Laravel's queue worker.
        // This seeder exists as a structural backup.
        // Table was empty at backup time (0 rows).
    }
}
