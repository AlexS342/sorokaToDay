<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\Resource;
use App\Services\Interfaces\Parser;
use Illuminate\Http\Request;


class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parserService)
    {
//        $arrayLinkRss = [
//            'lentaRSS' => 'https://lenta.ru/rss',
//            'komersantRSS' => 'https://www.kommersant.ru/RSS/corp.xml',
//            'ramblerRSS1' => 'https://news.rambler.ru/rss/world/',
//            'ramblerRSS2' => 'https://news.rambler.ru/rss/community/',
//            'ramblerRSS3' => 'https://news.rambler.ru/rss/politics/',
//            'ramblerRSS4' => 'https://news.rambler.ru/rss/incidents/',
//            'ramblerRSS5' => 'https://news.rambler.ru/rss/tech/',
//            'ramblerRSS6' => 'https://news.rambler.ru/rss/army/',
//            'ramblerRSS7' => 'https://news.rambler.ru/rss/games/',
//            'ramblerRSS8' => 'https://news.rambler.ru/rss/starlife/',
//            'ramblerRSS9' => 'https://news.rambler.ru/rss/articles/',
//            'AiFRSS' => 'https://aif.ru/rss/paper.php',
//        ];
        $arrayLinkRss = Resource::query()->get();


        foreach ($arrayLinkRss as $linkRss)
        {
            dispatch(new NewsParsingJob($linkRss->linkResource));
        }

        return redirect(route('admin.index'));
    }
}
