@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Enviar reporte de {{ $report->title }}</h1>
            </div>
        </div>

        <div class="row my-3">
            <div class="col">
                <a class="btn btn-dark btn-sm" href="{{ route('expense_reports.show', $report->id) }}">Regresar</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="{{ route('expense_reports.sendMail', $report->id) }}" method="post">

                    @csrf

                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="email">Email:</label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   placeholder="Email del receptor"
                                   name="email"
                                   value="{{ old('email') }}">

                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm">Enviar Mail</button>
                </form>
            </div>
        </div>
    </div>
@endsection
