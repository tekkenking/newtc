<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAgency extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return can_user('Agency: create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              =>  ['required', 'max:100'],
            'address'           =>  ['required'],
            'state_id'          =>  ['required'],
            'lga_id'            =>  ['required'],

            'email'             =>  ['required', 'email', Rule::unique('agencies')],
            'phone'             =>  ['required', Rule::unique('agencies')],
            'alt_phone'         =>  ['required', Rule::unique('agencies')],

            'description'       =>  ['required'],

            'bank_id'           =>  ['required'],
            'bank_account_number'=> ['required'],
            'bank_account_name' => ['required'],
            'bank_bvn'          => ['required'],

            'agencystatus_id'   =>  ['required'],
            'agencycategory_id' =>  ['required'],
            'agencymode_id'     =>  ['required'],

            "admin_fullname"    => ['required'],
            "admin_address"     => ['required'],
            "admin_state_id"    => ['required'],
            "admin_lga_id"      => ['required'],

            "admin_phone"       => ['required', 'unique:users,phone'],
            "admin_alt_phone"   => ['required', 'unique:agencystaffs,alt_phone'],
            "admin_email"       => ['required', 'unique:users,email'],
            "admin_gender_id"   => ['required'],
            "admin_userstatus_id" => ['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'lga_id.required'   => 'The lga field required',
            'state_id.required' => 'The state field required',
            'admin_gender_id.required' => 'The admin gender field required',
            'admin_lga_id.required' => 'The admin lga field required',
            'admin_state_id.required' => 'The admin state field required',
            'bank_id.required' => 'The bank field required',
            'agencystatus_id.required' => 'The agency status field required',
            'agencycategory_id.required' => 'The agency category field required',
            'agencymode_id.required' => 'The agency mode field required',
        ];
    }
}
