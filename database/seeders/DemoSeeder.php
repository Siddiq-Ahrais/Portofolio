<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Seed demo data for projects and messages.
     */
    public function run(): void
    {
        // Demo Projects
        $projects = [
            [
                'title' => 'Website E-Commerce',
                'slug' => 'website-e-commerce',
                'description' => 'Platform e-commerce modern dengan fitur keranjang belanja, pembayaran online, dan manajemen produk. Dibangun dengan arsitektur yang scalable dan performa tinggi.',
                'tech_stack' => ['Laravel', 'React', 'TailwindCSS', 'MySQL'],
                'repository_link' => 'https://github.com/example/ecommerce',
            ],
            [
                'title' => 'Aplikasi Manajemen Tugas',
                'slug' => 'aplikasi-manajemen-tugas',
                'description' => 'Aplikasi task management dengan fitur drag-and-drop, kolaborasi tim real-time, dan notifikasi. Mendukung integrasi dengan berbagai layanan pihak ketiga.',
                'tech_stack' => ['Vue.js', 'Node.js', 'MongoDB', 'Socket.io'],
                'repository_link' => 'https://github.com/example/task-manager',
            ],
            [
                'title' => 'Dashboard Analytics',
                'slug' => 'dashboard-analytics',
                'description' => 'Dashboard interaktif untuk visualisasi data bisnis dengan grafik real-time, laporan otomatis, dan export data ke berbagai format.',
                'tech_stack' => ['React', 'D3.js', 'Python', 'PostgreSQL'],
                'repository_link' => 'https://github.com/example/analytics',
            ],
            [
                'title' => 'API RESTful Marketplace',
                'slug' => 'api-restful-marketplace',
                'description' => 'Backend API untuk marketplace digital dengan autentikasi JWT, rate limiting, dan dokumentasi Swagger lengkap.',
                'tech_stack' => ['Laravel', 'MySQL', 'Redis', 'Docker'],
                'repository_link' => 'https://github.com/example/marketplace-api',
            ],
            [
                'title' => 'Mobile App Landing Page',
                'slug' => 'mobile-app-landing-page',
                'description' => 'Landing page responsif untuk aplikasi mobile dengan animasi scroll, showcase fitur, dan integrasi form newsletter.',
                'tech_stack' => ['Next.js', 'TailwindCSS', 'Framer Motion'],
                'repository_link' => 'https://github.com/example/landing-page',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }

        // Demo Messages
        $messages = [
            [
                'sender_name' => 'Budi Santoso',
                'sender_email' => 'budi@example.com',
                'content' => 'Halo, saya tertarik dengan portofolio Anda. Apakah Anda tersedia untuk proyek freelance? Saya membutuhkan website untuk bisnis kuliner saya.',
                'is_read' => false,
            ],
            [
                'sender_name' => 'Sari Dewi',
                'sender_email' => 'sari.dewi@example.com',
                'content' => 'Saya sangat terkesan dengan dashboard analytics yang Anda buat. Bisakah kita berdiskusi tentang kemungkinan kolaborasi untuk startup saya?',
                'is_read' => false,
            ],
            [
                'sender_name' => 'Ahmad Rahman',
                'sender_email' => 'ahmad@company.co.id',
                'content' => 'Selamat siang, perusahaan kami sedang mencari developer untuk membangun platform internal. Apakah Anda bisa dihubungi untuk meeting?',
                'is_read' => true,
            ],
        ];

        foreach ($messages as $message) {
            Message::updateOrCreate(
                ['sender_email' => $message['sender_email']],
                $message
            );
        }
    }
}
