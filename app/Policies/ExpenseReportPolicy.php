<?php

namespace App\Policies;

use App\User;
use App\ExpenseReport;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpenseReportPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any expense reports.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the expense report.
     *
     * @param User $user
     * @param ExpenseReport $expenseReport
     * @return mixed
     */
    public function view(User $user, ExpenseReport $expenseReport)
    {
        return $user->id == $expenseReport->user_id;
    }

    /**
     * Determine whether the user can create expense reports.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the expense report.
     *
     * @param User $user
     * @param ExpenseReport $expenseReport
     * @return mixed
     */
    public function update(User $user, ExpenseReport $expenseReport)
    {
        return $user->id == $expenseReport->user_id;
    }

    /**
     * Determine whether the user can delete the expense report.
     *
     * @param User $user
     * @param ExpenseReport $expenseReport
     * @return mixed
     */
    public function delete(User $user, ExpenseReport $expenseReport)
    {
        return $user->id == $expenseReport->user_id;
    }

    /**
     * Determine whether the user can restore the expense report.
     *
     * @param User $user
     * @param ExpenseReport $expenseReport
     * @return mixed
     */
    public function restore(User $user, ExpenseReport $expenseReport)
    {
        return $user->id == $expenseReport->user_id;
    }

    /**
     * Determine whether the user can permanently delete the expense report.
     *
     * @param User $user
     * @param ExpenseReport $expenseReport
     * @return mixed
     */
    public function forceDelete(User $user, ExpenseReport $expenseReport)
    {
        return $user->id == $expenseReport->user_id;
    }
}
