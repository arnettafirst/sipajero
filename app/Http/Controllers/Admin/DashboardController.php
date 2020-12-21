<?php

namespace App\Http\Controllers\Admin;

use App\Discussion;
use App\Http\Controllers\Controller;
use App\Information;
use App\Report;
use App\User;
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
        $farmers = User::where('role', 'farmer')->count();
        $informations = Information::count();
        $reports = Report::count();
        $discussions = Discussion::count();

        $production_chart_settings = [
            'chart_title'           => 'Grafik Hasil Panen Jeruk / Bulan',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Harvest',
            'group_by_field'        => 'month',
            'group_by_period'       => 'month',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'production',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d',
            'column_class'          => 'col-12',
            'entries_number'        => '5',
        ];

        $production_chart = new LaravelChart($production_chart_settings);

        return view('admin.dashboard.index', compact('farmers', 'informations', 'reports', 'discussions', 'production_chart'));
    }
}
