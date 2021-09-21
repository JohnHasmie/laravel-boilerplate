<?php

namespace App\Http\Controllers\Backend\Data\WorkUnit;

use App\Domains\Auth\Http\Requests\Backend\Data\StoreDataRequest;
use App\Domains\Auth\Http\Requests\Backend\Data\UpdateDataRequest;
use App\Models\Data\WorkUnit;
use App\Services\Data\WorkUnitService;

/**
 * Class WorkUnitController.
 */
class WorkUnitController
{
    /**
     * @var WorkUnitService
     */
    protected $workUnitService;

    /**
     * WorkUnitController constructor.
     *
     */
    public function __construct(WorkUnitService $workUnitService)
    {
        $this->workUnitService = $workUnitService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.data.workunit.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.data.workunit.create');
    }

    /**
     * @param  StoreDataRequest  $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreDataRequest $request)
    {
        $workunit = $this->workUnitService->store($request->validated());

        return redirect()->route('admin.data.workunit.index', $workunit)->withFlashSuccess(__('The workunit was successfully created.'));
    }

    /**
     * @param  WorkUnit  $workunit
     *
     * @return mixed
     */
    public function show(WorkUnit $workunit)
    {
        return view('backend.data.workunit.show')
            ->withWorkunit($workunit);
    }

    /**
     * @param  WorkUnit  $workunit
     *
     * @return mixed
     */
    public function edit(WorkUnit $workunit)
    {
        return view('backend.data.workunit.edit')
            ->withWorkunit($workunit);
    }

    /**
     * @param  UpdateDataRequest  $request
     * @param  WorkUnit  $workunit
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateDataRequest $request, WorkUnit $workunit)
    {
        $this->workUnitService->update($workunit, $request->validated());

        return redirect()->route('admin.data.workunit.index', $workunit)->withFlashSuccess(__('The workunit was successfully updated.'));
    }

    /**
     * @param  WorkUnit  $workunit
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(WorkUnit $workunit)
    {
        $this->workUnitService->delete($workunit);

        return redirect()->route('admin.data.workunit.index')->withFlashSuccess(__('The workunit was successfully deleted.'));
    }
}
