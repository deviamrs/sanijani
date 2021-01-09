<?php

use App\Model\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        Setting::create([
            
            'address' => "Abc Street USA", 
            'map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3717.1911302362823!2d-157.85288418470188!3d21.303462783718558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7c006de732215d33%3A0x6a9441cc6e7205cc!2s846%20S%20Hotel%20St%2C%20Honolulu%2C%20HI%2096813%2C%20USA!5e0!3m2!1sen!2sin!4v1606382413916!5m2!1sen!2sin', 
            'phone' => '+1 (808) 523-0449', 
            'mail_id' => 'richard.p.mcclellan@gmail.com', 
            'instagram' => 'https://www.linkedin.com/',
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://www.twitter.com/'
        ]);
    }
}
