<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseReport;
use App\Http\Requests\StoreExpenses;
use http\Env\Response;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validated = $request->validated();

        $expense = new Expense();
        $expense->description = $request->get('description');
        $expense->amount = $request->get('amount');
        $expense->expense_report_id = $id;
        $expense->save();

        return redirect()->route('expense_reports.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
