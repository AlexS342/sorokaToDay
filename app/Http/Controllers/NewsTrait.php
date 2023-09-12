<?php

namespace App\Http\Controllers;


trait NewsTrait
{
    public function getCategory(): array
    {
        $category = [];
        $quantityCategory = 4;
        for ($i = 1; $i < $quantityCategory + 1; $i++)
        {
            $category[$i] = [
                'id' => $i,
                'category' => fake()->company(),
                'description' => fake()->text(100),
            ];
        }
        return $category;
    }
    public function getNews(int $id = null): array
    {
        $news = [];
        $count = 0;
        $quantityNews = 5;
        $category = $this->getCategory();

        if ($id == null){
            foreach ($category as $cat)
            {
                for($i = 1; $i < $quantityNews + 1; $i++)
                {
                    $count++;
                    $news[$count] = [
                        'id' => $count,
                        'id_category' => $cat['id'],
                        'category' => $cat['category'],
                        'title' => fake()->jobTitle(),
                        'mimi_description' => fake()->text(300),
                        'description' => fake()->text(1000),
                        'author' => fake()->userName(),
                        'created_at' => now()->format('d-m-Y H:i'),
                    ];
                }

            }
            return $news;
        }

        return $itemNews = [
            'id' => $id,
            'id_category' => rand(1, 10),
            'category' => fake()->company(),
            'title' => fake()->jobTitle(),
            'description' => fake()->text(300),
            'author' => fake()->userName(),
            'created_at' => now()->format('d-m-Y H:i'),
        ];
    }

}

