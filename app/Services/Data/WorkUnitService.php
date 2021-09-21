<?php

namespace App\Services\Data;

use App\Exceptions\GeneralException;
use App\Models\Data\WorkUnit;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class WorkUnitService.
 */
class WorkUnitService extends BaseService
{
    /**
     * WorkUnitService constructor.
     *
     * @param  WorkUnit  $workunit
     */
    public function __construct(WorkUnit $workunit)
    {
        $this->model = $workunit;
    }

    /**
     * @param  array  $data
     *
     * @return WorkUnit
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): WorkUnit
    {
        DB::beginTransaction();

        try {
            $workunit = $this->createWorkUnit([
                'name' => $data['name'],
                'label' => $data['label'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this workunit. Please try again.'));
        }

        DB::commit();

        return $workunit;
    }

    /**
     * @param  WorkUnit  $workunit
     * @param  array  $data
     *
     * @return WorkUnit
     * @throws \Throwable
     */
    public function update(WorkUnit $workunit, array $data = []): WorkUnit
    {
        DB::beginTransaction();

        try {
            $workunit->update([
                'name' => $data['name'],
                'label' => $data['label'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this workunit. Please try again.'));
        }

        DB::commit();

        return $workunit;
    }

    /**
     * @param  WorkUnit  $workunit
     *
     * @return WorkUnit
     * @throws GeneralException
     */
    public function delete(WorkUnit $workunit): WorkUnit
    {
        if ($this->deleteById($workunit->id)) {
            return $workunit;
        }

        throw new GeneralException('There was a problem deleting this workunit. Please try again.');
    }

    /**
     * @param WorkUnit $workunit
     *
     * @throws GeneralException
     * @return WorkUnit
     */
    public function restore(WorkUnit $workunit): WorkUnit
    {
        if ($workunit->restore()) {
            return $workunit;
        }

        throw new GeneralException(__('There was a problem restoring this workunit. Please try again.'));
    }

    /**
     * @param  WorkUnit  $workunit
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(WorkUnit $workunit): bool
    {
        if ($workunit->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this workunit. Please try again.'));
    }

    /**
     * @param  array  $data
     *
     * @return WorkUnit
     */
    protected function createWorkUnit(array $data = []): WorkUnit
    {
        return $this->model::create([
            'name' => $data['name'],
            'label' => $data['label'],
            'description' => $data['description'],
        ]);
    }
}
