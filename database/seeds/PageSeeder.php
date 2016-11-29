<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('pages')->delete();
        for ($i = 0; $i < 10; $i++) {
        	\App\Page::create([
        	'title'=>'Title'.$i,
        	'slug'=>'sulg'.$i,
        	'body'=>'body'.$i,
        	'user_id'=>1,
        	
        	]);
        }
    }
}
