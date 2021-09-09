<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddVkrRequest extends FormRequest
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
        /*return [
            'title' => 'required|max:120',
            'essay' => 'required|max:500'
        ];*/
    }
    public function messages(){
        /*'title.required' => 'Поле является обязательным',
        'essay.max:500' => 'Текст слишком большой'*/
    }

}
