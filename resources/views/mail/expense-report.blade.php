<div class="row">
    <div class="col">
        <h1>Reporte de gastos {{ $report->id }}: {{ $report->title }}</h1>
        <h4><b>Total del reporte: $</b>{{ $report->expenses->sum('amount') }}</h4>
    </div>
</div>

<div class="row">
    <div class="col">
        <h2>Gastos</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Descripción</th>
                <th>Fecha de creación</th>
                <th>Monto</th>
            </tr>
            </thead>

            <tbody>
            @foreach($report->expenses as $expense)
                <tr>
                    <th>{{ $expense->description }}</th>
                    <th>{{ $expense->created_at }}</th>
                    <th>{{ $expense->amount }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
