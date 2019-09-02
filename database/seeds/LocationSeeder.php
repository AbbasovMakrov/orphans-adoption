<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            "name" => "Al Anbar"
        ]);
        Location::create([
            "name" => "Babil"
        ]);
        Location::create([
            "name" => "Baghdad"
        ]);
        Location::create([
            "name" => "Basra"
        ]);
        Location::create([
            "name" => "Dhi Qar"
        ]);
        Location::create([
            "name" => "Al-Qādisiyyah"
        ]);
        Location::create([
            "name" => "Diyala"
        ]);
        Location::create([
            "name" => "Dohuk"
        ]);
        Location::create([
            "name" => "Erbil"
        ]);
        Location::create([
            "name" => "Karbala"
        ]);
        Location::create([
            "name" => "Kirkuk"
        ]);
        Location::create([
            "name" => "Maysan"
        ]);
        Location::create([
            "name" => "Muthanna"
        ]);
        Location::create([
            "name" => "Najaf"
        ]);
        Location::create([
            "name" => "Nineveh"
        ]);
        Location::create([
            "name" => "Saladin"
        ]);
        Location::create([
            "name" => "Sulaymaniyah"
        ]);
        Location::create([
            "name" => "Wasit"
        ]);

    }
}
