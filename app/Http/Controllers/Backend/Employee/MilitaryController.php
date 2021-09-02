<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Domains\Auth\Http\Requests\Backend\Employee\StoreMilitaryRequest;
use App\Domains\Auth\Http\Requests\Backend\Employee\UpdateMilitaryRequest;
use App\Models\Employee\Employee;

/**
 * Class MilitaryController.
 */
class MilitaryController extends EmployeeController
{
    protected $division = 'military';

    /**
     * @param  StoreMilitaryRequest  $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreMilitaryRequest $request)
    {
        $rank = $this->employeeService->store($request->validated());

        return redirect()->route('admin.employee.military.index', $rank)->withFlashSuccess(__('The employee was successfully created.'));
    }



    /**
     * @param  UpdateMilitaryRequest  $request
     * @param  Employee  $employee
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateMilitaryRequest $request, Employee $employee)
    {
        $this->employeeService->update($employee, $request->validated());

        return redirect()->route('admin.employee.military.index', $employee)->withFlashSuccess(__('The employee was successfully updated.'));
    }

}