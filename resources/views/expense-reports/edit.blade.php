@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Editar Reporte {{ $report->id  }}</h1>
        </div>
    </div>

    <div class="row my-3">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('expense_reports.index') }}">Atrás</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="{{ route('expense_reports.update', $report->id) }}" method="post">

                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label for="title">Title</label>
                        <input type="text"
                               class="form-control"
                               id="title"
                               placeholder="Título del reporte"
                               name="title"
                               value="{{ $report->title }}"
                        >
                        <div class="invalid-feedback">
                            Error.
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
