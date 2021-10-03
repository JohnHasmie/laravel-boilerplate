<?php

namespace App\Domains\Auth\Http\Requests\Backend\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreUserRequest.
 */
class StoreEmployeeRequest extends FormRequest
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
        return [
            'name' => ['required', 'max:200'],
            'couple_name' => ['sometimes', 'max:200'],
            'photo' => ['required', 'image'],
            'birth_place' => ['required'],
            'birth_date' => ['required', 'date'],
            'retire_date' => ['required', 'date'],
            'gender' => ['required', Rule::in('L', 'P')],
            'religion' => ['required', 'max:20'],
            'phone_number' => ['required', 'min:10', 'max:15', 'unique:employees'],
            'address' => ['required', 'max: 250'],

            'division_id' => ['required', 'exists:divisions,id'],

            'email' => ['sometimes', 'email'],
            'password' => ['required_with:email', 'min:5', 'max:200'],
        ];
    }
}
