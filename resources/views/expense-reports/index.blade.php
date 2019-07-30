@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Reportes</h1>
            </div>
        </div>

        <div class="row my-3">
            <div class="col">
                <a class="btn btn-sm btn-success" href="{{ route('expense_reports.create') }}">Nuevo Reporte</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($expenseReports as $expense)
                            <tr>
                                <td>
                                    <a href="{{ route('expense_reports.show', $expense->id) }}">
                                        {{ $expense->title }}
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-danger"
                                       href="{{ route('expense_reports.confirmDelete', $expense->id) }}"><i
                                            class="fas fa-trash-alt"></i></a>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('expense_reports.edit', $expense->id) }}"><i
                                            class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
