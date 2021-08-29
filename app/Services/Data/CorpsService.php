<?php

namespace App\Services\Data;

use App\Exceptions\GeneralException;
use App\Models\Data\Corps;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class CorpsService.
 */
class CorpsService extends BaseService
{
    /**
     * CorpsService constructor.
     *
     * @param  Corps  $corps
     */
    public function __construct(Corps $corps)
    {
        $this->model = $corps;
    }

    /**
     * @param  array  $data
     *
     * @return Corps
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Corps
    {
        DB::beginTransaction();

        try {
            $corps = $this->createCorps([
                'name' => $data['name'],
                'label' => $data['label'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            
            throw new GeneralException(__('There was a problem creating this corps. Please try again.'));
        }

        DB::commit();

        return $corps;
    }

    /**
     * @param  Corps  $corps
     * @param  array  $data
     *
     * @return Corps
     * @throws \Throwable
     */
    public function update(Corps $corps, array $data = []): Corps
    {
        DB::beginTransaction();

        try {
            $corps->update([
                'name' => $data['name'],
                'label' => $data['label'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this corps. Please try again.'));
        }

        DB::commit();

        return $corps;
    }

    /**
     * @param  Corps  $corps
     *
     * @return Corps
     * @throws GeneralException
     */
    public function delete(Corps $corps): Corps
    {
        if ($this->deleteById($corps->id)) {
            return $corps;
        }

        throw new GeneralException('There was a problem deleting this corps. Please try again.');
    }

    /**
     * @param Corps $corps
     *
     * @throws GeneralException
     * @return Corps
     */
    public function restore(Corps $corps): Corps
    {
        if ($corps->restore()) {
            return $corps;
        }

        throw new GeneralException(__('There was a problem restoring this corps. Please try again.'));
    }

    /**
     * @param  Corps  $corps
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Corps $corps): bool
    {
        if ($corps->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this corps. Please try again.'));
    }

    /**
     * @param  array  $data
     *
     * @return Corps
     */
    protected function createCorps(array $data = []): Corps
    {
        return $this->model::create([
            'name' => $data['name'],
            'label' => $data['label'],
            'description' => $data['description'],
        ]);
    }
}
