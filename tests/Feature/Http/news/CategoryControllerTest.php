<?php

namespace Tests\Feature\Http\news;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCategoriesPageSuccess(): void
    {
        $response = $this->get(route('news.groups'));

        $response->assertStatus(200);
        $response->assertSeeText('Soroka ToDay');
        $response->assertDontSeeText('Soroca ToDay');
        $response->assertDontSeeText('Soroka To Day');
        $response->assertDontSeeText('Soroka Today');
        $response->assertDontSeeText('Soroka today');

        $response->assertSeeText('Категории');
        $response->assertDontSeeText('категории');
        $response->assertDontSeeText('КАТЕГОРИИ');
    }
}
