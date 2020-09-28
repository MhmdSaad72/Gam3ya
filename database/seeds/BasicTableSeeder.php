<?php

use Illuminate\Database\Seeder;
use App\Basic;
use App\Poor\Basic as PoorBasic ;
use App\Disabled\Basic as DisabledBasic ;

class BasicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $basics = Basic::create(['addetion' => 50 , 'guarantee' => 50]);
        $basics = PoorBasic::create(['addetion' => 50 , 'guarantee' => 50]);
        $basics = DisabledBasic::create(['addetion' => 50 , 'guarantee' => 50]);
    }
}
