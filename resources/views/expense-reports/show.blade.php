@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Detalle del Reporte: {{ $report->title  }}</h1>
            <h5><b>Total de gastos: </b>$ {{ $report->expenses->sum('amount') }}</h5>
        </div>
    </div>

    <div class="row my-3">
        <div class="col">
            <a class="btn btn-sm btn-dark" href="{{ route('expense_reports.index') }}">Regresar</a>
            <a class="btn btn-sm btn-primary" href="{{ route('expense_reports.confirmSendMail', $report->id) }}">
                Enviar Reporte por Email</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h4>Gastos de este reporte</h4>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Fecha de creación</th>
                        <th>Monto</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($report->expenses as $expense)
                        <tr>
                            <td>{{ $expense->description }}</td>
                            <td>{{ $expense->created_at }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td><a class="btn btn-sm btn-danger"
                                   href="{{ route('expense.destroy', [$report->id, $expense->id]) }}"><i
                                        class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class="btn btn-sm btn-warning" href="{{ route('expense.create', $report->id) }}">Nuevo gasto</a>
        </div>
    </div>
@endsection
