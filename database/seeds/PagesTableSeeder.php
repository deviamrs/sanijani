<?php

use App\Model\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
          
            'page_name' => 'Products',
            'slug' => Str::slug('Products')
            
            
        ]);
        Page::create([
          
            'page_name' => 'Services',
            'slug' => Str::slug('Services')

        ]);
         
        Page::create([
            'page_name' => 'Locations',
            'slug' => Str::slug("Locations"),
        ]);
        Page::create([
          
            'page_name' => 'Press',
            'slug' => Str::slug("Press"),
            

        ]);
        Page::create([
          
            'page_name' => 'Testimonials',
            'slug' => Str::slug("Testimonials"),

        ]);
        Page::create([
            'page_name' => 'Contact',
            'slug' => Str::slug("Contact"),
        ]);
    }
}
