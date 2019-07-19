<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenseReportController extends Controller
{
    public function index()
    {
        return view('expense-reports.index', [
            'expenseReports' => ExpenseReport::all(),
        ]);
    }

    public function create()
    {
        return view('expense-reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $report = new ExpenseReport();
        $report->title = $request->get('title');
        $report->save();

        return redirect()->route('expense_reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::find($id);
        return view('expense-reports.edit', [
            'report' => $report,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $report = ExpenseReport::find($id);
        $report->title = $request->get('title');
        $report->save();

        return redirect()->route('expense_reports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
