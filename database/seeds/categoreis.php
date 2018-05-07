<?php

use Illuminate\Database\Seeder;

class categoreis extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\category::class,5)->create();
    }
}
