<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
//            CategorySeeder::class,
//            NewsSeeder::class,
            ResourceSeeder::class
        ]);

         User::factory(5)->create();

         User::factory()->create([
             'name' => '*****',     //  <= Вписать имя администрарора, например 'Admin'
             'email' => '******@*****.***', //  <= Вписать email админа, он же login, например 'admin@admin.ru'
             'password' => Hash::make('*****'), //  <= Вписать пароль, например 'admin'
             'is_admin' => true
         ]);
    }
}
