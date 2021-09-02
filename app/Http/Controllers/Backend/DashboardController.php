<?php

namespace App\Http\Controllers\Backend;

use App\Models\Employee\Employee;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $date = today()->format('Y-m-d');

        $militaryReadyToPush = Employee::whereHas('division', function ($q) {
                $q->whereName('military');
            })
            ->whereHas('unit_detail', function ($q) use ($date) {
                $q->where('date_finished_rank', '>=', $date);
            })
            ->get();

        $civilReadyToPush = Employee::whereHas('division', function ($q) {
                $q->whereName('civil');
            })
            ->whereHas('unit_detail', function ($q) use ($date) {
                $q->where('date_finished_rank', '>=', $date);
            })
            ->get();

        return view('backend.dashboard', [
            'military_ready_push' => $militaryReadyToPush,
            'civil_ready_push' => $civilReadyToPush,
        ]);
    }
}
