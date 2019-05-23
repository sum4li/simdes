<?php

use Illuminate\Database\Seeder;

class hamlet_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['kacangan','pelemrenteng','watulawang','pakis','brangkal'];


        for($i=0;$i<count($name);$i++){
            App\Hamlet::create([
                'name'=> $name[$i],
                'slug'=> str_slug($name[$i])
            ]);
        }
    }
}
