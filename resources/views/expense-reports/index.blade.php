@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Reportes</h1>
        </div>
    </div>

    <div class="row my-3">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('expense_reports.create') }}">Nuevo Reporte</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">
                @foreach($expenseReports as $expense)
                    <tr>
                        <td>
                            {{ $expense->title }}
                        </td>
                        <td>
                            <a class="btn btn-danger" href="">Eliminar</a>
                            <a class="btn btn-primary" href="">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
