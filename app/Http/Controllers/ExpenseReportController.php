<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use App\Http\Requests\StoreExpenseReport;
use App\Mail\SummaryReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class ExpenseReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @return void
     */
    public function index()
    {
        return view('expense-reports.index', [
            'expenseReports' => ExpenseReport::all(),
        ]);
    }

    /**
     * @return void
     */
    public function create()
    {
        return view('expense-reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreExpenseReport $request
     * @return Response
     */
    public function store(StoreExpenseReport $request)
    {
        $request->validated();

        $report = new ExpenseReport();
        $report->title = $request->get('title');
        $report->save();

        return redirect()->route('expense_reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param ExpenseReport $expenseReport
     * @return void
     */
    public function show(ExpenseReport $expenseReport)
    {
        return view('expense-reports.show', [
            'report' => $expenseReport,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expense-reports.edit', [
            'report' => $report,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreExpenseReport $request
     * @param int $id
     * @return Response
     */
    public function update(StoreExpenseReport $request, $id)
    {
        $request->validated();

        $report = ExpenseReport::findOrFail($id);
        $report->title = $request->get('title');
        $report->save();

        return redirect()->route('expense_reports.index');
    }

    /***
     * Show form for confirm delete
     *
     * @param $id
     * @return Response
     */
    public function confirmDelete($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expense-reports.delete', [
            'report' => $report,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::findOrFail($id);
        $report->delete($report);
        return redirect()->route('expense_reports.index');
    }

    /**
     * @param int $id
     * @return Response
     */
    public function confirmSendMail($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expense-reports.confirm-send-mail', [
            'report' => $report,
        ]);
    }

    public function sendMail(Request $request, $id)
    {
        $report = ExpenseReport::findOrFail($id);
        Mail::to($request->get('email'))->send(new SummaryReport($report));
        return redirect()->route('expense_reports.show', $id);
    }
}
