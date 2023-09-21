<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class CreateCaregoryFormTest extends DuskTestCase
{
    /**
     * @throws Throwable
     * Проверяем, что есть валидация на минимальное количество символов в поле category
     */
    public function testFormAddCategoryInputCategoryMinChar(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('category', 'По')
                ->press('Добавить')
                ->assertSee('Количество символов в поле Название категории должно быть не меньше 3.');
        });
    }

    /**
     * Проверяем, что есть валидация на максимальное количество символов в поле category
     */
    public function testFormAddCategoryInputCategoryMaxChar(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('category', 'Количество символов в полКоличество символов в полКоличество символов в полКоличество символов в поле')
                ->press('Добавить')
                ->assertSee('Количество символов в поле Название категории не может превышать 100.');
        });
    }

    /**
     * Проверяем, что есть валидация на минимальное количество символов в поле description
     */
    public function testFormAddCategoryInputDescriptionMinChar(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('description', 'Все о природе')
                ->press('Добавить')
                ->assertSee('Количество символов в поле Прикрепите иконку для категории должно быть не меньше 20.');
        });
    }

    /**
     * Проверяем, что есть валидация на максимальное количество символов в поле description
     */
    public function testFormAddCategoryInputDescriptionMaxChar(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('description', 'Количество символов в полКоличество символов в полКоличество символов в полКоличество символов в полКоличество символов в полКоличество символов в полКоличество символов в полКоличество символов в полКоличество символов в полКоличество символов в поле')
                ->press('Добавить')
                ->assertSee('Количество символов в поле Прикрепите иконку для категории не может превышать 250.');
        });
    }

    /**
     * Проверяем, что есть валидация на тип файла в поле image
     */
    public function testFormAddCategoryInputImgBadFile(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->attach('image', __DIR__.'/ExampleTest.php')
                ->press('Добавить')
                ->assertSee('Поле иконка должно быть изображением.');
        });
    }


    /**
     * Проверяем, что правильно заполненые поля (без поля image) успешно отправляются в store
     */
    public function testFormAddCategoryGoodNoImage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('category', 'Популярное')
                ->type('description', 'Количество символов в полКоличество символов в пол')
                ->press('Добавить')
                ->assertSee('Количество символов в поле Прикрепите иконку для категории не может превышать 250.');
        });
    }

    /**
     * Проверяем, что правильно заполненые поля (c image) успешно отправляются в store
     */
    public function testFormAddCategoryGoodYesImage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->screenshot('scrin')
                ->type('category', 'Астрономия')
                ->type('description', 'Количество символов в полКоличество символов в пол')
                ->attach('image', __DIR__.'/screenshots/scrin.png')
                ->press('Добавить')
                ->assertSee('Категория успешно добавлена');
        });
    }
}

