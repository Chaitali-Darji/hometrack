<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create(['name' => 'DC']);
        State::create(['name' => 'AL']);
        State::create(['name' => 'AK']);
        State::create(['name' => 'AZ']);
        State::create(['name' => 'AR']);
        State::create(['name' => 'CA']);
        State::create(['name' => 'CO']);
        State::create(['name' => 'CT']);
        State::create(['name' => 'DE']);
        State::create(['name' => 'FL']);
        State::create(['name' => 'GA']);
        State::create(['name' => 'HI']);
        State::create(['name' => 'ID']);
        State::create(['name' => 'IL']);
        State::create(['name' => 'IN']);
        State::create(['name' => 'IA']);
        State::create(['name' => 'KS']);
        State::create(['name' => 'KY']);
        State::create(['name' => 'LA']);
        State::create(['name' => 'ME']);
        State::create(['name' => 'MD']);
        State::create(['name' => 'MA']);
        State::create(['name' => 'MI']);
        State::create(['name' => 'MN']);
        State::create(['name' => 'MS']);
        State::create(['name' => 'MO']);
        State::create(['name' => 'MT']);
        State::create(['name' => 'NE']);
        State::create(['name' => 'NV']);
        State::create(['name' => 'NH']);
        State::create(['name' => 'NE']);
        State::create(['name' => 'NJ']);
        State::create(['name' => 'NM']);
        State::create(['name' => 'NY']);
        State::create(['name' => 'NC']);
        State::create(['name' => 'ND']);
        State::create(['name' => 'OH']);
        State::create(['name' => 'OK']);
        State::create(['name' => 'OR']);
        State::create(['name' => 'PA']);
        State::create(['name' => 'RI']);
        State::create(['name' => 'SC']);
        State::create(['name' => 'SD']);
        State::create(['name' => 'TN']);
        State::create(['name' => 'TX']);
        State::create(['name' => 'UT']);
        State::create(['name' => 'VT']);
        State::create(['name' => 'VA']);
        State::create(['name' => 'WA']);
        State::create(['name' => 'WV']);
        State::create(['name' => 'WI']);
        State::create(['name' => 'WY']);
    }
}