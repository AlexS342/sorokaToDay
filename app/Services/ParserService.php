<?php

namespace App\Services;

use App\Enums\News\Status;
use App\Models\Category;
use App\Models\News;
use App\Services\Interfaces\Parser;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    public function saveParseData():void
    {
        try{
            $xml = XmlParser::load($this->link);
        }catch(\Exception $errorParserRss){
            //
        }

        if(!isset($errorParserRss)){
            $data = $xml->parse([
                'title' => ['uses' => 'channel.title'],
                'link' => ['uses' => 'channel.link'],
                'description' => ['uses' => 'channel.description'],
                'image' => ['uses' => 'channel.image.url'],
                'news' => ['uses' => 'channel.item[author,title,description,fulltext,link,pubDate,category,enclosure::url]'],
            ]);

            $readyData = $this->preparationData($data);

            foreach ($readyData as $item)
            {
                if(!DB::table('news')->where('title', '=', $item['title'])->exists()){
                    $model = new News($item);
                    $model->save();
                }
            }
        }
    }

    private function preparationData($data, ): array
    {
        $falseAuthor = $data['title'];
        $readyData = [];
        foreach ($data['news'] as $key => $news)
        {
            $idCategory = $this->getIdCategories(trim($news['category'], " \n\r\t\v\x00"));

            $readyData[$key]['id_category'] = $idCategory;

            $readyData[$key]['title'] = trim($news['title'], " \n\r\t\v\x00");

            strlen($news['author']) > 3
                ? $readyData[$key]['author'] = trim($news['author'], " \n\r\t\v\x00")
                : $readyData[$key]['author'] = trim($falseAuthor, " \n\r\t\v\x00");

            $readyData[$key]['status'] = Status::DRAFT->value;

            strlen($news['description'] >= 200)
                ? $readyData[$key]['miniDescription'] = mb_substr(trim($news['description'], " \n\r\t\v\x00"), 0, 200)
                : $readyData[$key]['miniDescription'] = trim($news['description'], " \n\r\t\v\x00");


            strlen($news['fulltext']) !== 0
                ? $readyData[$key]['description'] = trim($news['fulltext'], " \n\r\t\v\x00")
                : $readyData[$key]['description'] = trim($news['description'], " \n\r\t\v\x00");


            strlen(trim($news['enclosure::url'])) != 0
                ? $readyData[$key]['img'] = $news['enclosure::url']
                : $readyData[$key]['img'] = null;

            $readyData[$key]['created_at'] = $news['pubDate'];

            //Ссылка из RSS на новость из источника
//            $readyData[$key]['link'] = trim($news['link']);

        }
        return $readyData;
    }

    private function getIdCategories($category):int
    {
        $categories = Category::query()->orderBy('id')->get();
        foreach ($categories as $item)
        {
            if($item->category == $category){
                return $item->id;
            }
        }
        $newCategory = new Category(['category' => $category]);

        $newCategory->save();
        return $newCategory->getKey();
    }
}
