<?php

use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomType = new \App\RoomType();
        $roomType->name = "Suite Room";
        $roomType->price = 100;
        $roomType->description = "All Suite rooms are thoughtfully designed. The view of the Aravali range and the Amber fort can be Admired from every room.• Two spacious art deco rooms with King size four posture canopy bed & separate sitting and living room for 5-6• stunning view of the Amber Fort• Recliner Chair• Dining table for 2• Vanity area• Carpet flooring• bright natural light from windows• energy saving switches• treated fresh and cool air with individual controls for living room and bed room• 2 minibars• Tea/Coffee maker• 32” Hitachi LCD TVs with choice of local and international channels• DVD Player• Hi-speed Wired / Wi-Fi Internet• Electronic In-room safes• Iron & Ironing board• magnifying shaving mirror• Hair Dryer• attached toilet with bath and Jacuzzi• superior bathroom amenities• bath robes• room slippers• luggage storage and cupboard• 24hrs In room dinning.";
        $roomType->image = "room-1.jpg";
        $roomType->save();

        $roomType = new \App\RoomType();
        $roomType->name = "Classic Room";
        $roomType->price = 110;
        $roomType->description = "These rooms are located in the building nearest the hotel lobby. They are sunny rooms that each feature a terrace, two single beds (105cm) or a double bed (available on request and subject to availability), full bathroom with hair dryer, free WiFi, mini-bar and air conditioning.";
        $roomType->image = "room-5.jpg";
        $roomType->save();

        $roomType = new \App\RoomType();
        $roomType->name = "Family Room";
        $roomType->price = 130;
        $roomType->description = "Comfort family room for 3 persons with bathroom (shower/bath, toilet, washbasin";
        $roomType->image = "room-2.jpg";
        $roomType->save();

        $roomType = new \App\RoomType();
        $roomType->name = "Deluxe Room";
        $roomType->price = 140;
        $roomType->description = "All the rooms are thoughtfully designed. The view of the Aravali range and the Amber fort can be Admired from every room. • All rooms are provided with double / twin beds with spring mattresses• Non-Smoking rooms• Mini Bar• Wi-Fi• Tea/Coffee making facility• Marble flooring• bright natural light from windows• Energy saving switches• Constant circulation of treated fresh and cool air with individual room control• 32” LED TV with choice of local and international channels• Attached toilet and bath with large Bath Tub• superior bathroom amenities• luggage storage and cupboard• 24hrs In room dining• DVD Player• Hair Dryer• Iron & Ironing Board on request";
        $roomType->image = "room-3.jpg";
        $roomType->save();

        $roomType = new \App\RoomType();
        $roomType->name = "Luxury Room";
        $roomType->price = 150;
        $roomType->description = "Tailored for sophistication and the needs of modern-day travel, the Luxury Rooms serve as indoor sanctuaries for our esteemed patrons. Fitted with all the trappings of a five-star establishment, these rooms afford guests with an opportunity for repose against the backdrop of the majestic Outeniqua mountain range";
        $roomType->image = "room-4.jpg";
        $roomType->save();

        $roomType = new \App\RoomType();
        $roomType->name = "Superior Room";
        $roomType->price = 160;
        $roomType->description = "The Superior Room comprises of 1 Double bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. This room is larger than the Standard Room and is therefore spacious enough for an additional bed for triple occupancy. (Triple Room). The room is furnished with wall to wall carpeting, trendy furnishings and a balcony. Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.
A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms are also available.";
        $roomType->image = "room-6.jpg";
        $roomType->save();
    }
}
