<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Models\Employee\Employee;
use App\Services\Employee\EmployeeService;
use Illuminate\Http\Request;

/**
 * Class EmployeeController.
 */
class EmployeeController
{
    /**
     * @var EmployeeService
     */
    protected $employeeService;

    protected $division = 'all';

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
    public function index(Request $request)
    {
        $search = [
            'rank_id' => null,
            'corps_id' => null,
            'position_id'=> null,
            'work_unit_id'=> null,
            'work_unit_status' => null,
            'military_education' => null,
            'general_education' => null,
            'date_warrant_check_in' => null,
            'date_warrant_check_out' => null,
        ];

        return view('backend.employee.index')
            ->withDivision($this->division)
            ->withSearch($search);
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
