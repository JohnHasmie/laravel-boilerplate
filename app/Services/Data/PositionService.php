<?php

namespace App\Services\Data;

use App\Exceptions\GeneralException;
use App\Models\Data\Position;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PositionService.
 */
class PositionService extends BaseService
{
    /**
     * PositionService constructor.
     *
     * @param  Position  $position
     */
    public function __construct(Position $position)
    {
        $this->model = $position;
    }

    /**
     * @param  array  $data
     *
     * @return Position
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Position
    {
        DB::beginTransaction();

        try {
            $position = $this->createPosition([
                'name' => $data['name'],
                'label' => $data['label'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this position. Please try again.'));
        }

        DB::commit();

        return $position;
    }

    /**
     * @param  Position  $position
     * @param  array  $data
     *
     * @return Position
     * @throws \Throwable
     */
    public function update(Position $position, array $data = []): Position
    {
        DB::beginTransaction();

        try {
            $position->update([
                'name' => $data['name'],
                'label' => $data['label'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this position. Please try again.'));
        }

        DB::commit();

        return $position;
    }

    /**
     * @param  Position  $position
     *
     * @return Position
     * @throws GeneralException
     */
    public function delete(Position $position): Position
    {
        if ($this->deleteById($position->id)) {
            return $position;
        }

        throw new GeneralException('There was a problem deleting this position. Please try again.');
    }

    /**
     * @param Position $position
     *
     * @throws GeneralException
     * @return Position
     */
    public function restore(Position $position): Position
    {
        if ($position->restore()) {
            return $position;
        }

        throw new GeneralException(__('There was a problem restoring this position. Please try again.'));
    }

    /**
     * @param  Position  $position
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Position $position): bool
    {
        if ($position->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this position. Please try again.'));
    }

    /**
     * @param  array  $data
     *
     * @return Position
     */
    protected function createPosition(array $data = []): Position
    {
        return $this->model::create([
            'name' => $data['name'],
            'label' => $data['label'],
            'description' => $data['description'],
        ]);
    }
}
