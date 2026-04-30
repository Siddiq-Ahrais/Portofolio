<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesBackupSeeder extends Seeder
{
    /**
     * Backup seed for the messages table.
     * Data backed up on: 2026-04-30
     */
    public function run(): void
    {
        $messages = [
            [
                'id' => 1,
                'sender_name' => 'Budi Santoso',
                'sender_email' => 'budi@example.com',
                'content' => 'Halo, saya tertarik dengan portofolio Anda. Apakah Anda tersedia untuk proyek freelance? Saya membutuhkan website untuk bisnis kuliner saya.',
                'is_read' => true,
                'created_at' => '2026-04-27 13:31:02',
                'updated_at' => '2026-04-30 13:32:53',
            ],
            [
                'id' => 2,
                'sender_name' => 'Sari Dewi',
                'sender_email' => 'sari.dewi@example.com',
                'content' => 'Saya sangat terkesan dengan dashboard analytics yang Anda buat. Bisakah kita berdiskusi tentang kemungkinan kolaborasi untuk startup saya?',
                'is_read' => true,
                'created_at' => '2026-04-27 13:31:02',
                'updated_at' => '2026-04-30 13:32:41',
            ],
            [
                'id' => 3,
                'sender_name' => 'Ahmad Rahman',
                'sender_email' => 'ahmad@company.co.id',
                'content' => 'Selamat siang, perusahaan kami sedang mencari developer untuk membangun platform internal. Apakah Anda bisa dihubungi untuk meeting?',
                'is_read' => true,
                'created_at' => '2026-04-27 13:31:02',
                'updated_at' => '2026-04-27 13:31:02',
            ],
            [
                'id' => 4,
                'sender_name' => 'CLI Test',
                'sender_email' => 'cli@test.com',
                'content' => 'Test pesan dari command line.',
                'is_read' => true,
                'created_at' => '2026-04-27 13:51:39',
                'updated_at' => '2026-04-30 13:33:00',
            ],
        ];

        foreach ($messages as $message) {
            DB::table('messages')->updateOrInsert(
                ['id' => $message['id']],
                $message
            );
        }
    }
}
