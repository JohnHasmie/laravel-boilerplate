<?php

namespace App\Http\Controllers\Backend\Data\Position;

use App\Domains\Auth\Http\Requests\Backend\Data\StoreDataRequest;
use App\Domains\Auth\Http\Requests\Backend\Data\UpdateDataRequest;
use App\Models\Data\Position;
use App\Services\Data\PositionService;

/**
 * Class PositionController.
 */
class PositionController
{
    /**
     * @var PositionService
     */
    protected $positionService;

    /**
     * PositionController constructor.
     *
     */
    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.data.position.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.data.position.create');
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
        $position = $this->positionService->store($request->validated());

        return redirect()->route('admin.data.position.index', $position)->withFlashSuccess(__('The position was successfully created.'));
    }

    /**
     * @param  Position  $position
     *
     * @return mixed
     */
    public function show(Position $position)
    {
        return view('backend.data.position.show')
            ->withPosition($position);
    }

    /**
     * @param  Position  $position
     *
     * @return mixed
     */
    public function edit(Position $position)
    {
        return view('backend.data.position.edit')
            ->withPosition($position);
    }

    /**
     * @param  UpdateDataRequest  $request
     * @param  Position  $position
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateDataRequest $request, Position $position)
    {
        $this->positionService->update($position, $request->validated());

        return redirect()->route('admin.data.position.index', $position)->withFlashSuccess(__('The position was successfully updated.'));
    }

    /**
     * @param  Position  $position
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Position $position)
    {
        $this->positionService->delete($position);

        return redirect()->route('admin.data.position.index')->withFlashSuccess(__('The position was successfully deleted.'));
    }
}
