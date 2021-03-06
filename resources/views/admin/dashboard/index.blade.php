@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Petani</h4>
                        </div>
                        <div class="card-body">
                            {{ $farmers }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Informasi</h4>
                        </div>
                        <div class="card-body">
                            {{ $informations }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-question-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Laporan</h4>
                        </div>
                        <div class="card-body">
                            {{ $reports }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-comments"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Diskusi</h4>
                        </div>
                        <div class="card-body">
                            {{ $discussions }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="{{ $production_chart->options['column_class'] }}">
                <div class="card">
                    <div class="card-header">
                        <h4>{!! $production_chart->options['chart_title'] !!}</h4>
                    </div>
                    <div class="card-body">
                        {!! $production_chart->renderHtml() !!}
                    </div>
                </div>
            </div>
            <div class="{{ $forecast_chart->options['column_class'] }}">
                <div class="card">
                    <div class="card-header">
                        <h4>{!! $forecast_chart->options['chart_title'] !!}</h4>
                    </div>
                    <div class="card-body">
                        {!! $forecast_chart->renderHtml() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" integrity="sha512-HCG6Vbdg4S+6MkKlMJAm5EHJDeTZskUdUMTb8zNcUKoYNDteUQ0Zig30fvD9IXnRv7Y0X4/grKCnNoQ21nF2Qw==" crossorigin="anonymous"></script>
    {!! $production_chart->renderJs() !!}
    {!! $forecast_chart->renderJs() !!}
@endsection
