<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsBackupSeeder extends Seeder
{
    /**
     * Backup seed for the projects table.
     * Data backed up on: 2026-04-30
     */
    public function run(): void
    {
        $projects = [
            [
                'id' => 1,
                'title' => 'Website E-Commerce',
                'slug' => 'website-e-commerce',
                'description' => 'Platform e-commerce modern dengan fitur keranjang belanja, pembayaran online, dan manajemen produk. Dibangun dengan arsitektur yang scalable dan performa tinggi.',
                'image_path' => null,
                'tech_stack' => json_encode(['Laravel', 'React', 'TailwindCSS', 'MySQL']),
                'repository_link' => 'https://github.com/example/ecommerce',
                'created_at' => '2026-04-27 13:31:02',
                'updated_at' => '2026-04-27 13:31:02',
            ],
            [
                'id' => 2,
                'title' => 'Aplikasi Manajemen Tugas',
                'slug' => 'aplikasi-manajemen-tugas',
                'description' => 'Aplikasi task management dengan fitur drag-and-drop, kolaborasi tim real-time, dan notifikasi. Mendukung integrasi dengan berbagai layanan pihak ketiga.',
                'image_path' => null,
                'tech_stack' => json_encode(['Vue.js', 'Node.js', 'MongoDB', 'Socket.io']),
                'repository_link' => 'https://github.com/example/task-manager',
                'created_at' => '2026-04-27 13:31:02',
                'updated_at' => '2026-04-27 13:31:02',
            ],
            [
                'id' => 3,
                'title' => 'Dashboard Analytics',
                'slug' => 'dashboard-analytics',
                'description' => 'Dashboard interaktif untuk visualisasi data bisnis dengan grafik real-time, laporan otomatis, dan export data ke berbagai format.',
                'image_path' => null,
                'tech_stack' => json_encode(['React', 'D3.js', 'Python', 'PostgreSQL']),
                'repository_link' => 'https://github.com/example/analytics',
                'created_at' => '2026-04-27 13:31:02',
                'updated_at' => '2026-04-27 13:31:02',
            ],
            [
                'id' => 4,
                'title' => 'API RESTful Marketplace',
                'slug' => 'api-restful-marketplace',
                'description' => 'Backend API untuk marketplace digital dengan autentikasi JWT, rate limiting, dan dokumentasi Swagger lengkap.',
                'image_path' => null,
                'tech_stack' => json_encode(['Laravel', 'MySQL', 'Redis', 'Docker']),
                'repository_link' => 'https://github.com/example/marketplace-api',
                'created_at' => '2026-04-27 13:31:02',
                'updated_at' => '2026-04-27 13:31:02',
            ],
            [
                'id' => 5,
                'title' => 'Mobile App Landing Page',
                'slug' => 'mobile-app-landing-page',
                'description' => 'Landing page responsif untuk aplikasi mobile dengan animasi scroll, showcase fitur, dan integrasi form newsletter.',
                'image_path' => null,
                'tech_stack' => json_encode(['Next.js', 'TailwindCSS', 'Framer Motion']),
                'repository_link' => 'https://github.com/example/landing-page',
                'created_at' => '2026-04-27 13:31:02',
                'updated_at' => '2026-04-27 13:31:02',
            ],
        ];

        foreach ($projects as $project) {
            DB::table('projects')->updateOrInsert(
                ['id' => $project['id']],
                $project
            );
        }
    }
}
