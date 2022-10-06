<?php

namespace Database\Seeders;

use App\Models\Hobby;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::factory()->count(100)->create()
            ->each(function ($user) {
                Hobby::factory()->count(rand(1, 10))->create([
                    'user_id' => $user->id
                ])
                    ->each(function ($hobby) {
                        $tags = Tag::all();
                        $tag_ids = array();
                        foreach ($tags as $tag) {
                            $tag_ids[] = $tag->id;
                        }
                        shuffle($tag_ids);
                        $verknuepfungen = array_slice($tag_ids, 0, rand(0, 8));
                        foreach ($verknuepfungen as $key) {
                            # code...
                            DB::table('hobby_tag')
                                ->insert([
                                    'hobby_id' => $hobby->id,
                                    'tag_id' => $key,
                                    'created_at' => now(),
                                    'updated_at' => now()
                                ]);
                        }
                    });
            });
    }
}
