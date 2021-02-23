<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTenant extends FormRequest
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
        $id = $this->segment(3);

        $rules = [
            'name' => ['required', 'min:3', 'max:255', "unique:tenants,name,{$id},id"], 
            'email' => "required|min:3|max:255|unique:tenants,email,{$id},id",
            'cnpj' => ['required', 'digits:15', "unique:tenants,cnpj,{$id},id"],
            'logo' => ['nullable', 'image'],
            'ative' => ['required', 'in:Y,N'],

            // subscription
            'subscription' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date'],
            'subscription_id' => ['nullable', 'max:255'],
            'subscription_active' => ['nullable', 'boolean'],
            'subscription_suspended' => ['nullable', 'boolean'],
         
        ];

        if($this->method() == 'PUT'){
            $rules['logo'] = ['nullable', 'image'];
        }

        return $rules;
    }
}
