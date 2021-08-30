<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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

        $new_validation = ($this->request->get('radiobutton') == 'your_address' && empty($this->request->get('delivery_address'))) ? 'required|string|min:3|max:255' : '';
        $deliveryaddress = ($this->request->get('radiobutton') == 'your_address' && empty($this->request->get('new_city')) && empty($this->request->get('new_address'))) ? 'required' : '';
//        $emailValidation = auth()->user() ? 'required|email' : 'required|email|unique:users';
//        $phoneValidation  =auth()->user() ? 'required|string|min:16|max:18':'required|string|min:16|max:18|unique:users';
        return [
            'name'               => 'required|string|min:4|max:255',
            'phone'              => 'required|string|min:16|max:18',
            'email'              => 'required|email',
            'radiobutton'        => 'required|string',
            'nova_poshta_city'   => 'required_if:radiobutton,nova_poshta_address',
            'nova_poshta_branch' => 'required_if:radiobutton,nova_poshta_address',
            'delivery_address'   => $deliveryaddress,
            'new_city'           => $new_validation,
            'new_address'        => $new_validation,
            'payment_name'       => 'required',
            'legal_person'       => 'required_if:payment_name,no-cash'

        ];
    }
}
