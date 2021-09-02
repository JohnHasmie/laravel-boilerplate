<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Domains\Auth\Http\Requests\Backend\Data\StoreDataRequest;
use App\Domains\Auth\Http\Requests\Backend\Data\UpdateDataRequest;
use App\Domains\Auth\Http\Requests\Backend\Employee\StoreMilitaryRequest;
use App\Models\Employee\Employee;
use App\Services\Employee\EmployeeService;

/**
 * Class EmployeeController.
 */
class EmployeeController
{
    /**
     * @var EmployeeService
     */
    protected $employeeService;

    protected $division = 'military';

    /**
     * RankController constructor.
     *
     */
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.employee.index')
            ->withDivision($this->division);
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.employee.create')
            ->withDivision($this->division);
    }

    /**
     * @param  Employee  $employee
     *
     * @return mixed
     */
    public function show(Employee $employee)
    {
        return view('backend.employee.' . $this->division . '.show')
            ->withEmployee($employee);
    }

        /**
     * @param  Employee  $employee
     *
     * @return mixed
     */
    public function edit(Employee $employee)
    {
        return view('backend.employee.edit')
            ->withEmployee($employee)
            ->withDivision($this->division);
    }

    /**
     * @param  Employee  $employee
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Employee $employee)
    {
        $this->employeeService->delete($employee);

        return redirect()->route('admin.employee.' . $this->division . '.index')->withFlashSuccess(__('The employee was successfully deleted.'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function push()
    {
        return view('backend.employee.ready-push')
            ->withDivision($this->division);
    }
}
