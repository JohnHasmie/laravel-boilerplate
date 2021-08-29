<?php

namespace App\Services\Data;

use App\Exceptions\GeneralException;
use App\Models\Data\Rank;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class RankService.
 */
class RankService extends BaseService
{
    /**
     * RankService constructor.
     *
     * @param  Rank  $rank
     */
    public function __construct(Rank $rank)
    {
        $this->model = $rank;
    }

    /**
     * @param  array  $data
     *
     * @return Rank
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Rank
    {
        DB::beginTransaction();

        try {
            $rank = $this->createRank([
                'name' => $data['name'],
                'label' => $data['label'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this rank. Please try again.'));
        }

        DB::commit();

        return $rank;
    }

    /**
     * @param  Rank  $rank
     * @param  array  $data
     *
     * @return Rank
     * @throws \Throwable
     */
    public function update(Rank $rank, array $data = []): Rank
    {
        DB::beginTransaction();

        try {
            $rank->update([
                'name' => $data['name'],
                'label' => $data['label'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this rank. Please try again.'));
        }

        DB::commit();

        return $rank;
    }

    /**
     * @param  Rank  $rank
     *
     * @return Rank
     * @throws GeneralException
     */
    public function delete(Rank $rank): Rank
    {
        if ($this->deleteById($rank->id)) {
            return $rank;
        }

        throw new GeneralException('There was a problem deleting this rank. Please try again.');
    }

    /**
     * @param Rank $rank
     *
     * @throws GeneralException
     * @return Rank
     */
    public function restore(Rank $rank): Rank
    {
        if ($rank->restore()) {
            return $rank;
        }

        throw new GeneralException(__('There was a problem restoring this rank. Please try again.'));
    }

    /**
     * @param  Rank  $rank
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Rank $rank): bool
    {
        if ($rank->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this rank. Please try again.'));
    }

    /**
     * @param  array  $data
     *
     * @return Rank
     */
    protected function createRank(array $data = []): Rank
    {
        return $this->model::create([
            'name' => $data['name'],
            'label' => $data['label'],
            'description' => $data['description'],
        ]);
    }
}
