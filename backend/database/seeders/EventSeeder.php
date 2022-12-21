<?php

namespace Database\Seeders;

use App\Models\Events;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event=new Events();
        $event->title='WTH Holiday';
        $event->short_story='the date of shipment is not calculated';
        $event->icon='fa fa-home';
        $event->color="bg-color-blueLight";
        $event->save();

        $event=new Events();
        $event->title='Japan Holiday';
        $event->short_story='no shipment during holidays in Japan';
        $event->icon='fa fa-info';
        $event->color="bg-color-orange";
        $event->save();

        $event=new Events();
        $event->title='Songkrang Holiday';
        $event->short_story='no description';
        $event->icon='fa fa-info';
        $event->color="bg-color-darken";
        $event->save();

        $event=new Events();
        $event->title='WTH Holiday';
        $event->short_story='no description';
        $event->icon='fa fa-info';
        $event->color="bg-color-red";
        $event->save();
    }
    
}
