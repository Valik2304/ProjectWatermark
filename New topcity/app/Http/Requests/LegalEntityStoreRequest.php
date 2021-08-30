<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LegalEntityStoreRequest extends FormRequest
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
            'organization_name' => 'required|string|min:3|max:200',
            'inn'               => 'required|string|min:3|max:200',
            'legal_address'     => 'required|string|min:3|max:200',
            'email'             => 'required|email|min:3|max:200',
            'last_name'         => 'required|string|min:3|max:200',
            'first_name'        => 'required|string|min:3|max:200',
            'patronymic_name'   => 'sometimes|nullable|string|min:3|max:200',
            'phone'             => 'required|string|min:3|max:20',
//            TODO: Змінити валідацію для телефона
//            'phone'             => 'required|regex:/\+[0-9]{3}[0-9]{9}/',
        ];
    }
}
