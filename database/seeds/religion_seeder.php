<?php

use Illuminate\Database\Seeder;

class religion_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Islam','Kristen','Katholik','Hindu','Budha'];


        for($i=0;$i<count($name);$i++){
            App\Religion::create([
                'name'=> $name[$i],
                'slug'=> str_slug($name[$i])
            ]);
        }
    }
}
