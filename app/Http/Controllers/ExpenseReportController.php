<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use App\Http\Requests\StoreExpenseReport;
use App\Mail\SummaryReport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use \Illuminate\Auth\Access\AuthorizationException;

class ExpenseReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(ExpenseReport::class, 'expense_report');
    }


    /**
     * @return void
     */
    public function index()
    {
        return view('expense-reports.index', [
            'expenseReports' => ExpenseReport::where('user_id', Auth::user()->id)->get(),
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
        $report->user_id = Auth::user()->id;
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
     * @param ExpenseReport $expenseReport
     * @return Response
     */
    public function edit(ExpenseReport $expenseReport)
    {
        return view('expense-reports.edit', [
            'report' => $expenseReport,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreExpenseReport $request
     * @param ExpenseReport $expenseReport
     * @return Response
     */
    public function update(StoreExpenseReport $request, ExpenseReport $expenseReport)
    {
        $request->validated();
        $expenseReport->title = $request->get('title');
        $expenseReport->save();

        return redirect()->route('expense_reports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ExpenseReport $expenseReport
     * @return Response
     * @throws Exception
     */
    public function destroy(ExpenseReport $expenseReport)
    {
        $expenseReport->delete();
        return redirect()->route('expense_reports.index');
    }

    /***
     * Show form for confirm delete
     *
     * @param $id
     * @return Response
     * @throws AuthorizationException
     */
    public function confirmDelete($id)
    {
        $report = ExpenseReport::findOrFail($id);
        $this->authorize('view', $report);
        return view('expense-reports.delete', [
            'report' => $report,
        ]);
    }

    /**
     * @param int $id
     * @return Response
     * @throws AuthorizationException
     */
    public function confirmSendMail($id)
    {
        $report = ExpenseReport::findOrFail($id);
        $this->authorize('view', $report);
        return view('expense-reports.confirm-send-mail', [
            'report' => $report,
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return void
     * @throws AuthorizationException
     */
    public function sendMail(Request $request, $id)
    {
        $report = ExpenseReport::findOrFail($id);
        $this->authorize('view', $report);
        Mail::to($request->get('email'))->send(new SummaryReport($report));
        return redirect()->route('expense_reports.show', $id);
    }
}
