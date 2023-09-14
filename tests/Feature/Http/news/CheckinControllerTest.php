<?php

namespace Tests\Feature\Http\news;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckinControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCheckinPageSuccess(): void
    {
        $response = $this->get(route('news.checkin'));

        $response->assertStatus(200);
        $response->assertSeeText('Soroka ToDay');
        $response->assertDontSeeText('Soroca ToDay');
        $response->assertDontSeeText('Soroka To Day');
        $response->assertDontSeeText('Soroka Today');
        $response->assertDontSeeText('Soroka today');

        $response->assertSeeText('Регистрация');
        $response->assertSeeText('Я прочитал и приния условия сайта');
    }
}
