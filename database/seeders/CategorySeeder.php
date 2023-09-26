<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    private array $categories = [
        [
            'id' => 1,
            'category' => 'Мир',
            'description' => 'Все важное, что происходит в мире',
            'img' => '/storage/img/icon/world.png',
        ],
        [
            'id' => 2,
            'category' => 'Россия',
            'description' => 'Все важное, что происходит в России',
            'img' => '/storage/img/icon/russia.png',
        ],
        [
            'id' => 3,
            'category' => 'Армия',
            'description' => 'Все о нашей армии, вооружении и боевой готовности',
            'img' => '/storage/img/icon/news.png',
        ],
        [
            'id' => 4,
            'category' => 'Политика',
            'description' => 'Политические новости со всего мира',
            'img' => '/storage/img/icon/politics.png',
        ],
        [
            'id' => 5,
            'category' => 'Экономика',
            'description' => 'Все об экономике в стране и в мире',
            'img' => '/storage/img/icon/economy.png',
        ],
        [
            'id' => 6,
            'category' => 'Общество',
            'description' => 'Все, что происходит в обществе.',
            'img' => '/storage/img/icon/news.png',
        ],
        [
            'id' => 7,
            'category' => 'Культура',
            'description' => 'Последние новости шоу-бизнеса',
            'img' => '/storage/img/icon/culture.png',
        ],
        [
            'id' => 8,
            'category' => 'Спорт',
            'description' => 'Обзоры всех спортивных событий и соревнований всех уровней',
            'img' => '/storage/img/icon/sport.png',
        ],
        [
            'id' => 9,
            'category' => 'Происшествия',
            'description' => 'Рассказываем поишествия, связаных с нарушением законов и нарушения, попавших в поле зрения правохранительных органов',
            'img' => '/storage/img/icon/incident.png',
        ],
        [
            'id' => 10,
            'category' => 'Здоровье',
            'description' => 'Помагаем следить за вашим здоровьем и рассказываем все новости из области медицины',
            'img' => '/storage/img/icon/news.png',
        ],
        [
            'id' => 11,
            'category' => 'Туризм',
            'description' => 'Вся информация об отдыхе. Что предлагают тур-агенты. Где теплей, а где интересней!',
            'img' => '/storage/img/icon/rest.png',
        ],
        [
            'id' => 12,
            'category' => 'Наука',
            'description' => 'Расскажем, что изучают ученые со всего мира и какие сделаны открытия',
            'img' => '/storage/img/icon/science.png',
        ],
        [
            'id' => 13,
            'category' => 'Технологии',
            'description' => 'Последние новости технологичного рынка и обзоры на новые технологичные устройства',
            'img' => '/storage/img/icon/technologies.png',
        ],
        [
            'id' => 14,
            'category' => 'Авто',
            'description' => 'Последние новости автомобильного рынка',
            'img' => '/storage/img/icon/auto.png',
        ],
    ];

    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData():array
    {
        $data = [];
        foreach ($this->categories as $category)
        {
            $category['created_at'] = now();
            $data[] = $category;
        }
        return $data;
    }
}









