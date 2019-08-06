<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseReport;
use App\Http\Requests\ExpenseRequest;
use \Illuminate\Auth\Access\AuthorizationException;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return void
     * @throws AuthorizationException
     */
    public function create($id)
    {
        $expenseReport = ExpenseReport::findOrfail($id);
        $this->authorize('view', $expenseReport);

        return view('expense.create', [
            'report' => $expenseReport,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ExpenseRequest $request
     * @param $id
     * @return void
     * @throws AuthorizationException
     */
    public function store($id, ExpenseRequest $request)
    {
        $this->authorize('view', ExpenseReport::find($id));

        $expense = new Expense();
        $expense->description = $request->get('description');
        $expense->amount = $request->get('amount');
        $expense->expense_report_id = $id;
        $expense->save();

        return redirect()->route('expense_reports.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $report_id
     * @param int $expense_id
     * @return void
     * @throws AuthorizationException
     */
    public function destroy($report_id, $expense_id)
    {
        $this->authorize('delete', ExpenseReport::find($report_id));
        $expense = Expense::findOrfail($expense_id);
        $expense->delete();

        return redirect()->route('expense_reports.show', $report_id);
    }
}
