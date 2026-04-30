<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CacheLocksBackupSeeder extends Seeder
{
    /**
     * Backup seed for the cache_locks table.
     * Data backed up on: 2026-04-30
     * Note: Cache locks are framework-managed and transient.
     */
    public function run(): void
    {
        // Cache locks are transient and auto-managed by Laravel.
        // This seeder exists as a structural backup.
        // Table was empty at backup time (0 rows).
    }
}
