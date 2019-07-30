<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseReport;
use App\Http\Requests\StoreExpenses;
use http\Env\Response;
use Illuminate\Http\Request;

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
     */
    public function create($id)
    {
        $expenseReport = ExpenseReport::findOrfail($id);
        return view('expense.create', [
            'report' => $expenseReport,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreExpenses $request
     * @param $id
     * @return void
     */
    public function store($id, StoreExpenses $request)
    {
        $request->validated();

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
     * @param  int  $report
     * @param  int  $expense_id
     * @return void
     */
    public function destroy($report, $expense_id)
    {
        $expense = Expense::findOrfail($expense_id);
        $expense->delete();

        return redirect()->route('expense_reports.show', $report);
    }
}
