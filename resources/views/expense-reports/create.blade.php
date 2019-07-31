@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Nuevo Reporte</h1>
            </div>
        </div>

        <div class="row my-3">
            <div class="col">
                <a class="btn btn-sm btn-dark" href="{{ route('expense_reports.index') }}">Regresar</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="{{ route('expense_reports.store') }}" method="post">

                    @csrf

                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="title">Title</label>
                            <input type="text"
                                   class="form-control @error('title') is-invalid @enderror"
                                   id="title"
                                   placeholder="Título del reporte"
                                   name="title"
                                   value="{{ old('title') }}">

                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-sm btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
