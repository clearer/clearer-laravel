<?php

use Illuminate\Database\Seeder;

class IdeaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Idea::class, 100)->create();
    }
}
