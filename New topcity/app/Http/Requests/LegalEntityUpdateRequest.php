<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LegalEntityUpdateRequest extends FormRequest
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
            'inn'               => 'required|string|min:3|max:200',
            'legal_address'     => 'required|string|min:3|max:200',
            'last_name'         => 'required|string|min:3|max:200',
            'first_name'        => 'required|string|min:3|max:200',
            'patronymic_name'   => 'sometimes|nullable|string|min:3|max:200',
            'phone'             => 'required|string|min:3|max:15',
//            TODO: Змінити валідацію для телефона
//            'phone'             => 'required|regex:/\+[0-9]{3}[0-9]{9}/',
        ];
    }
}
