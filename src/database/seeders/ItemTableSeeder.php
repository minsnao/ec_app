<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Category;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item1 = Item::create([
            'user_id' => 1,
            'title' => '腕時計',
            'price' => 15000,
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Armani+Mens+Clock.jpg',
            'condition' => '良好',
            'brand' => 'サンプルブランド',
            
        ]);
        $item1->categories()->attach([1]);

        $item2 = Item::create([
            'user_id' => 1,
            'title' => 'HDD',
            'price' => 5000,
            'description' => '高速で信頼性の高いハードディスク',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/HDD+Hard+Disk.jpg',
            'condition' => '目立った傷や汚れなし',
            'brand' => 'サンプルブランド',
            
        ]);
        $item2->categories()->attach([1, 2]);

        $item3 = Item::create([
            'user_id' => 1,
            'title' => '玉ねぎ3束',
            'price' => 300,
            'description' => '新鮮な玉ねぎ3束のセット',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/iLoveIMG+d.jpg',
            'condition' => 'やや傷や汚れあり',
            'brand' => 'sample',
            
        ]);
        $item3->categories()->attach([1, 2, 3]);

        $item4 = Item::create([
            'user_id' => 1,
            'title' => '革靴',
            'price' => 4000,
            'description' => 'クラシックなデザインの革靴',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Leather+Shoes+Product+Photo.jpg',
            'condition' => '状態が悪い',
            'brand' => 'sample',
            
        ]);
        $item4->categories()->attach([2, 3, 4]);

        $item5 = Item::create([
            'user_id' => 1,
            'title' => 'ノートPC',
            'price' => 45000,
            'description' => '高性能なノートパソコン',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Living+Room+Laptop.jpg',
            'condition' => '良好',
            'brand' => 'さんぷる',
            
        ]);
        $item5->categories()->attach([3, 4, 5]);

        $item6 = Item::create([
            'user_id' => 1,
            'title' => 'マイク',
            'price' => 8000,
            'description' => '高音質のレコーディング用マイク',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Music+Mic+4632231.jpg',
            'condition' => '目立った傷や汚れなし',
            'brand' => 'さんぷる',
            
        ]);
        $item6->categories()->attach([4, 5, 6]);

        $item7 = Item::create([
            'user_id' => 1,
            'title' => 'ショルダーバッグ',
            'price' => 3500,
            'description' => 'おしゃれなショルダーバッグ',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse+fashion+pocket.jpg',
            'condition' => 'やや傷や汚れあり',
            'brand' => 'テスト用',
            
        ]);
        $item7->categories()->attach([5, 6, 7]);

        $item8 = Item::create([
            'user_id' => 1,
            'title' => 'タンブラー',
            'price' => 500,
            'description' => '使いやすいタンブラー',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Tumbler+souvenir.jpg',
            'condition' => '状態が悪い',
            'brand' => 'テスト用',
            
        ]);
        $item8->categories()->attach([6, 7, 8]);

        $item9 = Item::create([
            'user_id' => 1,
            'title' => 'コーヒーミル',
            'price' => 4000,
            'description' => '手動のコーヒーミル',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Waitress+with+Coffee+Grinder.jpg',
            'condition' => '良好',
            'brand' => 'A',
            
        ]);
        $item9->categories()->attach([7, 8, 9]);

        $item10 = Item::create([
            'user_id' => 1,
            'title' => 'メイクセット',
            'price' => 2500,
            'description' => '便利なメイクアップセット',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/%E5%A4%96%E5%87%BA%E3%83%A1%E3%82%A4%E3%82%AF%E3%82%A2%E3%83%83%E3%83%95%E3%82%9A%E3%82%BB%E3%83%83%E3%83%88.jpg',
            'condition' => '目立った傷や汚れなし',
            'brand' => 'A',
            
        ]);
        $item10->categories()->attach([8, 9, 10]);
    }
}
