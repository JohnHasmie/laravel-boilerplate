<?php

namespace App\Domains\Auth\Http\Requests\Backend\Employee;

/**
 * Class StoreUserRequest.
 */
class StoreMilitaryRequest extends StoreEmployeeRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $employee = parent::rules();

        $military = [
            'registration_number' => ['required', 'max:200'],
            'corps_id' => ['required', 'exists:corps,id'],
            'date_finished_army' => ['required', 'date'],

            'officer_source' => ['sometimes'],
            'date_finished_officer' => ['sometimes', 'date'],

            'rank_id' => ['required', 'exists:ranks,id'],
            'date_finished_rank' => ['required', 'date'],

            'number_decision_position' => ['sometimes'],
            'number_warrant' => ['sometimes'],
            'date_finished_warrant' => ['sometimes', 'date'],

            'position_id' => ['required', 'exists:positions,id'],
            'date_finished_position' => ['required', 'date'],

            'number_warrant_check_in' => ['sometimes'],
            'date_warrant_check_in' => ['sometimes', 'date'],

            'number_warrant_check_out' => ['sometimes'],
            'date_warrant_check_out' => ['sometimes', 'date'],

            'military_education' => ['sometimes'],
            'year_military_education' => ['sometimes', 'min:4', 'max:4'],

            'general_education' => ['sometimes'],
            'year_general_education' => ['sometimes', 'min:4', 'max:4'],

            'suspa_ba' => ['sometimes'],
            'year_suspa_ba' => ['sometimes', 'min:4', 'max:4'],

            'sandi' => ['sometimes'],
            'year_sandi' => ['sometimes', 'min:4', 'max:4'],

            'kontra' => ['sometimes'],
            'year_kontra' => ['sometimes', 'min:4', 'max:4'],

            'tek' => ['sometimes'],
            'year_tek' => ['sometimes', 'min:4', 'max:4'],

            'kontra' => ['sometimes'],
            'year_kontra' => ['sometimes', 'min:4', 'max:4'],

            'susfunk' => ['sometimes'],
            'year_susfunk' => ['sometimes', 'min:4', 'max:4'],

            'strat' => ['sometimes'],
            'year_strat' => ['sometimes', 'min:4', 'max:4'],

            'pusprop' => ['sometimes'],
            'year_pusprop' => ['sometimes', 'min:4', 'max:4'],

            'gal' => ['sometimes'],
            'year_gal' => ['sometimes', 'min:4', 'max:4'],

            'gator' => ['sometimes'],
            'year_gator' => ['sometimes', 'min:4', 'max:4'],

            'lid' => ['sometimes'],
            'year_lid' => ['sometimes', 'min:4', 'max:4'],

            'economy' => ['sometimes'],
            'year_economy' => ['sometimes', 'min:4', 'max:4'],

            'bp' => ['sometimes'],
            'mi' => ['sometimes'],
            'jas' => ['sometimes'],
            'description' => ['sometimes'],
        ];

        $documents = [
            'documents.*' => ['sometimes', 'image']
        ];

        return array_merge($employee, $military, $documents);
    }
}
