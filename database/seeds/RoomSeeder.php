<?php

use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room = new  \App\Room();
        $room->name = 'Phong 1';
        $room->room_type_id = 1;
        $room->save();
    }
}
