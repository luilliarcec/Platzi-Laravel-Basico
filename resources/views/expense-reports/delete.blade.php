@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Eliminar Reporte {{ $report->id  }}</h1>
            <h3>¿Está seguro de eliminar este reporte?</h3>
        </div>
    </div>

    <div class="row my-3">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('expense_reports.index') }}">Atrás</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="{{ route('expense_reports.destroy', $report->id) }}" method="post">

                @csrf
                @method('DELETE')

                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label>Reporte: {{ $report->title }}</label>
                    </div>
                </div>

                <button class="btn btn-primary">Eliminar</button>
            </form>
        </div>
    </div>
@endsection

