<?php

namespace Tests\Feature\Http\news;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemCategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testItemCategoryPageSuccess(): void
    {
        $response = $this->get(route('news.category', ['id' => 1]));

        $response->assertStatus(200);
        $response->assertSeeText('Soroka ToDay');
        $response->assertDontSeeText('Soroca ToDay');
        $response->assertDontSeeText('Soroka To Day');
        $response->assertDontSeeText('Soroka Today');
        $response->assertDontSeeText('Soroka today');
    }

    public function testItemCategoryPageError(): void
    {
        $response = $this->get(route('news.category', ['id' => 'a']));

        $response->assertStatus(500);

    }
}
