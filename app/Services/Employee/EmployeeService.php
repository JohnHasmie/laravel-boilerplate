<?php

namespace App\Services\Employee;

use App\Domains\Auth\Services\UserService;
use App\Exceptions\GeneralException;
use App\Models\Data\TypeDocument;
use App\Models\Employee\Employee;
use App\Models\Employee\EmployeeDocument;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class EmployeeService.
 */
class EmployeeService extends BaseService
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * EmployeeService constructor.
     *
     * @param  Employee  $employee
     */
    public function __construct(Employee $employee, UserService $userService)
    {
        $this->model = $employee;
        $this->userService = $userService;
    }

    /**
     * @param  array  $data
     *
     * @return Employee
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Employee
    {
        DB::beginTransaction();

        try {
            $employee = $this->createEmployee($data);
        } catch (Exception $e) {
            DB::rollBack();
            
            // throw new GeneralException(__('There was a problem creating this employee. Please try again.'));
            throw new GeneralException($e->getMessage());
        }

        DB::commit();

        return $employee;
    }

    /**
     * @param  Employee  $employee
     * @param  array  $data
     *
     * @return Employee
     * @throws \Throwable
     */
    public function update(Employee $employee, array $data = []): Employee
    {
        DB::beginTransaction();

        $data = array_filter($data);

        try {
            $employee->update([
                'name' => $data['name'],
                'couple_name' => $data['couple_name'],
                'number_of_children' => $data['number_of_children'] ?? 0,
                'birth_place' => $data['birth_place'],
                'birth_date' => $data['birth_date'],
                'phone_number' => $data['phone_number'],
                'retire_date' => $data['retire_date'],
                'gender' => $data['gender'],
                'religion' => $data['religion'],
                'address' => $data['address'],
            ]);

            $employee->unit_detail()->update([
                'registration_number' => $data['registration_number'],
                'corps_id' => $data['corps_id'],
                'date_finished_army' => isset($data['date_finished_army']) ? $data['date_finished_army'] : null,
                'officer_source' => isset($data['officer_source']) ? $data['officer_source'] : null,
                'date_finished_officer' => isset($data['date_finished_officer']) ? $data['date_finished_officer'] : null,
                'rank_id' => $data['rank_id'],
                'date_finished_rank' => isset($data['date_finished_rank']) ? $data['date_finished_rank'] : null,

                'date_finished_prospective' => isset($data['date_finished_prospective']) ? $data['date_finished_prospective'] : null,
                'date_finished_servant' => isset($data['date_finished_servant']) ? $data['date_finished_servant'] : null,

                'position_id' => $data['position_id'],
                'date_finished_position' => isset($data['date_finished_position']) ? $data['date_finished_position'] : null,
                'number_decision_position' => isset($data['number_decision_position']) ? $data['number_decision_position'] : null,
                'number_warrant' => isset($data['number_warrant']) ? $data['number_warrant'] : null,
                'date_finished_warrant' => isset($data['date_finished_warrant']) ? $data['date_finished_warrant'] : null,
                'number_warrant_check_in' => isset($data['number_warrant_check_in']) ? $data['number_warrant_check_in'] : null,
                'date_warrant_check_in' => isset($data['date_warrant_check_in']) ? $data['date_warrant_check_in'] : null,
                'number_warrant_check_out' => isset($data['number_warrant_check_out']) ? $data['number_warrant_check_out'] : null,
                'date_warrant_check_out' => isset($data['date_warrant_check_out']) ? $data['date_warrant_check_out'] : null,
                'military_education' => isset($data['military_education']) ? $data['military_education'] : null,
                'year_military_education' => isset($data['year_military_education']) ? $data['year_military_education'] : null,
                'general_education' => isset($data['general_education']) ? $data['general_education'] : null,
                'year_general_education' => isset($data['year_general_education']) ? $data['year_general_education'] : null,

                'int_scr' => isset($data['int_scr']) ? $data['int_scr'] : null,
                'year_int_scr' => isset($data['year_int_scr']) ? $data['year_int_scr'] : null,

                'susfunk' => isset($data['susfunk']) ? $data['susfunk'] : null,
                'year_susfunk' => isset($data['year_susfunk']) ? $data['year_susfunk'] : null,
                'strat' => isset($data['strat']) ? $data['strat'] : null,
                'year_strat' => isset($data['year_strat']) ? $data['year_strat'] : null,

                'suspa_ba' => isset($data['suspa_ba']) ? $data['suspa_ba'] : null,
                'year_suspa_ba' => isset($data['year_suspa_ba']) ? $data['year_suspa_ba'] : null,
                'sandi' => isset($data['sandi']) ? $data['sandi'] : null,
                'year_sandi' => isset($data['year_sandi']) ? $data['year_sandi'] : null,
                'kontra' => isset($data['kontra']) ? $data['kontra'] : null,
                'year_kontra' => isset($data['year_kontra']) ? $data['year_kontra'] : null,
                'tek' => isset($data['tek']) ? $data['tek'] : null,
                'year_tek' => isset($data['year_tek']) ? $data['year_tek'] : null,
                'pusprop' => isset($data['pusprop']) ? $data['pusprop'] : null,
                'year_pusprop' => isset($data['year_pusprop']) ? $data['year_pusprop'] : null,
                'gal' => isset($data['year_gal']) ? $data['year_gal'] : null,
                'year_gal' => isset($data['year_gal']) ? $data['year_gal'] : null,
                'gator' => isset($data['gator']) ? $data['gator'] : null,
                'year_gator' => isset($data['year_gator']) ? $data['year_gator'] : null,
                'lid' => isset($data['lid']) ? $data['lid'] : null,
                'year_lid' => isset($data['year_lid']) ? $data['year_lid'] : null,
                'economy' => isset($data['economy']) ? $data['economy'] : null,
                'year_economy' => isset($data['year_economy']) ? $data['year_economy'] : null,

                'bp' => isset($data['bp']) ? $data['bp'] : null,
                'mi' => isset($data['mi']) ? $data['mi'] : null,
                'jas' => isset($data['jas']) ? $data['jas'] : null,

                'description' => isset($data['description']) ? $data['description'] : null,
            ]);

            $typeDocuments = $this->getTypeDocuments();
        
            foreach ($typeDocuments as $typeDocument) {
                // $prefix = 'documents_';
                // $keyName = $prefix . $typeDocument['key'];

                if (isset($data['documents']) && isset($data['documents'][$typeDocument['key']])) {
                    $file = $data['documents'][$typeDocument['key']];

                    EmployeeDocument::updateOrCreate([
                        'employee_id' => $employee->id,
                        'type_document_id' => $typeDocument['id'],
                        'file' => $file->store('documents/' . $typeDocument['key'], 'public'),
                    ]);
                }
            }

            if (!$employee->user_id && isset($data['email']) && isset($data['password'])) {
                $user = $this->createAccount($data);
                $employee->user()->associate($user);
                $user->save();
            } elseif (isset($data['email']) && isset($data['password'])) {
                $this->userService->update($employee->user, $data);
            }
        } catch (Exception $e) {
            DB::rollBack();
            // throw new GeneralException($e->getMessage());
            throw new GeneralException(__('There was a problem updating this employee. Please try again.'));
        }

        DB::commit();

        return $employee;
    }

    /**
     * @param  Employee  $employee
     *
     * @return Employee
     * @throws GeneralException
     */
    public function delete(Employee $employee): Employee
    {
        if ($this->deleteById($employee->id)) {
            return $employee;
        }

        throw new GeneralException('There was a problem deleting this employee. Please try again.');
    }

    /**
     * @param Employee $employee
     *
     * @throws GeneralException
     * @return Employee
     */
    public function restore(Employee $employee): Employee
    {
        if ($employee->restore()) {
            return $employee;
        }

        throw new GeneralException(__('There was a problem restoring this employee. Please try again.'));
    }

    /**
     * @param  Employee  $employee
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Employee $employee): bool
    {
        if ($employee->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this employee. Please try again.'));
    }

    /**
     * @param  array  $data
     *
     * @return Employee
     */
    protected function createEmployee(array $data = []): Employee
    {
        $employee = $this->model::create([
            'name' => $data['name'],
            'couple_name' => isset($data['couple_name']) ?: '',
            'photo' =>  $data['photo']->store('documents/photos', 'public'),
            'number_of_children' => isset($data['number_of_children']) ?: 0,
            'birth_place' => $data['birth_place'],
            'birth_date' => $data['birth_date'],
            'phone_number' => $data['phone_number'],
            'retire_date' => $data['retire_date'],
            'gender' => $data['gender'],
            'religion' => $data['religion'],
            'address' => $data['address'],
            'division_id' => $data['division_id'],
        ]);

        
        $this->createUnitDetail($employee, $data);
        $this->createDocuments($employee, $data);
        
        if (isset($data['email']) && isset($data['password'])) {
            $user = $this->createAccount($data);
            $employee->user()->associate($user);
            $employee->save();
        }

        return $employee;
    }

    protected function createAccount($data) {
        return $this->userService->store([
            'type' => 'user',
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'email_verified' => '1',
            'active' => '1',
        ]);
    }

    protected function createUnitDetail($employee, $data) {
        $employee->unit_detail()->create([
            'registration_number' => $data['registration_number'],
            'corps_id' => $data['corps_id'],
            'date_finished_army' => isset($data['date_finished_army']) ? $data['date_finished_army'] : null,
            'officer_source' => isset($data['officer_source']) ? $data['officer_source'] : null,
            'date_finished_officer' => isset($data['date_finished_officer']) ? $data['date_finished_officer'] : null,
            'rank_id' => $data['rank_id'],
            'date_finished_rank' => isset($data['date_finished_rank']) ? $data['date_finished_rank'] : null,

            'date_finished_prospective' => isset($data['date_finished_prospective']) ? $data['date_finished_prospective'] : null,
            'date_finished_servant' => isset($data['date_finished_servant']) ? $data['date_finished_servant'] : null,

            'position_id' => $data['position_id'],
            'date_finished_position' => isset($data['date_finished_position']) ? $data['date_finished_position'] : null,
            'number_decision_position' => isset($data['number_decision_position']) ? $data['number_decision_position'] : null,
            'number_warrant' => isset($data['number_warrant']) ? $data['number_warrant'] : null,
            'date_finished_warrant' => isset($data['date_finished_warrant']) ? $data['date_finished_warrant'] : null,
            'number_warrant_check_in' => isset($data['number_warrant_check_in']) ? $data['number_warrant_check_in'] : null,
            'date_warrant_check_in' => isset($data['date_warrant_check_in']) ? $data['date_warrant_check_in'] : null,
            'number_warrant_check_out' => isset($data['number_warrant_check_out']) ? $data['number_warrant_check_out'] : null,
            'date_warrant_check_out' => isset($data['date_warrant_check_out']) ? $data['date_warrant_check_out'] : null,
            'military_education' => isset($data['military_education']) ? $data['military_education'] : null,
            'year_military_education' => isset($data['year_military_education']) ? $data['year_military_education'] : null,
            'general_education' => isset($data['general_education']) ? $data['general_education'] : null,
            'year_general_education' => isset($data['year_general_education']) ? $data['year_general_education'] : null,

            'int_scr' => isset($data['int_scr']) ? $data['int_scr'] : null,
            'year_int_scr' => isset($data['year_int_scr']) ? $data['year_int_scr'] : null,

            'susfunk' => isset($data['susfunk']) ? $data['susfunk'] : null,
            'year_susfunk' => isset($data['year_susfunk']) ? $data['year_susfunk'] : null,
            'strat' => isset($data['strat']) ? $data['strat'] : null,
            'year_strat' => isset($data['year_strat']) ? $data['year_strat'] : null,

            'suspa_ba' => isset($data['suspa_ba']) ? $data['suspa_ba'] : null,
            'year_suspa_ba' => isset($data['year_suspa_ba']) ? $data['year_suspa_ba'] : null,
            'sandi' => isset($data['sandi']) ? $data['sandi'] : null,
            'year_sandi' => isset($data['year_sandi']) ? $data['year_sandi'] : null,
            'kontra' => isset($data['kontra']) ? $data['kontra'] : null,
            'year_kontra' => isset($data['year_kontra']) ? $data['year_kontra'] : null,
            'tek' => isset($data['tek']) ? $data['tek'] : null,
            'year_tek' => isset($data['year_tek']) ? $data['year_tek'] : null,
            'pusprop' => isset($data['pusprop']) ? $data['pusprop'] : null,
            'year_pusprop' => isset($data['year_pusprop']) ? $data['year_pusprop'] : null,
            'gal' => isset($data['year_gal']) ? $data['year_gal'] : null,
            'year_gal' => isset($data['year_gal']) ? $data['year_gal'] : null,
            'gator' => isset($data['gator']) ? $data['gator'] : null,
            'year_gator' => isset($data['year_gator']) ? $data['year_gator'] : null,
            'lid' => isset($data['lid']) ? $data['lid'] : null,
            'year_lid' => isset($data['year_lid']) ? $data['year_lid'] : null,
            'economy' => isset($data['economy']) ? $data['economy'] : null,
            'year_economy' => isset($data['year_economy']) ? $data['year_economy'] : null,

            'bp' => isset($data['bp']) ? $data['bp'] : null,
            'mi' => isset($data['mi']) ? $data['mi'] : null,
            'jas' => isset($data['jas']) ? $data['jas'] : null,

            'description' => isset($data['description']) ? $data['description'] : null,
        ]);
    }

    protected function createDocuments($employee, array $data) {
        $typeDocuments = $this->getTypeDocuments();
        
        // foreach ($typeDocuments as $typeDocument) {
        //     $prefix = 'document_';
        //     $keyName = $prefix . $typeDocument['key'];

        //     if (isset($data[$keyName])) {
        //         $file = $data[$keyName];
    
        //         $employee->documents()->create([
        //             'type_document_id' => $typeDocument['id'],
        //             'file' => $file->store('documents/' . $typeDocument['key'], 'public'),
        //         ]);
        //     }
        // }

        foreach ($typeDocuments as $typeDocument) {
            // $prefix = 'documents_';
            // $keyName = $prefix . $typeDocument['key'];

            if (isset($data['documents']) && isset($data['documents'][$typeDocument['key']])) {
                $file = $data['documents'][$typeDocument['key']];

                EmployeeDocument::updateOrCreate([
                    'employee_id' => $employee->id,
                    'type_document_id' => $typeDocument['id'],
                    'file' => $file->store('documents/' . $typeDocument['key'], 'public'),
                ]);
            }
        }
    }

     /**
     *
     * @return TypeDocument
     */
    public function getTypeDocuments() {
        return TypeDocument::all();
    }
}
