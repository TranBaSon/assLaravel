<?php

use Illuminate\Database\Seeder;

class feedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\studentFeedback::class,200)->create();

    }
}
