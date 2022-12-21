<?php

namespace Database\Seeders;

use App\Models\Calendar;
use Illuminate\Database\Seeder;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $calendar=new Calendar();
        $calendar->event_id=1;
        $calendar->start_day='2022-12-14';
        $calendar->end_day='2022-12-14';
        $calendar->save();

        $calendar=new Calendar();
        $calendar->event_id=2;
        $calendar->start_day='2022-12-1';
        $calendar->end_day='2022-12-5';
        $calendar->save();
    }
}
