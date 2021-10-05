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

        $queryMilitaryReadyToPush = Employee::whereHas('division', function ($q) {
                $q->whereName('military');
            })
            ->whereHas('unit_detail', function ($q) use ($date) {
                $q->where('date_finished_rank', '>=', $date);
            });

        $queryCivilReadyToPush = Employee::whereHas('division', function ($q) {
                $q->whereName('civil');
            })
            ->whereHas('unit_detail', function ($q) use ($date) {
                $q->where('date_finished_rank', '>=', $date);
            });

        if (auth()->user()->hasRole('Admin Work Unit')) {
            $currentWorkUnit = auth()->user()->workUnitId();

            $queryMilitaryReadyToPush->whereHas('unit_detail', function ($q) use ($currentWorkUnit) {
                $q->whereWorkUnitId($currentWorkUnit);
            });
            $queryCivilReadyToPush->whereHas('unit_detail', function ($q) use ($currentWorkUnit) {
                $q->whereWorkUnitId($currentWorkUnit);
            });
        }
        
        $militaryReadyToPush = $queryMilitaryReadyToPush->get();
        $civilReadyToPush = $queryCivilReadyToPush->get();

        return view('backend.dashboard', [
            'military_ready_push' => $militaryReadyToPush,
            'civil_ready_push' => $civilReadyToPush,
        ]);
    }
}
