<?php

namespace Tests\Feature\Http\news;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testAboutPageSuccess(): void
    {
        $response = $this->get(route('news.about'));

        $response->assertStatus(200);
        $response->assertSeeText('Soroka ToDay');
        $response->assertDontSeeText('Soroca ToDay');
        $response->assertDontSeeText('Soroka To Day');
        $response->assertDontSeeText('Soroka Today');
        $response->assertDontSeeText('Soroka today');

        $response->assertSeeText('Новости от сороки  на каждый день');
        $response->assertSeeText('Предложить свою новость');
        $response->assertSeeText('Обратная связь');
    }
}
