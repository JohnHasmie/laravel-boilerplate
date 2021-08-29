<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Domains\Auth\Http\Requests\Backend\Data\StoreDataRequest;
use App\Domains\Auth\Http\Requests\Backend\Data\UpdateDataRequest;
use App\Models\Data\Rank;
use App\Services\Data\RankService;

/**
 * Class RankController.
 */
class EmployeeController
{
    /**
     * @var RankService
     */
    protected $rankService;

    /**
     * RankController constructor.
     *
     */
    public function __construct(RankService $rankService)
    {
        $this->rankService = $rankService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.data.rank.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.data.rank.create');
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
        $rank = $this->rankService->store($request->validated());

        return redirect()->route('admin.data.rank.index', $rank)->withFlashSuccess(__('The rank was successfully created.'));
    }

    /**
     * @param  Rank  $rank
     *
     * @return mixed
     */
    public function show(Rank $rank)
    {
        return view('backend.data.rank.show')
            ->withRank($rank);
    }

    /**
     * @param  Rank  $rank
     *
     * @return mixed
     */
    public function edit(Rank $rank)
    {
        return view('backend.data.rank.edit')
            ->withRank($rank);
    }

    /**
     * @param  UpdateDataRequest  $request
     * @param  Rank  $rank
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateDataRequest $request, Rank $rank)
    {
        $this->rankService->update($rank, $request->validated());

        return redirect()->route('admin.data.rank.index', $rank)->withFlashSuccess(__('The rank was successfully updated.'));
    }

    /**
     * @param  Rank  $rank
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Rank $rank)
    {
        $this->rankService->delete($rank);

        return redirect()->route('admin.data.rank.index')->withFlashSuccess(__('The rank was successfully deleted.'));
    }
}
