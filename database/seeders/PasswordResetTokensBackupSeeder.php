<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasswordResetTokensBackupSeeder extends Seeder
{
    /**
     * Backup seed for the password_reset_tokens table.
     * Data backed up on: 2026-04-30
     * Note: Password reset tokens are temporary and auto-managed.
     */
    public function run(): void
    {
        // Password reset tokens are temporary and expire after use.
        // This seeder exists as a structural backup.
        // Table was empty at backup time (0 rows).
    }
}
