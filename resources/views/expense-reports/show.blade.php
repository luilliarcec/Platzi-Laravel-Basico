@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Reporte {{ $report->title  }}</h1>
        </div>
    </div>

    <div class="row my-3">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('expense_reports.index') }}">Atrás</a>
        </div>
    </div>

    <div class="row">
        <h3>Detalles</h3>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">
                @foreach($report->expenses as $expense)
                    <tr>
                        <td>{{ $expense->description }}</td>
                        <td>{{ $expense->created_at }}</td>
                        <td>{{ $expense->amount }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class="btn btn-warning" href="{{ route('expense.create', $report->id) }}">Nuevo gasto</a>
        </div>
    </div>
@endsection
