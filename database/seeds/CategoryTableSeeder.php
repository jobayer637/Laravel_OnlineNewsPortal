<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
          'category_name'=>'Home',
          'category_slug'=>md5('home'),
      ]);
      DB::table('categories')->insert([
          'category_name'=>'Bangladesh',
          'category_slug'=>md5('bangladesh'),
      ]);
      DB::table('categories')->insert([
          'category_name'=>'Intronational',
          'category_slug'=>md5('intronational'),
      ]);
      DB::table('categories')->insert([
          'category_name'=>'Sports',
          'category_slug'=>md5('storts'),
      ]);
      DB::table('categories')->insert([
          'category_name'=>'Economy',
          'category_slug'=>md5('economy'),
      ]);
      DB::table('categories')->insert([
          'category_name'=>'Trade',
          'category_slug'=>md5('trade'),
      ]);
      DB::table('categories')->insert([
          'category_name'=>'LifeStyle',
          'category_slug'=>md5('lifeStyle'),
      ]);
      DB::table('categories')->insert([
          'category_name'=>'Culture',
          'category_slug'=>md5('culture'),
      ]);
      DB::table('categories')->insert([
          'category_name'=>'Education',
          'category_slug'=>md5('education'),
      ]);
      DB::table('categories')->insert([
          'category_name'=>'ScienceAndTech',
          'category_slug'=>md5('scienceAndTech'),
      ]);
      DB::table('categories')->insert([
          'category_name'=>'Entertainment',
          'category_slug'=>md5('entertainment'),
      ]);
    }
}
