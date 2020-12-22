<?php

namespace App\Http\Controllers\Farmer;

use App\Harvest;
use App\Http\Controllers\Controller;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $harvests = Harvest::orderBy('month', 'ASC')->paginate(4);

        $forecast_chart_settings = [
            'chart_title'           => 'Grafik Peramalan Hasil Panen Jeruk / Bulan',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Harvest',
            'group_by_field'        => 'month',
            'group_by_period'       => 'month',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'forecast',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d',
            'column_class'          => 'col-lg-6',
            'entries_number'        => '5',
        ];

        $forecast_chart = new LaravelChart($forecast_chart_settings);

        return view('farmer.dashboard.index', compact('harvests', 'forecast_chart'));
    }
}
