<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobBatchesBackupSeeder extends Seeder
{
    /**
     * Backup seed for the job_batches table.
     * Data backed up on: 2026-04-30
     * Note: Job batches are managed by Laravel's queue batching system.
     */
    public function run(): void
    {
        // Job batches are managed by Laravel's queue system.
        // This seeder exists as a structural backup.
        // Table was empty at backup time (0 rows).
    }
}
