<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FailedJobsBackupSeeder extends Seeder
{
    /**
     * Backup seed for the failed_jobs table.
     * Data backed up on: 2026-04-30
     * Note: Failed jobs are recorded by Laravel's queue system.
     */
    public function run(): void
    {
        // Failed jobs are managed by Laravel's queue worker.
        // This seeder exists as a structural backup.
        // Table was empty at backup time (0 rows).
    }
}
