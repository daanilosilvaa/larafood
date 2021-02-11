<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTable extends FormRequest
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
            'identify' => ['required', 'string','min:3', 'max:255',"unique:tables,identify,{$id},id"],
            'description' => 'required|min:3|max:10000',
           
        ];

    

        if($this->method() == 'PUT'){
            $rules['identify'] = ['nullable', 'string', 'min:6','max:255'];
            $rules['description'] = ['nullable', 'string', 'min:3','max:10000'];
        }


        return $rules;
    }
}
