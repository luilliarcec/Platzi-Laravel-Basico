@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Nuevo Gasto de {{ $report->title }}</h1>
            </div>
        </div>

        <div class="row my-3">
            <div class="col">
                <a class="btn btn-sm btn-dark" href="{{ route('expense_reports.show', $report->id) }}">Regresar</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="{{ route('expense.store', $report->id) }}" method="post">

                    @csrf

                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="description">Descripción</label>
                            <input type="text"
                                   class="form-control @error('description') is-invalid @enderror"
                                   id="description"
                                   placeholder="Descripción del gasto"
                                   name="description"
                                   value="{{ old('description') }}">

                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="amount">Monto</label>
                            <input type="number"
                                   step="any"
                                   class="form-control @error('amount') is-invalid @enderror"
                                   id="amount"
                                   placeholder="Monto del gasto"
                                   name="amount"
                                   value="{{ old('amount') }}">

                            @error('amount')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-sm btn-warning">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
