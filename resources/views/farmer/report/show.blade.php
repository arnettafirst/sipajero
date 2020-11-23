@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Laporan</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="font-weight-600 text-primary">Tanggal :</span> {{ $report->created_at }}</li>
                                <li class="list-group-item"><span class="font-weight-600 text-primary">Judul :</span> {{ $report->title}}</li>
                                <li class="list-group-item"><span class="font-weight-600 text-primary">Nama Pelapor :</span> {{ $report->user()->first()->firstname }}</li>
                                <li class="list-group-item"><span class="font-weight-600 text-primary">Laporan :</span> <br>{!! $report->contents !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
