<?php

namespace App\Services\Data;

use App\Exceptions\GeneralException;
use App\Models\Data\Division;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class DivisionService.
 */
class DivisionService extends BaseService
{
    /**
     * DivisionService constructor.
     *
     * @param  Division  $division
     */
    public function __construct(Division $division)
    {
        $this->model = $division;
    }

    /**
     * @param  array  $data
     *
     * @return Division
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Division
    {
        DB::beginTransaction();

        try {
            $division = $this->createDivision([
                'name' => $data['name'],
                'label' => $data['label'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this division. Please try again.'));
        }

        DB::commit();

        return $division;
    }

    /**
     * @param  Division  $division
     * @param  array  $data
     *
     * @return Division
     * @throws \Throwable
     */
    public function update(Division $division, array $data = []): Division
    {
        DB::beginTransaction();

        try {
            $division->update([
                'name' => $data['name'],
                'label' => $data['label'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this division. Please try again.'));
        }

        DB::commit();

        return $division;
    }

    /**
     * @param  Division  $division
     *
     * @return Division
     * @throws GeneralException
     */
    public function delete(Division $division): Division
    {
        if ($this->deleteById($division->id)) {
            return $division;
        }

        throw new GeneralException('There was a problem deleting this division. Please try again.');
    }

    /**
     * @param Division $division
     *
     * @throws GeneralException
     * @return Division
     */
    public function restore(Division $division): Division
    {
        if ($division->restore()) {
            return $division;
        }

        throw new GeneralException(__('There was a problem restoring this division. Please try again.'));
    }

    /**
     * @param  Division  $division
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Division $division): bool
    {
        if ($division->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this division. Please try again.'));
    }

    /**
     * @param  array  $data
     *
     * @return Division
     */
    protected function createDivision(array $data = []): Division
    {
        return $this->model::create([
            'name' => $data['name'],
            'label' => $data['label'],
            'description' => $data['description'],
        ]);
    }
}
