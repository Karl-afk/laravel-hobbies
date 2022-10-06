<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = [
            'Sport' => 'bg-primary text-white', // blau
            'Entspannung' => 'bg-secondary text-white', // grau-grau
            'Fun' => 'bg-warning text-white', // gelb
            'Natur' => 'bg-success text-white', // grün
            'Inspiration' => 'bg-light text-black', // weiß-grau
            'Freunde' => 'bg-info text-white', // türkis
            'Liebe' => 'bg-danger text-white', // rot
            'Interesse' => 'bg-dark text-white' // schwarz-weiss
        ];
        foreach ($tags as $key => $value) {
            $tag = new Tag(
                [
                    'name' => $key,
                    'style' => $value
                ]
            );
            $tag->save();
        }
    }
}
