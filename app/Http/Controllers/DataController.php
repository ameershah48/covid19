<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        // ini_set('max_execution_time',30);
        // ini_set('max_input_time',60); 
        // ini_set('memory_limit','8M');
         
        $cases = DB::table('dates')
                    ->leftJoin('clusters', 'clusters.date_announced', 'dates.date')
                    ->leftJoin('cases_state', 'cases_state.date', 'dates.date')
                    ->leftJoin('deaths_state', 'deaths_state.date', 'dates.date')
                    ->leftJoin('hospital', 'hospital.date', 'dates.date')
                    ->leftJoin('icu', 'icu.date', 'dates.date')
                    ->select(
                        'dates.date as date', 
                        'cases_state.cases_new', 
                        'deaths_state.deaths_new', 
                        'clusters.cases_total as cluster_cases',
                        'clusters.tests as cluster_tests',
                        'clusters.deaths as cluster_deaths',
                        'clusters.recovered as cluster_recovered',
                        'hospital.admitted_total as admitted_total',
                        'hospital.discharged_total as discharged_total',
                        'icu.icu_covid as icu_covid',
                        'icu.vent_covid as vent_covid',
                        )
                    ->orderBy('dates.date', 'desc')
                    ->paginate(50);

        return view('welcome', compact('cases'));

        // $date = "2020-03-01";
        // $datework = Carbon::createFromDate($date);
        // $now = Carbon::now();
        // $testdate = $datework->diffInDays($now);

        // for ($i=0; $i < $testdate; $i++) {
        //     $dates[$i] = $datework->toDateString();
        //     DB::table('dates')->insert(
        //         ['date' => $datework]
        //     );
        //     $datework = $datework->addDays(1);
        // }

        // return $dates;
    }
}
