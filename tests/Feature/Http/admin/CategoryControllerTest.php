<?php

namespace Tests\Feature\Http\admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCategoriesListSuccess(): void
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
        $response->assertSeeText('Список категорий');
    }

    public function testCategoriesStoreSuccess()
    {
        $response = $this->post(route('admin.categories.store'));

        $response->assertStatus(302);
    }

    public function testNewsCreateSuccess()
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(200);
        $response->assertSeeText('Добавить категорию');
    }
}
