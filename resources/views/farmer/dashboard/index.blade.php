@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Peramalan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Bulan</th>
                                    <th>Peramalan</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($harvests as $i => $harvest)
                                    <tr>
                                        <td class="text-center">
                                            {{ $i+1 }}
                                        </td>
                                        <td>{{ $harvest->month->format('M') }}</td>
                                        <td>{{ $harvest->forecast }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            {{ $harvests->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" integrity="sha512-HCG6Vbdg4S+6MkKlMJAm5EHJDeTZskUdUMTb8zNcUKoYNDteUQ0Zig30fvD9IXnRv7Y0X4/grKCnNoQ21nF2Qw==" crossorigin="anonymous"></script>
    {!! $forecast_chart->renderJs() !!}
@endsection
