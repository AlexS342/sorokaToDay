<?php

namespace Tests\Feature\Http\admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
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
        $response = $this->post(route('admin.news.store'));
        $response->assertStatus(302);
    }

    public function testNewsCreateSuccess()
    {
        $response = $this->get(route('admin.news.create'));
        $response->assertStatus(200);
    }
}
