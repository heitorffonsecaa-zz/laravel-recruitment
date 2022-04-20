<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatesAndCitiesSeeder extends Seeder
{
    CONST URL_JSON = "https://gist.githubusercontent.com/letanure/3012978/raw/78474bd9db11e87de65a9d3c9fc4452458dc8a68/estados-cidades.json";


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = json_decode(file_get_contents(self::URL_JSON), true);

        foreach ($obj['estados'] as $estado){
            $state = State::create([
                'name' => $estado['nome'],
                'abbreviation' => $estado['sigla']
            ]);

            foreach ($estado['cidades'] as $key => $cidade){
                $state->cities()->create([
                    'name' => $cidade
                ]);
            }
        }
    }
}
