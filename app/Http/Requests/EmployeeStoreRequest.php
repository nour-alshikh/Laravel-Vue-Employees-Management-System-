<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'       =>       ['required'],
            'middle_name'      =>       ['required'],
            'last_name'        =>       ['required'],
            'address'          =>       ['required'],
            'zip_code'         =>       ['required'],
            'country_id'       =>       ['required' , 'exists:countries,id'],
            'state_id'         =>       ['required' , 'exists:states,id'],
            'city_id'          =>       ['required' , 'exists:cities,id'],
            'department_id'    =>       ['required' , 'exists:departments,id'],
            'birth_date'       =>       ['required'],
            'hired_date'         =>       ['required'],
        ];
    }
}
