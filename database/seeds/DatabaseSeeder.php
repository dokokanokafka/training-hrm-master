<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**¥
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // db:seedで生成対象とするため登録
        $this->call(EngineerTableSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
