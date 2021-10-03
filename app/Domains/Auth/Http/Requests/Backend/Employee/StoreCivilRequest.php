<?php

namespace App\Domains\Auth\Http\Requests\Backend\Employee;

/**
 * Class StoreUserRequest.
 */
class StoreCivilRequest extends StoreEmployeeRequest
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
            'work_unit_id' => ['required', 'exists:work_units,id'],
            'work_unit_status' => ['required', 'string', 'min:6', 'max:20'],

            'corps_id' => ['required', 'exists:corps,id'],
            'date_finished_prospective' => ['required', 'date'],
            'date_finished_servant' => ['required', 'date'],

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

            // 'military_education' => ['sometimes'],
            // 'year_military_education' => ['sometimes', 'min:4', 'max:4'],

            // 'general_education' => ['sometimes'],
            // 'year_general_education' => ['sometimes', 'min:4', 'max:4'],

            'int_scr' => ['sometimes'],
            'year_int_scr' => ['sometimes', 'min:4', 'max:4'],

            'bp' => ['sometimes'],
            'mi' => ['sometimes'],
            'jas' => ['sometimes'],
            'description' => ['sometimes'],
        ];

        $educations = [
            'military_educations.*' => ['required', 'min:2'],
            'year_military_educations.*' => ['required','min:4', 'max:4'],

            'general_educations.*' => ['required', 'min:2'],
            'year_general_educations.*' => ['required','min:4', 'max:4'],
        ];

        $documents = [
            'documents.*' => ['sometimes', 'image']
        ];


        return array_merge($employee, $military, $educations, $documents);
    }
}
