<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'abbr' =>'required|string|max:10' ,
            'direction' =>'required|in:rtl,ltr',
            'active' => 'required|in:1,0',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This Field Required',
            'abbr.required' =>'This Field Required' ,
            'direction.required' =>'This Field Required',
            'active.required' =>'This Field Required'
        ];
    }
}
