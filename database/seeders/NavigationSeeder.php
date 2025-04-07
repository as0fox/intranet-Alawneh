<?php
namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    public function run()
    {
        $links = [
            ['title' => 'Contacts', 'url' => '#contacts', 'order' => 1],
            ['title' => 'News', 'url' => '#news', 'order' => 2],
            ['title' => 'Applications', 'url' => '#applications', 'order' => 3],
            ['title' => 'Documents', 'url' => '#documents', 'order' => 4],
        ];

        foreach ($links as $link) {
            Navigation::create($link);
        }
    }
}
