<?php

namespace Tests\Feature\Http\admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get(route('admin.index'));

        $response->assertStatus(200);
        $response->assertSeeText('Админка');
    }
}
