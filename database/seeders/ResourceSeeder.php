<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    private array $resources = [
        [
            'id' => 1,
            'linkResource' => 'https://lenta.ru/rss',
            'name_site' => 'lenta.ru',
            'link_site' => 'https://lenta.ru/',
        ],
        [
            'id' => 2,
            'linkResource' => 'https://news.rambler.ru/rss/world/',
            'name_site' => 'Рамблер/новости',
            'link_site' => 'https://news.rambler.ru',
        ],
        [
            'id' => 3,
            'linkResource' => 'https://news.rambler.ru/rss/community/',
            'name_site' => 'Рамблер/новости',
            'link_site' => 'https://news.rambler.ru',
        ],
        [
            'id' => 4,
            'linkResource' => 'https://news.rambler.ru/rss/politics/',
            'name_site' => 'Рамблер/новости',
            'link_site' => 'https://news.rambler.ru',
        ],
        [
            'id' => 5,
            'linkResource' => 'https://news.rambler.ru/rss/incidents/',
            'name_site' => 'Рамблер/новости',
            'link_site' => 'https://news.rambler.ru',
        ],
        [
            'id' => 6,
            'linkResource' => 'https://news.rambler.ru/rss/tech/',
            'name_site' => 'Рамблер/новости',
            'link_site' => 'https://news.rambler.ru',
        ],
        [
            'id' => 7,
            'linkResource' => 'https://news.rambler.ru/rss/army/',
            'name_site' => 'Рамблер/новости',
            'link_site' => 'https://news.rambler.ru',
        ],
        [
            'id' => 8,
            'linkResource' => 'https://news.rambler.ru/rss/games/',
            'name_site' => 'Рамблер/новости',
            'link_site' => 'https://news.rambler.ru',
        ],
        [
            'id' => 9,
            'linkResource' => 'https://news.rambler.ru/rss/starlife/',
            'name_site' => 'Рамблер/новости',
            'link_site' => 'https://news.rambler.ru',
        ],
        [
            'id' => 10,
            'linkResource' => 'https://news.rambler.ru/rss/articles/',
            'name_site' => 'Рамблер/новости',
            'link_site' => 'https://news.rambler.ru',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resources')->insert($this->getData());
    }

    private function getData():array
    {
        $data = [];
        foreach ($this->resources as $resource)
        {
            $resource['created_at'] = now();
            $data[] = $resource;
        }
        return $data;
    }
}
