<?php

namespace Tests\Feature\Http\news;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testLoginPageSuccess(): void
    {
        $response = $this->get(route('news.login'));

        $response->assertStatus(200);
        $response->assertSeeText('Soroka ToDay');
        $response->assertDontSeeText('Soroca ToDay');
        $response->assertDontSeeText('Soroka To Day');
        $response->assertDontSeeText('Soroka Today');
        $response->assertDontSeeText('Soroka today');

        $response->assertSeeText('Авторизация');
    }
}
