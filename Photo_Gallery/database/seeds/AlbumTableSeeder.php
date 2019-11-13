<?php

use Illuminate\Database\Seeder;
use App\Album;

class AlbumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $album = new Album();
        $album->albumName = 'mensen';
        $album->save();

        $album2 = new Album();
        $album2->albumName = 'dieren';
        $album2->save();
    }
}
