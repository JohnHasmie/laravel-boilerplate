<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Domains\Auth\Http\Requests\Backend\Employee\StoreCivilRequest;
use App\Domains\Auth\Http\Requests\Backend\Employee\UpdateCivilRequest;
use App\Models\Employee\Employee;

/**
 * Class CivilController.
 */
class CivilController extends EmployeeController
{
    protected $division = 'civil';

    /**
     * @param  StoreCivilRequest  $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreCivilRequest $request)
    {
        $rank = $this->employeeService->store($request->validated());

        return redirect()->route('admin.employee.civil.index', $rank)->withFlashSuccess(__('The employee was successfully created.'));
    }



    /**
     * @param  UpdateCivilRequest  $request
     * @param  Employee  $employee
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateCivilRequest $request, Employee $employee)
    {
        $this->employeeService->update($employee, $request->validated());

        return redirect()->route('admin.employee.civil.index', $employee)->withFlashSuccess(__('The employee was successfully updated.'));
    }

}