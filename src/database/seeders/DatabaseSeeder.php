<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        $user->profile()->create([
            'postal_code' => '123-4567',
            'address' => '東京都渋谷区1-2-3',
            'building' => '渋谷ビル101',
        ]);

        $this->call([
            CategorySeeder::class,
            ItemTableSeeder::class,
        ]);
    }
}
