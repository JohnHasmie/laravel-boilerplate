<?php

namespace App\Http\Controllers\Backend\Data\Division;

use App\Domains\Auth\Http\Requests\Backend\Data\StoreDataRequest;
use App\Domains\Auth\Http\Requests\Backend\Data\UpdateDataRequest;
use App\Models\Data\Division;
use App\Services\Data\DivisionService;

/**
 * Class DivisionController.
 */
class DivisionController
{
    /**
     * @var DivisionService
     */
    protected $divisionService;

    /**
     * DivisionController constructor.
     *
     */
    public function __construct(DivisionService $divisionService)
    {
        $this->divisionService = $divisionService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.data.division.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.data.division.create');
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
        $division = $this->divisionService->store($request->validated());

        return redirect()->route('admin.data.division.index', $division)->withFlashSuccess(__('The division was successfully created.'));
    }

    /**
     * @param  Division  $division
     *
     * @return mixed
     */
    public function show(Division $division)
    {
        return view('backend.data.division.show')
            ->withDivision($division);
    }

    /**
     * @param  Division  $division
     *
     * @return mixed
     */
    public function edit(Division $division)
    {
        return view('backend.data.division.edit')
            ->withDivision($division);
    }

    /**
     * @param  UpdateDataRequest  $request
     * @param  Division  $division
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateDataRequest $request, Division $division)
    {
        $this->divisionService->update($division, $request->validated());

        return redirect()->route('admin.data.division.index', $division)->withFlashSuccess(__('The division was successfully updated.'));
    }

    /**
     * @param  Division  $division
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Division $division)
    {
        $this->divisionService->delete($division);

        return redirect()->route('admin.data.division.index')->withFlashSuccess(__('The division was successfully deleted.'));
    }
}
