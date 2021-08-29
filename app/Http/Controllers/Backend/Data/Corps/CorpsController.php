<?php

namespace App\Http\Controllers\Backend\Data\Corps;

use App\Domains\Auth\Http\Requests\Backend\Data\StoreDataRequest;
use App\Domains\Auth\Http\Requests\Backend\Data\UpdateDataRequest;
use App\Models\Data\Corps;
use App\Services\Data\CorpsService;

/**
 * Class CorpsController.
 */
class CorpsController
{
    /**
     * @var CorpsService
     */
    protected $corpsService;

    /**
     * CorpsController constructor.
     *
     */
    public function __construct(CorpsService $corpsService)
    {
        $this->corpsService = $corpsService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.data.corps.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.data.corps.create');
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
        $corps = $this->corpsService->store($request->validated());

        return redirect()->route('admin.data.corps.index', $corps)->withFlashSuccess(__('The corps was successfully created.'));
    }

    /**
     * @param  Corps  $corps
     *
     * @return mixed
     */
    public function show(Corps $corps)
    {
        return view('backend.data.corps.show')
            ->withCorps($corps);
    }

    /**
     * @param  Corps  $corps
     *
     * @return mixed
     */
    public function edit(Corps $corps)
    {
        return view('backend.data.corps.edit')
            ->withCorps($corps);
    }

    /**
     * @param  UpdateDataRequest  $request
     * @param  Corps  $corps
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateDataRequest $request, Corps $corps)
    {
        $this->corpsService->update($corps, $request->validated());

        return redirect()->route('admin.data.corps.index', $corps)->withFlashSuccess(__('The corps was successfully updated.'));
    }

    /**
     * @param  Corps  $corps
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Corps $corps)
    {
        $this->corpsService->delete($corps);

        return redirect()->route('admin.data.corps.index')->withFlashSuccess(__('The corps was successfully deleted.'));
    }
}
