<?php

use Illuminate\Database\Seeder;

class EngineerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //一括削除したい場合
        // User::truncate();
        \App\Engineer::truncate();

        //factoryを利用
        // factory(User::class, 11)->create();
        // factory(\App\Engineer::class, 11)->create('ja_JP');
        factory(\App\Engineer::class, 11)->create();
    }
}
