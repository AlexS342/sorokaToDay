<?php

namespace Tests\Feature\Http\news;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testNewPageSuccess(): void
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
        $response->assertSeeText('Soroka ToDay');
        $response->assertDontSeeText('Soroca ToDay');
        $response->assertDontSeeText('Soroka To Day');
        $response->assertDontSeeText('Soroka Today');
        $response->assertDontSeeText('Soroka today');
    }

    public function testShowPageSuccess(): void
    {
        $response = $this->get(route('news.show', ['id' => 1]));

        $response->assertStatus(200);
    }

    public function testShowPageError(): void
    {
        $response = $this->get(route('news.show', ['id' => 'k']));

        $response->assertStatus(404);
    }
}


//----------------

//class NewsController extends TestCase
//{
//    /**
//     * A basic feature test example.
//     */
//    public function testNewsListSuccess(): void
//    {
//        $response = $this->get(route('admin.news.index'));
//
//        $response->assertStatus(200);
//        $response->assertSeeText('Список новостей');
//    }
//
//    public function testNewsStoreSuccess()
//    {
//        $response = $this->post(route('admin.news.store'), /*$postData*/);
//        $response->assertStatus(302);
//    }
//}
