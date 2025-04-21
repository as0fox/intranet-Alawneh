<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuickLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $links = [
            [
                'title' => 'Tracking',
                'icon' => 'fa-clock',
                'url' => '#',
                'color1' => '#480154',
                'color2' => '#673AB7',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'iTrent',
                'icon' => 'fa-users',
                'url' => '#',
                'color1' => '#004e78',
                'color2' => '#14A0E9',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Email',
                'icon' => 'fa-envelope',
                'url' => '#',
                'color1' => '#004e78',
                'color2' => '#14A0E9',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Leave',
                'icon' => 'fa-plane-departure',
                'url' => '#',
                'color1' => '#223048',
                'color2' => '#223048',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Support',
                'icon' => 'fa-headset',
                'url' => '#',
                'color1' => '#223048',
                'color2' => '#223048',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Reports',
                'icon' => 'fa-chart-bar',
                'url' => '#',
                'color1' => '#013c2c',
                'color2' => '#11AD83',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Chat',
                'icon' => 'fa-comments',
                'url' => '#',
                'color1' => '#013c2c',
                'color2' => '#11AD83',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Attendance',
                'icon' => 'fa-calendar-check',
                'url' => '#',
                'color1' => '#480154',
                'color2' => '#673AB7',
                'order' => 8,
                'is_active' => true,
            ],
            [
                'title' => 'Reports',
                'icon' => 'fa-chart-bar',
                'url' => '#',
                'color1' => '#013c2c',
                'color2' => '#11AD83',
                'order' => 9,
                'is_active' => true,
            ],
            [
                'title' => 'Chat',
                'icon' => 'fa-comments',
                'url' => '#',
                'color1' => '#013c2c',
                'color2' => '#11AD83',
                'order' => 10,
                'is_active' => true,
            ],
            [
                'title' => 'Attendance',
                'icon' => 'fa-calendar-check',
                'url' => '#',
                'color1' => '#480154',
                'color2' => '#673AB7',
                'order' => 11,
                'is_active' => true,
            ],
            [
                'title' => 'Reports',
                'icon' => 'fa-chart-bar',
                'url' => '#',
                'color1' => '#013c2c',
                'color2' => '#11AD83',
                'order' => 12,
                'is_active' => true,
            ],
        ];

        DB::table('quick_links')->insert($links);
    }
}