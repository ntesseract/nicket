<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'name' => 'Seminar Teknologi Web',
                'event_date' => now()->addDays(10),
                'information' => 'Seminar teknologi web terbaru dengan pembicara dari berbagai perusahaan teknologi ternama. Acara ini akan membahas tentang tren pengembangan web saat ini, best practices, dan teknologi yang sedang berkembang.',
            ],
            [
                'name' => 'Workshop Laravel',
                'event_date' => now()->addDays(15),
                'information' => 'Workshop intensif tentang framework Laravel. Peserta akan belajar tentang dasar-dasar Laravel, fitur-fitur terbaru, dan cara membangun aplikasi web yang modern dan aman menggunakan Laravel.',
            ],
            [
                'name' => 'Konferensi Digital Marketing',
                'event_date' => now()->addDays(20),
                'information' => 'Konferensi tentang strategi digital marketing terbaru. Acara ini akan menghadirkan pakar-pakar digital marketing yang akan berbagi pengalaman dan tips untuk meningkatkan presence online bisnis Anda.',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}