<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoriesRequest extends FormRequest
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
           'category' => 'required|array|min:1' ,
           'file' => 'required_without:id|image|mimes:jpg,jpeg,png' ,
           'category.*.name' => 'required|string|max:100' ,
           'category.*.translation_lang' => 'required|string|max:10' ,
           'category.*.active' => 'required|in:1,0' ,
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'يرجى ملئ حقل واحد على الاقل' ,
            'category.*.name' => ['required' => 'يرجى ملئ حقل واحد على الاقل' ],
            'category.*.translation_lang.required' => 'الحقل فارغ' ,
            'category.*.active.required' => 'الحقل فارغ' ,
        ];
    }
}
