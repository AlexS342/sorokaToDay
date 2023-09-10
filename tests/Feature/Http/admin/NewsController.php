<?php

namespace Tests\Feature\Http\admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsController extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testNewsListSuccess(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
        $response->assertSeeText('Список новостей');
    }

    public function testNewsStoreSuccess()
    {
        $postData = [
            'title' => 'title',
            'author' => 'Alex',
            'status' => 'draft',
            'miniDescription' => 'asdfvasdfv',
            'description' => 'adfbadbasdfvbad'
        ];
        $response = $this->post(route('admin.news.index'), $postData);
        $response->assertStatus(200);
        $response->assertJson($postData);
    }
}
